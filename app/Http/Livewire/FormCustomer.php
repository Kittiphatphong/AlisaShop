<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
class FormCustomer extends Component
{
    public $name;
    public $address;
    public $contact;
    public $whatsApp;
    public $facebook;

    public $idCustomer;
    protected $listeners = [
        'clearValidationModal',
        'editCustomer',
        
    ];
    public function clearValidationModal(){
       $this->clearData();
       $this->resetErrorBag();
       $this->resetValidation();
    }
    public function clearData(){
        $this->name = '';
        $this->address= '';
        $this->contact= '';
        $this->whatsApp= '';
        $this->facebook= '';
        $this->idCustomer= '';
    }
    protected $rules =[
        'name' => 'required|min:3',
        'address' => 'required|min:6'
    ];
    public function updated($rules)
    {
        $this->validateOnly($rules);
    }
    public function editCustomer($id){
        $this->idCustomer =$id;
        $customer = Customer::find($id);
        $this->name = $customer->name;
        $this->address= $customer->address;
        $this->contact= $customer->contact;
        $this->whatsApp= $customer->whatsApp;
        $this->facebook= $customer->facebook; 
    }
    public function phoneNo(){
        $this->whatsApp = $this->contact;
    }
    public function render()
    {
        return view('livewire.form-customer');
    }
    public function add(){
    $this->validate();
 
    if($this->idCustomer){
        $customer = Customer::find($this->idCustomer);
    }else{
        $customer = new Customer();
    }
    
    $customer->name = $this->name;
    $customer->address = $this->address;
    $customer->contact = $this->contact;
    $customer->whatsApp = $this->whatsApp;
    $customer->facebook = $this->facebook;
    $customer->save();
    
    $this->clearData();
    $this->emit('refreshTable');
    $this->dispatchBrowserEvent('closeModalAdd');
   
    }
  
}
