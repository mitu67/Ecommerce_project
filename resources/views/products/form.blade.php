@extends('layouts.main_blank')

@section('blank')



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif




<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h2 class="m-0 font-weight-bold text-primary"> {{ $headline }} </h2>
	</div>
	<div class="card-body">
		<div class="row justify-content-md-center">
			<div class="col-md-10">	

			@if(isset($product))


			{!! Form::model( $product , ['route' => ['products.update' , $product->id], 'method' => 'put' , 'files' => true]) !!}

			@else


			{!! Form::open(['route' => 'products.store', 'method' => 'post' , 'files' => true]) !!}

			@endif


				<div class="form-group row">
				    <label for="title" class="col-sm-2 text-right col-form-label">Title</label>
				    <div class="col-sm-10">				    

				      {{ Form::text('title' , NULL , ['class' => 'form-control' , 'id' => 'title' , 'placeholder' => 'Title' ,'required']) }}

				    </div>
				  </div>

				  <div class="form-group row">
				    <label for="description" class="col-sm-2 text-right col-form-label">Description</label>
				    <div class="col-sm-10">				    

				      {{ Form::textarea('description' , NULL , ['class' => 'form-control' , 'id' => 'description' , 'placeholder' => 'Description']) }}

				    </div>
				  </div>

				   

				  <div class="form-group row">
				    <label for="quantity" class="col-sm-2 text-right col-form-label">Quantity</label>
				    <div class="col-sm-10">				    

				      {{ Form::text('quantity' , NULL , ['class' => 'form-control' , 'id' => 'quantity' , 'placeholder' => 'Quantity' ,'required']) }}

				    </div>
				  </div>

				 <div class="form-group row">
				    <label for="price" class="col-sm-2 text-right col-form-label">Price</label>
				    <div class="col-sm-10">				    

				      {{ Form::text('price' , NULL , ['class' => 'form-control' , 'id' => 'price' , 'placeholder' => 'Price' ,'required']) }}

				    </div>
				  </div>

				<div class="form-group row">
				    <label for="product_image[]" class="col-md-2 text-right col-form-label">Image</label>
				    
				    <div class="col-md-10">				    

				      {{ Form::file('product_image[]' , NULL , ['class' => 'form-control' , 'id' => 'product_image' , 'placeholder' => 'Image']) }}

				    </div>

				    <div class="row">
				    	<div class="col-md-5"></div>
				    

				    <div class="col-md-7">				    

				      {{ Form::file('product_image[]' , NULL , ['class' => 'form-control' , 'id' => 'product_image' , 'placeholder' => 'Image']) }}

				    </div>
				    </div>


				    <div class="row">
				    	<div class="col-md-5"></div>
				    

				    <div class="col-md-7">				    

				      {{ Form::file('product_image[]' , NULL , ['class' => 'form-control' , 'id' => 'product_image' , 'placeholder' => 'Image']) }}

				    </div>
				    </div>


				    <div class="row">
				    	<div class="col-md-5"></div>
				    

				    <div class="col-md-7">				    

				      {{ Form::file('product_image[]' , NULL , ['class' => 'form-control' , 'id' => 'product_image' , 'placeholder' => 'Image']) }}

				    </div>
				    </div>


				    <div class="row">
				    	<div class="col-md-5"></div>
				    

				    <div class="col-md-7">				    

				      {{ Form::file('product_image[]' , NULL , ['class' => 'form-control' , 'id' => 'product_image' , 'placeholder' => 'Image']) }}

				    </div>
				    </div>


				  </div>

				 


	                 <div class="form-group row">
	                 <label for="price" class="col-sm-2 text-right col-form-label"> </label>
	                    <div class="mt-3 ">
	                   <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
	                  </div>
	                </div> 



				  {!! Form::close() !!}

			</div>
		</div>

	</div>
	
</div>




@stop