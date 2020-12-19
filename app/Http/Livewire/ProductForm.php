<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Auth;
use DB;
class ProductForm extends Component
{
    public $name;
    public $price;
    public $price_sell;
    public $currency;
    public $quantity;
    public $category_id;
    public $idProduct;
    protected $listeners = [
        'clearValidationModal',
        'editProduct'
    ];
 
    public function editProduct($id){
        $this->idProduct = $id;
    $product = Product::find($id);
    $this->name = $product->name;
    $this->price = $product->price;
    $this->price_sell = $product->price_sell;
    $this->currency = $product->currency;
    $this->quantity = $product->quantity;
    $this->category_id = $product->category_id;
    }   

    public function clearData(){
        $this->name= '';
        $this->price ='';
        $this->price_sell='';
        $this->quantity ='';
        $this->idProduct='';
    }
    public function clearValidationModal(){
       $this->clearData();
       $this->resetErrorBag();
       $this->resetValidation();
    }
    
    public function render()
    {
        return view('livewire.product-form')->
        with('categories',Category::all());
    }
    protected $rules =[
        'name' => 'required',
        'price' => 'required',
        'price_sell' => 'required',
        'quantity' => 'required|numeric' 
    ];
    public function updated($rules){
        $this->validateOnly($rules);  
    }

    public function add(){
        $this->validate();
        if(!$this->currency){
            $this->currency ='LAK';
        }
        if(!$this->category_id){
            $this->category_id = DB::table('categories')->max('id');
        }
    $data = [
        'name' => $this->name,
        'price' => round(str_replace(',','',$this->price)),
        'price_sell' => round(str_replace(',','',$this->price_sell)),
        'currency' => $this->currency,
        'quantity' => $this->quantity,
        'category_id' => $this->category_id, 
        'user_id' => Auth::user()->id
    ];
    if($this->idProduct){
    Product::find($this->idProduct)->update($data);
    }else{
    $product = new Product($data);
    $product->save();
    }

    $this->clearData();
    $this->emit('refreshTable');
    $this->dispatchBrowserEvent('closeModalAdd');
    


    }
}
