<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
class DeliveryIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.delivery-index')
        ->with('orders',Order::orderBy('id','desc')->paginate(10));
    }
    public function delete($id){
    Order::find($id)->delete();
    }
}
