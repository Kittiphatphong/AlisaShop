<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;
class ProductIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $rules = [
    'addQuantity' => 'required|numeric'
    ];
    public $addQuantity=0;
    public function increment()
    {
        $this->addQuantity++;
    }
    public function decrement()
    {
        $this->addQuantity--;
    }

    protected $listeners =[
    'refreshTable'
    ];
    public function render()
    {
        return view('livewire.product-index')
        ->with('products',Product::orderBy('id','desc')->paginate(8));
        
    }
    public $selectId;
    public $nameProduct;
    public function selectItem($id,$action){
        $this->selectId = $id;
    if($action == "delete"){
        $this->dispatchBrowserEvent('openModalDelete');
        $this->nameProduct = Product::find($id)->name;
    }
    else{
        $this->dispatchBrowserEvent('openModalEdit');
        $this->emit('editProduct',$id);
    }
    }
    public function delete(){
     Product::find($this->selectId)->delete();
     session()->flash('message','Delete success');
       $this->dispatchBrowserEvent('closeModalDelete');   
    }

    public function refreshTable(){
        session()->flash('message','Success');
    }
    public function updateQuantity($id){
        $this->validate();
    $product = Product::find($id);
    $product->quantity = $product->quantity+$this->addQuantity;
    $product->save();
    $this->addQuantity = 0;
    session()->flash('message','Update [ '.$product->name .' ] success');
    }
}