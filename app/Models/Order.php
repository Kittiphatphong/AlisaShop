<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function customers(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
    public function product_orders(){
        return $this->hasMany(Product_Order::class,'order_id');
    }
    public function sumPrice(){
        $countPrice = 0;
        foreach($this->product_orders as $all){
        $countPrice += $all->quantity * $all->discount;
        }
        return number_format($countPrice)." LAK";
    }
}
