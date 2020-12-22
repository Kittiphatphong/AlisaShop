<div>
@foreach($orders as $order)
<div class="d-flex justify-content-between flex-wrap">
                  <div>
                  @if(!$order->order_status)
       <button class="float-left mr-1 clear-both" onclick="confirm('Do you want to delete order id {{$order->id}} ?') || event.stopImmediatePropagation()" wire:click="delete({{$order->id}})">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
        </svg>
        </button> 
        <br>      
    @endif 
    
                    <button class="text-left bg-light rounded mb-2" data-toggle="modal" data-whatever="@fat" wire:click="choice({{$order->id}})">
                    <h5>ORDER ID: {{$order->id}}</h5>
                    <p class="mb-0 text-muted text-uppercase small">BY {{$order->users->name}}                  </p>
                    <p class="text-muted text-uppercase small">{{$order->product_orders->sum('quantity')}} ITEM</p>
                    <p><span><strong id="summary">{{$order->sumPrice()}}</strong></span></p class="mb-0">
                    </button>
                    <div x-data="{ open: false }">
        <button @click="open = true"><p class="bg-light rounded">BUYER: {{$order->customers->name}}</p></button>
       <a href="{{route('order.formDetail',$order->id)}}">
        <ul x-show="open" @click.away="open = false">
            <li>{{$order->customers->address}}</li>
            @if($order->customers->contact)<li>TEL:{{$order->customers->contact}}</li>@endif
            @if($order->customers->whatsApp)<li>WA:{{$order->customers->whatsApp}}</li>@endif
            @if($order->customers->facebook)<li>FB:{{$order->customers->facebook}}</li>@endif
            @if($order->remark)<li>{{$order->remark}}</li>@endif
        </ul>
        </a>
    </div>
                  </div>
                  <div x-data="{ open: false }">
                <button @click="open = true">
                <div>
                  @if($order->order_status)
                  <span class="badge badge-success float-right">Success</span>
                  @else
                  <span class="badge badge-warning float-right">Pending</span>
                  @endif
                  <br>
                  @if($order->money)
                 <p class="float-right clear-both">{{number_format($order->money)}} {{$order->moneyCurrency}}</p>
                 <br>
                 @endif
                  @if($order->required_date)
                    <small id="passwordHelpBlock" class="form-text text-muted text-center">
                      {{$order->required_date}}
                    </small>
                   @endif 
                   @if($order->shipped_date)
                    <small id="passwordHelpBlock" class="form-text text-success text-center">
                      {{$order->shipped_date}}
                    </small>
                   @endif 
                  </div>
                </button>
                 
                <ul x-show="open" @click.away="open = false" class="bg-light rounded">
                @foreach($order->product_orders as $item)
                    <li>  
                    <small id="passwordHelpBlock" class="form-text text-muted">
                  
                      {{$item->products->name}}  
                     
                    </small>
                    
                    <small class="form-text text-muted">
                    {{$item->quantity}} * {{number_format($item->discount)}}
                    </small>
                    <small>
                    {{number_format($item->discount * $item->quantity)}}
                    </small>
                    <hr>
                    </li>
                @endforeach   
                </ul>
    </div>

         
                

            
                
                  
                </div>
          <hr class="mb-3">
@endforeach        
{{$orders->links()}}  


<div class="modal fade" id="money" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">RECEIVE MONEY ORDER ID : {{$orderId}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
     
      <button class="btn btn-success mx-5 my-3" wire:click="moneyDefault">{{$money}}</button>
     @livewire('receive-other')
    </div>
  </div>
</div>
<script>
  window.addEventListener('closeModalAdd', event =>{
    $('#money').modal('hide');
})
window.addEventListener('openModalAdd', event =>{
    $('#money').modal('show');
})
$(document).ready(function(){
  $("#money").on('hide.bs.modal', function(){
    livewire.emit('clearValidationModal');
  });
});
</script>
</div>
