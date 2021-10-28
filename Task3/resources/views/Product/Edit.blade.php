@extends('Product.Layout')
@section('content')
<br><br>
<div class="col-md-12">
    <div class="col-md-12 margin-tb">
       <div class="pull-left">
           <h2>Edit Product</h2>
        </div>
       <div class="pull-right">
           <a class="btn btn-success" href="{{route('Product.Index')}}">Back</a>
       </div> 
    </div>
</div>

<div class="col-md-6">
    <form action="{{url('Update/Product/'.$product->id)}}" method="POST">
        @csrf
            <div class="col-md-12 form-group">
                <div class="form-group">
                    <strong>Product Name</strong>
                    <input type="text" name="Product_name" class="form-control" placeholder="Product Name" value="{{$product->Product_name}}">
                </div>
            </div>
            <div class="col-md-12 form-group">
                <div class="form-group">
                    <strong>Price</strong>
                    <input type="text" name="Price" class="form-control" placeholder="Product Price" value="{{$product->Price}}">
                </div>
            </div>
            <div class="col-md-12 form-group">
                <div class="form-group">
                    <strong>Quantity</strong>
                    <input type="text" name="Product_qty" class="form-control" placeholder="Product Quantity"value="{{$product->Product_qty}}">
                </div>
            </div>
            <div class="col-md-12 form-group">
                <div class="form-group">
                    <strong>Description</strong>
                    <textarea class="form-control" name="Description" id="" cols="20" rows="5"value="{{$product->Description}}"></textarea>
                </div>
            </div>
            <div class="col-md-12 form-group">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

    </form>

</div>
@endsection