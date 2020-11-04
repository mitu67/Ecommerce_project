@extends('layouts.main_blank')

@section('blank')


		<div class="row clearfix ">
			<div class="col-md-6">
				<h2>Products List</h2>
			</div>
			<div class="col-md-6 text-right">
			<a class="btn btn-info" href="{{ route('products.create') }}"><i class="fa fa-plus"></i> new Product</a>
			</div>
		</div>

		   <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Products</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-borderless table-striped" >
                	 <thead>
                    <tr>
                      <th>ID</th>
                      <th>Category_id</th>
                      <th>Title</th>
                      <th>Description</th>                  
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Image</th>
                      <th class="text-right">Action</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                  	 <!-- db theke sob data anar jonno -->


                  	@foreach ($products as $product)

                    <tr>

                      <td>{{ $product->id }}</td>
                      <td>{{ $product->category_id }}</td>
                      <td>{{ $product->title }}</td>
                      <td>{{ $product->description }}</td>
                      
                      <td>{{ $product->quantity }}</td>
                      <td>{{ $product->price }}</td>

                     

                      <td class="text-right" >


                      	<form method="POST" action="{{ route('products.destroy' ,['product'=> $product->id] ) }}">

                      		<!-- for edit.get method eta -->

                      		<a class="btn btn-info" href="{{ route('products.edit',['product' => $product->id]) }}"><i class="fa fa-edit"></i> Edit </a>


                          <!-- for show.get method eta -->

                          <a class="btn btn-info" href="{{ route('products.show',['product' => $product->id]) }}"><i class="fa fa-eye"></i> Show </a>


                      	

                      	@csrf
                      @method('DELETE')

                    <button onclick="return confirm('r u sure?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete
                    </button>
                                 
                     </form>
                     </td>                     
                     </tr>

                    @endforeach
                                       
                  </tbody>

                   <tfoot>
                  <tr>
                                           
                      <th class="text-right" colspan="5">Quantity: {{ $product->sum('quantity') }}</th>
                      <th class="text-right" >Price: {{ $product->sum('price') }}</th>                      
                      
                    </tr>
                  </tfoot>

                </table>
              </div>
            </div>
          </div>




@stop


 
           




