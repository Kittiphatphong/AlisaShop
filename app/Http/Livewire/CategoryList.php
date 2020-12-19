<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class CategoryList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $idCategory;
    public $nameCategory;
    protected $listeners = [
    'refreshTable',
    ];

    public function render()
    {
        return view('livewire.category-list')
        ->with('categories',Category::orderBy('id','desc')->paginate(8));
    }

    public function selectItem($id,$action){
        $this->idCategory = $id;
    if($action == 'edit'){
        $this->dispatchBrowserEvent('openModalEdit');
        $this->emit('editCategory',$id);
    }else{
        $this->dispatchBrowserEvent('openModalDelete');
        $this->nameCategory = Category::find($id)->name;
    }
}   public function delete(){
    Category::find($this->idCategory)->delete();
    session()->flash('message','Delete success');
    $this->dispatchBrowserEvent('closeModalDelete');
}

    public function refreshTable(){
        session()->flash('message','Success');
    }

    
}
