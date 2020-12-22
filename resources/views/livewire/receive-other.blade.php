<div>
<div class="form-group d-flex justify-content-center mx-5">
      
      <input type="search" class="form-control" placeholder="Money" wire:model="otherMoney">
      <select wire:model="otherCurrency">
      <option value="LAK">LAK</option>
      <option value="THB">THB</option>
      <option value="USD">USD</option>
      <option value="VND">VND</option>
      </select>
      
      </div>
      <button class="btn btn-primary mx-5 mb-3" wire:click="otherChoice">Other</button>
     
</div>
