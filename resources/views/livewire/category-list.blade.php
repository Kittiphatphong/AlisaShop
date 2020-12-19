<div>

<button class="btn btn-dark mb-1" data-toggle="modal" data-target="#form-category" data-whatever="@fat">Add</button>
@if(session()->has('message'))
<span class="text-success float-right">{{session('message')}}</span>
@endif

    <div class="table-responsive-sm rounded" >
    <table class="table table-bordered ">
       <thead class="bg-light">
       <tr>
       <th>Name</th>
       <th>Total</th>
       </tr>
       </thead>
       <tbody>
       @foreach($categories as $category)
       <tr>
       <td><div x-data="{ open: false }" class="row pl-2">
        <button @click="open = true"><p class="overflow-auto">{{$category->name}}</p></button>
        <div x-show="open" @click.away="open = false" class="position-absolute-right">
            <button class="btn btn-warning btn-sm" wire:click="selectItem({{$category->id}},'edit')">Edit</button>
            <button class="btn btn-danger btn-sm"  wire:click="selectItem({{$category->id}},'delete')">Delete</button>
        </div>
    </div></td>
       <td>{{number_format($category->products->sum('quantity'))}}</td>
       </tr>
       @endforeach
       </tbody>
    </table>
    {{$categories->links()}}
    </div>


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
