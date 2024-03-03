@extends('layout.app')
@section('top')
    <div class="container">
        <table class="table table-hover table-bordered mt-5">
            <thead class="thead-dark">
                <tr>
                    <th>SrNo.</th>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td><a href="Product/{{$product->id}}/view" class="text-dark">{{$product->name}}</a></td>
                    <td><img src="Products/{{$product->image}}" alt="" class="rounded-circle" width="30px" height="30px"></td>
                    <td>
                        <a href="Product/{{$product->id}}/edit" class="btn btn-success btn-sm">Edit</a>

                        <form method="POST" action="Product/{{$product->id}}/delete" class="d-inline">
                            @csrf
                            @method('DELETE')
                        
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    
                    </td>
                </tr>
                @endforeach

            </tbody>
           
        </table>
        {{$products->links()}}
        <div class="text-right">
            <a href="Product/Create" class="btn btn-dark mt-2">Add New Product</a>

        </div>
    </div>

@endsection