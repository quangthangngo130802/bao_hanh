<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Services\BaoHiemService;
use App\Services\SignUpService;
use App\Services\StoreService;
use App\Services\ZaloOaService;
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
            // 'phone' => [
            //     'required',
            //     Rule::unique('sgo_customers')->where(function ($query) {
            //         return $query->where('user_id', Auth::user()->id);
            //     })
            // ],
            'phone' => 'required',
            'email' => 'nullable|email',
            // 'email' => [
            //     'nullable',
            //     'email',
            //     Rule::unique('sgo_customers')->where(function ($query) {
            //         return $query->where('user_id', Auth::user()->id);
            //     })
            // ],
            'dob' => 'nullable',
            'address' => 'nullable',
            'source' => 'nullable',
            'product_id' => 'nullable|exists:sgo_products,id', // Kiểm tra product_id
        ]);

        Log::info('Validation passed', $validated);

        // Tiến hành thêm khách hàng mới
        $existingUser = Customer::where('user_id',1)->where('phone', $validated['phone'])->first();
        if (!$existingUser) {
            Log::info("Start creating new customer");
            $client = $this->storeService->addNewStore($validated);
        } elseif ($existingUser) {
            Log::info("Customer is already existed, start sending message");
            $client = $this->storeService->updateCustomer($existingUser->id, $validated);
        }

        return redirect()->back();
    }

}
