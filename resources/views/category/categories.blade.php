@extends('layouts.main_blank')

@section('blank')


		<div class="row clearfix ">
			<div class="col-md-6">
				<h2>Category List</h2>
			</div>
			<div class="col-md-6 text-right">
			<a class="btn btn-info" href="{{ route('categories.create') }}"><i class="fa fa-plus"></i> new Category</a>
			</div>
		</div>

		   <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Category</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-borderless table-striped" >
                	 <thead>
                    <tr>

                      <th>ID</th>
                      <th>Category Name</th>
                      <th>Category Image</th>
                      <th>Parent Category</th>                  
                      
                      <th class="text-right">Action</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                  	 <!-- db theke sob data anar jonno -->


                  	@foreach ($categories as $category)

                    <tr>

                      <td>{{ $category->id }}</td>
                      <td>{{ $category->name }}</td>
                      <td>
                       <img src="{{ asset('img/categories/' . $category->image ) }}" width= "100">
                      </td>                      
                      <td>
                        @if( $category->parent_id == NULL )

                         primary category

                        @else

                      

                        {{ $category->name }}

                           <!-- {{ $category->parent->name }} 

                                 OR
                                 
                                 uporerta

                         -->

                        @endif

                        </td>
  

                      <td class="text-right" >

                  	
                        <form method="POST" action="{{ route('categories.destroy' ,['category'=> $category->id] ) }}">

                          <!-- for edit.get method eta -->

                          <a class="btn btn-info" href="{{ route('categories.edit',['category' => $category->id]) }}"><i class="fa fa-edit"></i> Edit </a> 


                         <a class="btn btn-info" href="{{ route('categories.show',['category' => $category->id]) }}"><i class="fa fa-eye"></i> Show </a>


                        @csrf
                      @method('DELETE')

                    <button onclick="return confirm('r u sure?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
             
                        </form>

                     </td>                     
                     </tr>

                    @endforeach
                                       
                  </tbody>

                   <tfoot>
                  <tr>

                      <th>ID</th>
                      <th>Category Name</th>
                      <th>Category Image</th>
                      <th>Parent Category</th>                  
                      
                      <th class="text-right">Action</th>
                    </tr>
                  </tfoot>

                </table>
              </div>
            </div>
          </div>




@stop


 
           




