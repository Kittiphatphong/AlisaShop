<div>
<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product</h5>
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
    <label class="col-form-label">Price</label>
    <input type="text" class="form-control" onkeyup="format(this)" wire:model="price">
    @error('price') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
    <label class="col-form-label">Price sell</label>
    <input type="text" class="form-control" onkeyup="format(this)" wire:model="price_sell">
    @error('price_sell') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
    <label class="col-form-label">Currency</label>
    <select class="form-control" wire:model="currency">
    <option value="LAK">LAK</option>
    <option value="VND">VND</option>
    <option value="THB">THB</option>
    <option value="USD">USD</option>
    </select>
    </div>
@if($idProduct == '')
    <div class="form-group">
    <label class="col-form-label">Quantity</label>
    <input type="number" class="form-control" wire:model="quantity">
    @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    @else
    <input type="hidden" class="form-control" wire:model="quantity">
@endif
    <div class="form-group">
    <label class="col-form-label">Categories</label>
    <select class="form-control" wire:model="category_id">
    @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
    </select>
    </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" wire:click="add">Submit</button>
      </div>

  <script>
function format(input) {
  var nStr = input.value + '';  
  nStr = nStr.replace(/\,/g, "");
  x = nStr.split('.');
  x1 = x[0];
  x2 = x.length > 1 ? '.' + x[1] : '';  
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, '$1' + ',' + '$2');
  }
  input.value = x1 + x2;
}
  </script> 


</div>
