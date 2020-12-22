<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use Auth;
class ReceiveOther extends Component
{
    public $otherMoney;
    public $otherCurrency;
    public $orderId;
    public function render()
    {
        return view('livewire.receive-other');
    }
    protected $listeners = [
        'clearData',
        'getId'
        
    ];
    public function getId($id=26){
    $this->orderId = $id;
    }
    public function otherChoice(){
        if(!$this->otherCurrency){
            $this->otherCurrency = "LAK";
        }
      
        $this->dispatchBrowserEvent('openModalAdd');
        $order = Order::find($this->orderId);
        $order->money = $this->otherMoney;
        $order->moneyCurrency = $this->otherCurrency;
        $order->shipped_date = Carbon::now();
        $order->order_status = Auth::user()->id;
        $order->save();
        $this->dispatchBrowserEvent('closeModalAdd');
    }
    public function clearData(){
        $this->otherMoney = '';
        $this->otherCurrency = "LAK";
        $this->orderId ='' ;
       
     }
}
