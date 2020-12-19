<div>
<div class="fixed-bottom">
<div class="d-flex justify-content-start">

<button class="btn btn-link ml-2 mb-2" data-toggle="modal" data-target="#CartForm">
<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
</svg>
</button>
</div>
</div>
{{$test25}}
@foreach($products as $product)
<div class="row mb-3">
            <div class=" col-lg-9 col-xl-9">
              <div>
                <div class="d-flex justify-content-between">
                  <div>
                    <h5>{{$product->name}}</h5>
                    <p class="mb-3 text-muted text-uppercase small">{{$product->categories->name}}</p>
                    <p class="mb-0"><span><strong id="summary">{{number_format($product->price_sell)}} {{$product->currency}}</strong></span></p class="mb-0">
                  
                  </div>
                  <div>
                    <div class="def-number-input number-input safari_only mb-0 w-100">
                      <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus decrease"></button>
                      <input class="quantity" min="0" name="quantity" value="0" type="number" wire:model="test{{$product->id}}">
                      <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus increase"></button>
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted text-center">
                      (Note, 1 piece)
                    </small>
                  </div>
                </div>
         
              </div>
            </div>
          </div>
          <hr class="mb-3">
          @endforeach
         


   <!-- Modal -->
  <div class="modal fade" id="CartForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mx-auto">List Order</h5>
          <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         
        @foreach($products as $product)
<div class="row mb-3">
            <div class=" col-lg-9 col-xl-9">
              <div>
                <div class="d-flex justify-content-between">
                  <div>
                    <h5>{{$product->name}}</h5>
                    <p class="mb-3 text-muted text-uppercase small">{{$product->categories->name}}</p>
                    <p class="mb-0"><span><strong id="summary">{{number_format($product->price_sell)}} {{$product->currency}}</strong></span></p class="mb-0">
                  
                  </div>
                  <div>
                    <div class="def-number-input number-input safari_only mb-0 w-100">
                      <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus decrease"></button>
                      <input class="quantity" min="0" name="quantity" value="0" type="number">
                      <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus increase"></button>
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted text-center">
                      (Note, 1 piece)
                    </small>
                  </div>
                </div>
         
              </div>
            </div>
          </div>
          <hr class="mb-3">
          @endforeach



        </div>
      
      </div>
    </div>
  </div>       
</div>