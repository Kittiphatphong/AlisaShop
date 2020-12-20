<div>
@foreach($orders as $order)
<div class="d-flex justify-content-between flex-wrap">
                  <div>
  
                    <h5>ORDER ID: {{$order->id}}

                    
                    </h5>
                    
                    <p class="mb-3 text-muted text-uppercase small">BY {{$order->users->name}}                  
                      @if(!$order->order_status)
       <button class="float-left mr-1" onclick="confirm('Do you want to delete order id {{$order->id}} ?') || event.stopImmediatePropagation()" wire:click="delete({{$order->id}})">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
        </svg>
        </button>       
    @endif 
  </p>
                    <p class="text-muted text-uppercase small">{{$order->product_orders->sum('quantity')}} ITEM</p>
                    <p class="mb-2"><span><strong id="summary">{{$order->sumPrice()}}</strong></span></p class="mb-0">
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
</div>
