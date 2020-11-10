<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Session;
use Image;
use File;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories'] = Category::all();

        return view('category.categories' , $this->data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         $this->data['categories'] = Category::listForSelect();

        $this->data['headline'] = 'Add new category';

        return view('category.form' , $this->data);
       


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $category              = new Category;

        $category->name         = $request->name;
        $category->description  = $request->description;
        $category->parent_id    = $request->parent_id;
        $category->image        = $request->image;
       


         if(($request->image) >0 ) {
            
                
         $image = $request->file('image');

            $img = time(). '.' . $image->getClientOriginalExtension();
            $location = public_path('img/categories/' .$img );

            Image::make($image)->save($location);

            $category->image = $img;
        

        } 

         if($category->save()){
            Session::flash('message' , 'Category created Successfully');
         }

          return redirect()->to('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $this->data['category'] = Category::findOrFail($id);

        $this->data['headline'] = 'Update category';

        return view('category.form' , $this->data);



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
        // $data                   = $request->all();

        $category                = Category::find($id);  

        $category->name         = $request->name;
        $category->description  = $request->description;
        $category->parent_id    = $request->parent_id;
        $category->image        = $request->image;


        if(($request->image) >0 ) {

            if(File::exists('img/categories/' . $category->image )){
                File::delete('img/categories/' . $category->image );

            }
            
                
         $image = $request->file('image');

            $img = time(). '.' . $image->getClientOriginalExtension();
            $location = public_path('img/categories/' .$img );

            Image::make($image)->save($location);

            $category->image = $img;
        

        } 

      

        if ( $category->save() ) {
            Session::flash('message', 'Category Updated Successfully');

        }

        return redirect()->to('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $category = Category::find($id);

        if(!is_null($category)){

            if($category->parent_id == NULL){
                $sub_category = Category::all();
            }

             if(File::exists('img/categories/' . $category->image )){
                File::delete('img/categories/' . $category->image );

            }
            $category->delete();
        }

        return redirect()->to('categories');
    }
}
