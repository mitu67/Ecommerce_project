<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PagesController extends Controller
{
     public function display()
    {

    	$this->data['products'] = Product::all();

        return view('pages.index2' , $this->data );
        

    }
}
