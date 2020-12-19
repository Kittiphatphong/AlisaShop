<div>
<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <div class="form-group">
    <label class="col-form-label">Name</label>
    <input type="text" class="form-control" wire:model="name">
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
    <label class="col-form-label">Address</label>
    <input type="text" class="form-control" wire:model="address">
    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    
    <div class="form-group">
    <label class="col-form-label">Phone no</label>
    <input type="text" class="form-control" wire:model="contact">
    @error('contact') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
    <label class="col-form-label">Whatsapp</label>
    <div class="input-group">
    <div class="input-group-prepend" wire:click="phoneNo">
          <span class="input-group-text" id="inputGroupPrepend">Phone no</span>
        </div>
    <input type="text" class="form-control" wire:model="whatsApp">
    </div>
    @error('whatsApp') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    
    <div class="form-group">
    <label class="col-form-label">Facebook</label>
    <input type="text" class="form-control" wire:model="facebook">
    @error('facebook') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>
    
    
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" wire:click="add">Submit</button>
      </div>
   
</div>


