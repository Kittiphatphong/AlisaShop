<x-app-layout>
    <x-slot name="header">
        <a href="{{route('orderList')}}"><h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            Detail Order
        </h2></a>
    </x-slot>
    @if($errors->any())
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p class="border">{{$error}}</p>
            @endforeach
        </div>
    @endif
    @if(Session()->has('success'))
                        <div class="alert alert-success">
                            {{ Session()->get('success') }}
                        </div>
            @endif
            @if(Session()->has('warning'))
                        <div class="alert alert-danger">
                            {{Session()->get('warning')}}
                        </div>
            @endif
       
  
    <div class="modal-content container mt-5">
    <div class="d-flex align-content-center flex-wrap btn-primary rounded">
    <p class="mt-2 ml-3">ORDER ID: {{$order->id}}</p>
    <p class="mt-2 ml-3">ORDER BY: {{$order->users->name}}</p>
    <p class="mt-2 ml-3">ITEM: {{$order->product_orders->sum('quantity')}}</p>
    <p class="mt-2 ml-3">TOTAL: {{$order->sumPrice()}}</p>
    <p class="mt-2 ml-3">CUSTOMER: {{$order->customers->name}}</p>
    </div>
      
        <form action="{{route('order.update',$order->id)}}" method="post">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Delivery</label>
            <input id="jay" class="form-control" name="requireDate"/>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Remark:</label>
            <textarea class="form-control" id="message-text" name="remark">{{$order->remark}}</textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary btn-block">Check out</button>
      </div>
      </form>
    </div>
  
    <script>
        $('#jay').datetimepicker({
            uiLibrary: 'bootstrap4',
            modal: true,
            footer: true
        });
    </script>
</x-app-layout>
