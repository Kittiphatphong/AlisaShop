<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;
class IndexCustomer extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $idCustomer;
    public $nameCustomer;
    protected $listeners = [
    'refreshTable',
  
    ];

    public function render()
    {
        return view('livewire.index-customer')
        ->with('customers',Customer::orderBy('id','desc')->paginate(8));
    }
    
    public function selectItem($id,$action){
        $this->idCustomer = $id;
    if($action == 'edit'){
        $this->dispatchBrowserEvent('openModalEdit');
        $this->emit('editCustomer',$id);
    }else{
        $this->dispatchBrowserEvent('openModalDelete');
        $this->nameCustomer = Customer::find($id)->name;
    }
}   public function delete(){
    Customer::find($this->idCustomer)->delete();
    session()->flash('message','Delete success');
    $this->dispatchBrowserEvent('closeModalDelete');
}

    public function refreshTable(){
        session()->flash('message','Success');
    }
    
}
