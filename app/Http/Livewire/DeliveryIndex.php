<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
use Carbon\Carbon;
use Auth;
class DeliveryIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $money;
    
    public $orderId;
   
  
    protected $listeners = [
        'clearValidationModal',
    ];
    public function clearValidationModal(){
       $this->clearData();
       $this->emit('clearData');
       $this->resetErrorBag();
       $this->resetValidation();
    }
    public function clearData(){
       $this->money = '';
       $this->orderId =  '';
    }

    public function choice($id){
    $order = Order::find($id);
    $this->dispatchBrowserEvent('openModalAdd');
    $this->money = $order->sumPrice();
    $this->orderId = $id;
    }
  
    public function moneyDefault(){
        $order = Order::find($this->orderId);
        $order->money = $order->sumMoney();
        $order->moneyCurrency = 'LAK';
        $order->shipped_date = Carbon::now();
        $order->order_status = Auth::user()->id;
        $order->save();
        $this->dispatchBrowserEvent('closeModalAdd');
    }
    public function render()
    {
        return view('livewire.delivery-index')
        ->with('orders',Order::orderBy('id','desc')->paginate(10));
    }
    public function delete($id){
    Order::find($id)->delete();
    }
}
