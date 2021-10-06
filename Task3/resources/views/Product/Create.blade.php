@extends('Product.Layout')
@section('content')
<br><br>
<div class="col-md-12">
    <div class="col-md-12 margin-tb">
       <div class="pull-left">
           <h2>Add New Product</h2>
        </div>
       <div class="pull-right">
           <a class="btn btn-success" href="{{route('Product.Index')}}">Back</a>
       </div> 
    </div>
</div>

<div class="col-md-6">
    <form action="{{route('product.store')}}" method="POST">
        @csrf
            <div class="col-md-12 form-group">
                <div class="form-group">
                    <strong>Product Name</strong>
                    <input type="text" name="Product_name" value="{{old('Product_name')}}" class="form-control" placeholder="Product Name">
                </div>
                @error('Product_name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-12 form-group">
                <div class="form-group">
                    <strong>Price</strong>
                    <input type="text" name="Price" value="{{old('Price')}}" class="form-control" placeholder="Product Price">
                </div>
                @error('Price')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-12 form-group">
                <div class="form-group">
                    <strong>Quantity</strong>
                    <input type="text" name="Product_qty" value="{{old('Product_qty')}}" class="form-control" placeholder="Product Quantity">
                </div>
                @error('Product_qty')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-12 form-group">
                <div class="form-group">
                    <strong>Description</strong>
                    <textarea class="form-control" name="Description" id="" cols="20" rows="5"placeholder="Product Description"></textarea>
                </div>
                @error('Description')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-12 form-group">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

    </form>

</div>
@endsection