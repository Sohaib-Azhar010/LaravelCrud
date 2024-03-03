@extends('layout.app')
@section('top')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 mt-4">
            <div class="card p-4">
                <p><b>Product ID :</b>{{$product->id}}</p>
                <p><b>Name : </b>{{$product->name}}</p>
                <p><b>Description : </b>{{$product->description}}</p>
                <img src="/Products/{{$product->image}}" alt="" class="rounded" width="100%">

            </div>
        </div>
    </div>
</div>

@endsection