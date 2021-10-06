<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class ProductController extends Controller
{
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

        return redirect()->route('Product.Index');
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
        return redirect()->route('Product.Index');

    }
    public function Delete($id)
    {
        $product=DB::table('_products')->where('id',$id)->delete();
        return redirect()->route('Product.Index');

    }

}


