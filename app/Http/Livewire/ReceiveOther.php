<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use Auth;
use Carbon\Carbon;
class ReceiveOther extends Component
{
    public $otherMoney;
    public $otherCurrency;
    public $orderId;
    protected $rules =[
        'otherMoney' => 'required',
       
    ];
    public function render()
    {
        return view('livewire.receive-other');
    }
    protected $listeners = [
        'clearData',
        'getId'
        
    ];
    public function getId($id){
      $this->orderId = $id;
    }
    public function otherChoice(){
        if(!$this->otherCurrency){
            $this->otherCurrency = "LAK";
        }
       
        $this->dispatchBrowserEvent('openModalAdd');
        $this->validate();
        $order = Order::find($this->orderId);
        $order->money = round(str_replace(',','',$this->otherMoney));
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
