<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\productImage;

use Illuminate\Support\Facades\Session;
use Image;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['products'] = Product::all();
     
        return view('products.products' , $this->data);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['headline'] = 'Add new product';

        return view('products.form' , $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = new Product;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
       
        $product->slug = $request->title;
        $product->category_id = 1;
        $product->brand_id = 1;
        $product->admin_id = 1;

        $product->save();


          /**

          1 TA IMAGE SAVE ER JONNO
     *  if($request->hasFile('product_image')){
            $image = $request->file('product_image');

            $img = time(). '.' . $image->getClientOriginalExtension();
            $location = public_path('img/products/' .$img );

            Image::make($image)->save($location);



            $productImage = new ProductImage;
           
            $productImage->product_id = $product->id;
            $productImage->image = $img;

            $productImage->save();

        }
     */

        if(count($request->product_image) >0 ) {
            
            foreach ($request->product_image as $image) {
                
            // $image = $request->file('product_image');

            $img = time(). '.' . $image->getClientOriginalExtension();
            $location = public_path('img/products/' .$img );

            Image::make($image)->save($location);



            $productImage = new ProductImage;
           
            $productImage->product_id = $product->id;
            $productImage->image = $img;

            $productImage->save();
            }

        } 

          return redirect()->to('products');


        /**
     *  $data = $request->all();

        if(Product::create($data)){
            Session::flash('message' , 'Created Successfully');
        }

        return redirect()->to('products');
     */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['product'] = Product::find($id);
        return view('products.show' ,$this->data );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['product'] = Product::findOrFail($id);
        $this->data['headline'] = 'Add new product';

        return view('products.form' , $this->data);

         

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data                   = $request->all();

        $product                 = Product::find($id);

        $product->title          = $data['title'];
        $product->description    = $data['description'];
        $product->quantity       = $data['quantity'];
        $product->price          = $data['price'];
        

        if ( $product->save() ) {
            Session::flash('message', 'Product Updated Successfully');

        }

        return redirect()->to('products');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Product::destroy($id)){
            Session::flash('message', 'Product deleted Successfully');
        }

        return redirect()->to('products');


    }



  



}
