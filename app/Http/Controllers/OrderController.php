<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product_Order;
use Auth;
use Carbon\Carbon;
class OrderController extends Controller
{
    public function index(){
        return view('order.order')
        ->with('products',Product::orderBy('id','desc')->paginate(10))
        ->with('customers',Customer::orderBy('id','desc')->get());
    }
    public function store(Request $request){
        $this->validate($request,[
            'customer'=>'required',
            
            'id' => 'required',
            
        ]);
        $order = new Order();
        $order->customer_id = $request->customer;
        $order->user_id = Auth::user()->id;
        $order->save();

        foreach($request->id as $id){
        $all[] = explode(',', $id);
        $order_item = new Product_order();
        foreach($all as $value){
        $order_item->order_id = $order->id;
        $order_item->product_id = $value[0];
        $order_item->quantity = $value[2];
        $order_item->discount = $value[1];
        }
        $order_item->save();
        }
    
        return redirect()->route('order.formDetail',$order->id);
      
    }
    public function formDetail($id){
        $order = Order::find($id);

    return view('order.orderFormDetail')
    ->with('order',$order);
    }

    public function delivery(){
        return view('order.delivery');
    }
    public function update(Request $request,$id){
        $order = Order::find($id);
        $order->remark = $request->get('remark');
        $order->required_date = Carbon::create($request->requireDate)->toDateTimeString();
        $order->save();
        return redirect()->route('delivery.show')
        ->with('success',"Order success");
        
    }
}
