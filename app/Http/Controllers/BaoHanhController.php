<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\SanPham;
use App\Models\User;
use App\Services\BaoHiemService;
use App\Services\SignUpService;
use App\Services\StoreService;
use App\Services\ZaloOaService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BaoHanhController extends Controller
{
    //
    protected $storeService;
    protected $signUpService;
    protected $zaloOaService;
    public function __construct(BaoHiemService $storeService, SignUpService $signUpService, ZaloOaService $zaloOaService)
    {
        $this->storeService = $storeService;
        $this->signUpService = $signUpService;
        $this->zaloOaService = $zaloOaService;
    }

    public function index(){
        return view('baohiem');
    }

    public function baohanh(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',
            'dob' => 'nullable',
            'address' => 'nullable',
            'source' => 'nullable',
            'product_id' => 'nullable|exists:sgo_products,id', // Kiểm tra product_id
            'masp' => 'required',
            'address_buy' => 'required'
        ]);

        $sanpham = SanPham::where('masp', $validated['masp'])->first();
        if(!$sanpham){
            return redirect()->back()->with('error', 'Mã sản phẩm không tồn tại.');
        }

        $validated['product_name'] = $sanpham->name;
        $validated['warranty_period'] = $sanpham->warranty_period.' Tháng';

        Log::info('Validation passed', $validated);
        $user = User::first();

        $validated['user_id'] = $user->id;

        $client = new Client();
        $url = env('API_URL_BAO_HANH').'/api/bao-hanh-san-pham';
        $response = $client->post($url, [
            'json' => $validated // Dữ liệu gửi đi
        ]);
        if ($response->getStatusCode() == 200 ) {

            $customer = Customer::create([
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'email' => $validated['email'] ?? null,
                'address' => $validated['address'] ?? null,
                'source' =>  'Kích hoạt bảo hành thủ công',
                'user_id' => $user->id,
                'code'  => $this->generateCode($validated['phone']).'_'.$sanpham->masp,
                'product_id' =>  $sanpham->id,
            ]);
            return redirect()->back()->with('success', 'Thành công!');
        }

        return redirect()->back()->with('error', 'Không thành công!');
    }

    public function generateCode($phone)
    {
        $lastFourDigits = substr($phone, -4);
        $prefix = User::first()->prefix;
        return $prefix . '_' . $lastFourDigits;
    }

    public function apibaohanh(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',
            'dob' => 'nullable',
            'address' => 'nullable',
            'source' => 'nullable',
            'product_id' => 'nullable|exists:sgo_products,id', // Kiểm tra product_id
            'masp' => 'required',
            'address_buy' => 'required'
        ]);

        $sanpham = SanPham::where('masp', $validated['masp'])->first();
        if(!$sanpham){
            return redirect()->back()->with('error', 'Mã sản phẩm không tồn tại.');
        }

        $validated['product_name'] = $sanpham->name;
        $validated['warranty_period'] = $sanpham->warranty_period.' Tháng';

        Log::info('Validation passed', $validated);
        $user = User::first();

        $validated['user_id'] = $user->id;

        $client = new Client();
        $url = env('API_URL_BAO_HANH').'/api/bao-hanh-san-pham';
        $response = $client->post($url, [
            'json' => $validated // Dữ liệu gửi đi
        ]);
    }

}
