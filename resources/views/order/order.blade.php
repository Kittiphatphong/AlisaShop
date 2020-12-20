<x-app-layout>
    <x-slot name="header">
        <a href="{{route('orderList')}}"><h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            Orders
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
   <livewire:order.order-item/>
</x-app-layout>
