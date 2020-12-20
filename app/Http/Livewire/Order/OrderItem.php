<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;
use App\Models\Product;
use App\Models\Customer;
class OrderItem extends Component
{
    
    public $test="jay";
    protected $listeners = [
        'refreshTable',
      
        ];
    public function render()
    {
        return view('livewire.order.order-item')
        ->with('products',Product::orderBy('id','desc')->paginate(10))
        ->with('customers',Customer::orderBy('id','desc')->get());
    }
  public function refreshTable(){
        session()->flash('message','Success');
    }
}
