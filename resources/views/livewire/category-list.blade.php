<div>
<div class="fixed-bottom">
<div class="d-flex justify-content-start">

<button class="btn btn-link ml-2 mb-2" data-toggle="modal" data-target="#form-category">
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
</div>
<hr class="mb-3">


       @foreach($categories as $category)
       <div class="row mb-3">
            <div class=" col-lg-9 col-xl-9">
              <div>
                <div class="d-flex justify-content-between">
                  <div>
                  <div x-data="{ open: false }" class="row pl-2">
        <button @click="open = true"><p class="overflow-auto">{{$category->name}}</p></button>
        <div x-show="open" @click.away="open = false" class="position-absolute-right">
            <button class="btn btn-warning btn-sm" wire:click="selectItem({{$category->id}},'edit')">Edit</button>
            <button class="btn btn-danger btn-sm"  wire:click="selectItem({{$category->id}},'delete')">Delete</button>
        </div>
    </div>
      
        
                  </div>
                  <div>
                 
                  Total: {{number_format($category->products->sum('quantity'))}}
                    
                  </div>
                </div>
         
              </div>
            </div>
          </div>
          <hr class="mb-3">

    
       @endforeach
   
    {{$categories->links()}}
  


    <div class="modal fade" id="form-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    @livewire('form-category')
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
        Do you want to delete {{$nameCategory}}?
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
    $('#form-category').modal('hide');
})
window.addEventListener('openModalEdit', event =>{
    $('#form-category').modal('show');
})
window.addEventListener('closeModalDelete', event =>{
    $('#form-delete').modal('hide');
})
window.addEventListener('openModalDelete', event =>{
    $('#form-delete').modal('show');
})
$(document).ready(function(){
  $("#form-category").on('hide.bs.modal', function(){
    livewire.emit('clearValidationModal');
  });
});
</script>
</div>
