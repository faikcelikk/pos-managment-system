<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['name', 'phone', 'address', 'product_id'];

    public function orderdetail()
    {
        return $this->hasMany(Order_Detail::class);
    }
}
