<?php

namespace App\Jobs;

use App\Models\Customer;
use App\Services\SheetService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use SheetDB\SheetDB;

class FetchGoogleSheetJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userId;
    public function __construct($userId)
    {
        // Không inject service ở đây để tránh lỗi serialization
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // Kiểm tra nếu user chưa đăng nhập
            $storeService = app()->make(SheetService::class);

            $sheetdb = new SheetDB('ofxb88lmfye60');
            $response = $sheetdb->get();

            if (empty($response)) {
                Log::info("❌ Không có dữ liệu từ Google Sheet!");
                return;
            }


            $normalizedData = [];
            foreach ($response as $item) {
                $normalizedItem = [];
                foreach ($item as $key => $value) {

                    $normalizedKey = Str::slug($key, '_');
                    $normalizedItem[$normalizedKey] = $value;
                }
                $normalizedData[] = (object) $normalizedItem;
            }

            // Log::info("✅ Dữ liệu sau khi chuẩn hóa:", $normalizedData);


            foreach ($normalizedData as $item) {

                $ten = $item->ten ?? null;
                $phone = $item->so_dien_thoai ?? $item->phone ?? null;
                $email = $item->email ?? null;
                $address =  null;
                $source = 'Thêm gg sheet';

                if (!$phone) {
                    Log::warning("⚠️ Thiếu số điện thoại, bỏ qua: ", (array) $item);
                    continue;
                }

                $existingUser = Customer::where('phone', $phone) ->first();
                if (isset($item->id)) {
                    $sheetdb->update('id', $item->id, ['status' => '1']);
                }

                $data = [
                    'name' => $ten,
                    'phone' => $phone,
                    'email' => $email,
                    'address' => $address,
                    'source' => $source,
                    'user_id' =>  $this->userId,
                    'product_id' => null,
                    'code' => '111111',
                    'dob' => null,
                ];

                if($item->status != 1){
                    if (!$existingUser) {
                        Log::info("✅ Tạo khách hàng mới: " . json_encode($data));

                        $client = $storeService->addNewStore($data);
                    } else {
                        Log::info("🔄 Cập nhật khách hàng: " . json_encode($data));
                        $client = $storeService->updateCustomer($existingUser->id, $data);
                    }
                }
            }
        } catch (\Exception $e) {
            Log::error("❌ Lỗi khi gọi Google Sheet: " . $e->getMessage());
        }
    }
}
