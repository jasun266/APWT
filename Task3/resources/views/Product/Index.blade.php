@extends('Product.Layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
       <div class="pull-left">
           <h2>Product List</h2>
        </div>
       <div class="pull-right">
           <a class="btn btn-success" href="{{route('Product.create')}}">Create New Product</a>
       </div> 
    </div>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>QTY</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <tr>
            @foreach($product as $p)
            <td>{{$p->id }}</td>
            <td>{{$p->Product_name }}</td>
            <td>{{$p->Price }}</td>
            <td>{{$p->Product_qty }}</td>
            <td>{{$p->Description }}</td>
            <td>
                <a class="btn btn-success" href="{{URL::to('Edit/Product/'.$p->id)}}">Edit</a>
                <a class="btn btn-danger" href="{{URL::to('Delete/product/'.$p->id)}}" onclick="return confirm('Are You Sure?')">Delete</a>
                <a class="btn btn-info" href="{{URL::to('Edit/Product/'.$p->id)}}">Add to Cart</a>
            </td>
            

        </tr>
        @endforeach

    </table>
    {!!$product->links() !!}
</div>
@endsection