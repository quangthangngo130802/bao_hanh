<?php

namespace App\Models;

use App\Models\SanPham;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'sgo_customers';
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'source',
        'city_id',
        'district_id',
        'ward_id',
        'user_id',
        'product_id',
        'code',
        'dob'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function campaignDetails()
    {
        return $this->hasMany(CampaignDetail::class, 'customer_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'product_id');
    }
}
