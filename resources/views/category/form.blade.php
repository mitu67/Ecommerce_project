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

			@if(isset($category))


			{!! Form::model( $category , ['route' => ['categories.update' , $category->id], 'method' => 'put' , 'files' => true]) !!}

			@else


			{!! Form::open(['route' => 'categories.store', 'method' => 'post' , 'files' => true]) !!}

			@endif


				<div class="form-group row">
				    <label for="name" class="col-sm-2 text-right col-form-label">Title</label>
				    <div class="col-sm-10">				    

				      {{ Form::text('name' , NULL , ['class' => 'form-control' , 'id' => 'name' , 'placeholder' => 'name' ,'required']) }}

				    </div>
				  </div>

				  <div class="form-group row">
				    <label for="description" class="col-sm-2 text-right col-form-label">Description</label>
				    <div class="col-sm-10">				    

				      {{ Form::textarea('description' , NULL , ['class' => 'form-control' , 'id' => 'description' , 'placeholder' => 'Description']) }}

				    </div>
				  </div>


				 <div class="form-group row">
				    <label for="parent_id" class="col-sm-2 text-right col-form-label">Parent Category</label>
				    <div class="col-sm-10">				    

				      {{ Form::select('parent_id' , $category, NULL , ['class' => 'form-control' , 'id' => 'parent_id' , 'placeholder' => 'Parent Category' ]) }}

				    </div>
				  </div>
				  

				<div class="form-group row">
				    <label for="image" class="col-md-2 text-right col-form-label">Image</label>
				    
				    <div class="col-md-10">				    

				      {{ Form::file('image' , NULL , ['class' => 'form-control' , 'id' => 'image' , 'placeholder' => 'Image']) }}

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