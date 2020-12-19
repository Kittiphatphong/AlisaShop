<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;
use App\Models\Product;
use App\Models\Customer;
class OrderItem extends Component
{
    
    public $test25,$test24;
    public function render()
    {
        return view('livewire.order.order-item')
        ->with('products',Product::orderBy('id','desc')->paginate(20));
    }

}
