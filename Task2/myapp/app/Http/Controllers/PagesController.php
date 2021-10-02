<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        return view('pages/home');
      }

      public function contact() {
        return view('pages/contact');
      }
      public function reg() {
        return view('pages/reg');
    }
    public function regSubmit(Request $request){
        //using requests validate method
        $validate = $request->validate([
                'name'=>'required|min:5|max:10',
                'id'=>'required',
                'dob'=>'required',
                'email'=>'email'
            ],
            [
                'name.required'=>'Please put your name',
                'name.min'=>'Name must be greater than 2 charcters'
            ]
        );
        $var = new Student();
        $var->name= $request->name;
        $var->s_id = $request->id;
        $var->email = $request->email;
        $var->phone=$request->phone;
        $var->dob = $request->dob;
        $var->save();


        return "OK";      
    }
}
