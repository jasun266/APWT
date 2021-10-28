<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;
use App\Models\Cart;
use Session;

class ProductController extends Controller
{
    public $totalQty=0;
    public function Index()
    {
        $product=DB::table('_products')->latest()->paginate(3);
        return view('Product.Index',compact('product'));
    }
    public function Layout()
    {
        return view('Layout');
    }
    public function create()
    {
        return view('Product.Create');
    }
    public function Cart()
    {
        return view('Product.Cart');
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'Product_name'=>'required|min:5|max:10',
            'Price'=>'required',
            'Product_qty'=>'required',
            'Description'=>'required'
        ],
        [
            'name.required'=>'Please put your name',
            'name.min'=>'Name must be greater than 2 charcters'
        ]
    );

        $data = array();
        $data['Product_name']= $request->Product_name;
        $data['Price']= $request->Price;
        $data['Product_qty']= $request->Product_qty;
        $data['Description']= $request->Description;

        $product=DB::table('_products')->insert($data);

        return redirect()->route('Product.Index')->with('success','Product Added successfully');
    }
    public function Edit($id)
    {
        $product= DB::table('_products')->where('id',$id)->first();
        return view('Product.Edit',compact('product'));
    }
    public function Update(Request $request, $id)
    {
        $data= array();
        $data['Product_name']= $request->Product_name;
        $data['Price']=$request->Price;
        $data['Product_qty']=$request->Product_qty;
        $data['Description']=$request->Description;

        $product=DB::table('_products')->where('id',$id)->update($data);
        return redirect()->route('Product.Index')->with('success','Edited successfully');

    }
    public function Delete($id)
    {
        $product=DB::table('_products')->where('id',$id)->delete();
        return redirect()->route('Product.Index')->with('success','Deleted successfully');

    }
    public function getAddToCard (Request $request, $id)
    {
        $product= DB::table('_products')->where('id',$id)->first();
        
        $cart = Session()->get('cart');

        if(!$cart)
        {
            $cart =
            [
                    $product->id=>
                    [
                            'name'  => $product->Product_name,
                            'id'  => $this->id,
                            'Qty'   =>1,
                            'price' => $product->Price
                            
                    ]

            ];
            Session()->put('cart', $cart);
            return redirect()->route('Product.Index')->with('success','Added to Cart successfully');

        }

        if(isset($cart[$product->id]))
        {
            $cart[$product->id]['Qty']++;
        
            Session()->put('cart', $cart);
            return redirect()->route('Product.Index')->with('success','Added to Cart successfully');

        }

        $cart[$product->id]=[

                            'name'  => $product->Product_name,
                            'id'  => $product->id,
                            'Qty'   => 1,
                            'price' => $product->Price,
                        

        ];
        Session()->put('cart', $cart);
        return redirect()->route('Product.Index')->with('success','Added to Cart successfully');
    }

}


