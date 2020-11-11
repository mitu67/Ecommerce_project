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

    public function show($slug)
    {
    	

    	$this->data['products'] = Product::where('slug' , $slug)->first();

    	if(!is_null($products)){

    		return view('pages.show' , $this->data );

    	}else{
    		return redirect()->to('display' );
    	}

    }


    public function search(Request $request )
    {
    	// $request->search ta div er name =search
    	$this->data['search'] = $request->search;

    	$this->data['products'] = Product::orWhere('title' , 'like' , '%'.$search.'%')
    	                    ->orWhere('description' , 'like' , '%'.$search.'%')
    	                    ->orWhere('slug' , 'like' , '%'.$search.'%')
    	                    ->orWhere('price' , 'like' , '%'.$search.'%')
    	                    ->orWhere('quantity' , 'like' , '%'.$search.'%')
    	                    ->orderBy('id' , 'desc')
    	                    ->pagination(9);


    	                    return view('pages.search' , $this->data);


    }



}


