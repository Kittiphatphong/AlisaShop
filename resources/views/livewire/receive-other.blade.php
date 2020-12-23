<div>
<div class="form-group d-flex justify-content-center mx-5">
      
      <input type="text" class="form-control" placeholder="Money" wire:model="otherMoney" onkeyup="format(this)">
      
      <select wire:model="otherCurrency">
      <option value="LAK">LAK</option>
      <option value="THB">THB</option>
      <option value="USD">USD</option>
      <option value="VND">VND</option>
      </select>
      
      </div >
      @error('otherMoney') <span class="mx-5 text-danger">{{ $message }}</span> @enderror
      <div class="d-flex justify-content-center mx-5">
      <button class="btn btn-primary  mx-5 mb-3 col-4" wire:click="otherChoice">Other</button>
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
