<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
class FormCategory extends Component
{
    public $name;
    public $idCategory;
    protected $listeners = [
        'clearValidationModal',
        'editCategory'
    ];
    public function clearValidationModal(){
       $this->clearData();
       $this->resetErrorBag();
       $this->resetValidation();
    }
    public function clearData(){
        $this->name = '';
        $this->idCategory = '';
    }
    protected $rules =[
        'name' => 'required|min:3'
    ];
    public function updated($rules)
    {
        $this->validateOnly($rules);
    }
    public function editCategory($id){
        $this->idCategory =$id;
         $category = Category::find($id);
         $this->name = $category->name;
    }
  
    

    public function render()
    {
        return view('livewire.form-category');
    }
    public function add(){
    $this->validate();
    $data = [
        'name' => $this->name
    ];
    if($this->idCategory){
        $category = Category::find($this->idCategory)->update($data);
    }else{
        $category = new Category($data);
        $category->save();
    }
    
    $this->clearData();
    $this->emit('refreshTable');
    $this->dispatchBrowserEvent('closeModalAdd');
    
    }
}
