<div>
  <div>
  <div class="fixed-bottom">
<div class="d-flex justify-content-start">

<button class="btn btn-link ml-2 mb-2" data-toggle="modal" data-target="#form-product" data-whatever="@fat">
<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg>
</button>
</div>
</div>
<div class="clearfix">
@if(session()->has('message'))
<span class="text-success float-right">{{session('message')}}</span>

@endif
@error('addQuantity')<span class="text-danger float-right">{{ $message }}</span> @enderror

</div>
<hr class="mb-3">
<section>
       @foreach($products as $product)


       <div class="row mb-3">
            <div class=" col-lg-9 col-xl-9">
              <div>
                <div class="d-flex justify-content-between">
                  <div>
                  
                  <div x-data="{ open: false }" >
       <div class="d-flex justify-content-start">
        <button @click="open = true" class="mr-2 block text-left">
        <h5>{{$product->name}}</h5>
        
        </button>
      
        </div>
        <div x-show="open" @click.away="open = false" class="mt-1 bg-light  rounded">
        <ul>
        <p class="mb-3 text-muted text-uppercase small ">{{$product->categories->name}}</p>
        <p class="mb-0"><span><strong id="summary">Sell: {{number_format($product->price_sell)}} {{$product->currency}}</strong></span></p class="mb-0">
        <li>Cost: {{number_format($product->price)}} {{$product->currency}}</li>
        <li>Quantity: {{number_format($product->quantity)}}</li>
        </ul>
        <button class="btn btn-warning btn-sm " wire:click="selectItem({{$product->id}},'edit')">Edit</button>
        <button class="btn btn-danger btn-sm"  wire:click="selectItem({{$product->id}},'delete')">Delete</button>
        </div>
        </div>
        
                   
                  
                  </div>
                  <div>
                 
                    
                    <div x-data="{ open: false }" class="row form-text mr-2">
        <button @click="open = true">(Note, {{number_format($product->quantity)}} piece)</button>
        <div x-show="open" @click.away="open = false" >
          <div class="d-flex justify-content-start">
          <div class="number-input rounded">
        <button  wire:click="decrement"></button>
        <input class="quantity" min="0" name="quantity" value="1" type="number" wire:model.debounce.0ms="addQuantity">
        <button  class="plus" wire:click="increment"></button>
      </div>
     
            <button class="btn btn-success ml-2" wire:click="updateQuantity({{$product->id}})" onclick="confirm('Amount {{$addQuantity}} is correct ?') || event.stopImmediatePropagation()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
</svg>
</button>

            </div>
        </div>
    </div>
                    
                  </div>
                </div>
         
              </div>
            </div>
          </div>
          <hr class="mb-3">

      
       @endforeach
    
    {{$products->links()}}
    </section>


    <div class="modal fade" id="form-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    @livewire('product-form')
    </div>
  </div>
</div>


<div class="modal fade" id="form-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you want to delete {{$nameProduct}}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" wire:click="delete">Yes</button>
      </div>
    </div>
  </div>
</div>
  

<script>
window.addEventListener('closeModalAdd', event =>{
    $('#form-product').modal('hide');
})
window.addEventListener('openModalEdit', event =>{
    $('#form-product').modal('show');
})
window.addEventListener('closeModalDelete', event =>{
    $('#form-delete').modal('hide');
})
window.addEventListener('openModalDelete', event =>{
    $('#form-delete').modal('show');
})
$(document).ready(function(){
  $("#form-product").on('hide.bs.modal', function(){
    livewire.emit('clearValidationModal');
  });
});
</script>
</div>


