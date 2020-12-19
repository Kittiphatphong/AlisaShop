<div>

<button class="btn btn-dark mb-1" data-toggle="modal" data-target="#form-customer" data-whatever="@fat">Add</button>
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
       @foreach($customers as $customer)
       <tr>
       <td><div x-data="{ open: false }" >
       <div class="d-flex justify-content-start">
        <button @click="open = true" class="mr-2"><p class="overflow-auto">{{$customer->name}}</p></button>
        <div x-show="open" @click.away="open = false" >
            <button class="btn btn-warning btn-sm " wire:click="selectItem({{$customer->id}},'edit')">Edit</button>
            <button class="btn btn-danger btn-sm"  wire:click="selectItem({{$customer->id}},'delete')">Delete</button>
        </div>
        </div>
        <div x-show="open" @click.away="open = false" class="mt-1 bg-light pl-1 rounded">
        <ul>
        <li>Address: {{$customer->address}}</li>
        @if($customer->contact) <li>Phone no: {{$customer->contact}}</li>@endif
        @if($customer->whatsApp) <li>Whatsapp: {{$customer->whatsApp}}</li>@endif
        @if($customer->facebook) <li>Facebook: {{$customer->facebook}}</li>@endif
        </ul>
        </div>
        </div>
    </div></td>
       <td>
       <div x-data="{ open: false }">
        <button @click="open = true">20</button>

        <ul x-show="open" @click.away="open = false" class="bg-light">
            <li>Data</li>
            <li>Data</li>
        </ul>
    </div>
       </td>
       </tr>
       @endforeach
       </tbody>
    </table>
    {{$customers->links()}}
    </div>


    <div class="modal fade" id="form-customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <livewire:form-customer/>
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
        Do you want to delete {{$nameCustomer}}?
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
    $('#form-customer').modal('hide');
})
window.addEventListener('openModalEdit', event =>{
    $('#form-customer').modal('show');
})
window.addEventListener('closeModalDelete', event =>{
    $('#form-delete').modal('hide');
})
window.addEventListener('openModalDelete', event =>{
    $('#form-delete').modal('show');
})
$(document).ready(function(){
  $("#form-customer").on('hide.bs.modal', function(){
    livewire.emit('clearValidationModal');
  });
});
</script>
</div>

