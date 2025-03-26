<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'products'; // Đổi tên bảng
    protected $fillable = ['masp', 'name', 'warranty_period'];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
