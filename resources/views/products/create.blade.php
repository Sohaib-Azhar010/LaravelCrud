@extends('layout.app')
@section('top')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <form method="POST" action="/Product/Store" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" name="name" id="" class="form-control" value="{{old('name')}}">
                            @if($errors->has('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Product Description</label>
                        <textarea name="description" id="" cols="30" rows="5" class="form-control" >{{old('description')}}</textarea>
                        @if($errors->has('description'))
                        <span class="text-danger">{{$errors->first('description')}}</span>
                    @endif
                        </div>
                        <div class="form-group">
                            <label for="image">Upload Image</label>
                            <input id="" class="form-control" type="file" name="image">
                            @if($errors->has('image'))
                            <span class="text-danger">{{$errors->first('image')}}</span>
                        @endif
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-dark">SUBMIT</button>
                        </div>
                       
                        

                    </form>
                </div>

            </div>

        </div>

    </div>


@endsection