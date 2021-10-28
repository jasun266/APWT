@extends('Product.Layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">

       <div class="pull-left">
           <h2>Product List</h2>
        </div>

       <div class="pull-right">
           <a class="btn btn-success" href="{{route('Product.Index')}}">Continue Shopping</a>

       </div> 

    </div>
    <table class="table table-bordered">
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>QTY</th>
            <th>Sub Total</th>
        </tr>
        <tr>
            @php $total =0; @endphp
            


            @if(Session('cart'))
             @foreach(Session('cart') as $id=> $product)
             @php $sub = $product['price']*$product['Qty'];
                  $total += $sub;
             @endphp
                <td>{{$product['name']}}</td>
                <td>{{$product['price']}}</td>
                <td>{{$product['Qty']}}</td>
                <td>{{$sub}}</td>
                </tr>
             @endforeach
            @endif
           

        

    </table>
    <div class="col-lg-6 margin-tb">

       <div class="pull-right">
           <h2>Total = {{$total}}</h2>
        </div>

        
</div>
@endsection