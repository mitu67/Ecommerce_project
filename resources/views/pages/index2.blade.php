@extends('layouts.master')

@section('content')



			<div class="col-md-8">
				<div class="widget">
					<h3>All products</h3>
					<div class="row">

						@foreach($products as $product)



						<div class="col-md-3">
							<div class="card" >


								@php $i = 1; @endphp
																

							@foreach($product->images as $image)

							@if ($i>0)

                         <a href="{{ route('product.show' , $product->slug ) }}">

							  <img class="card-img-top feature-img" src="{{ asset('img/products/' . $image->image) }}" alt="{{ $product->title }}">

							</a>

							  @endif

							  @php $i--; @endphp
							 

							 @endforeach

							  <div class="card-body">
							    <h4 class="card-title">

							    <a href="{{ route('product.show' , $product->slug ) }}">

							    	{{  $product->title  }} 

							    </a>
							    	
							    </h4>
							    <p class="card-text">{{  $product->price  }}</p>
							    <a href="#" class="btn btn-warning">add to cart</a>
							  </div>
							</div>
						</div>



                         	@endforeach

					</div>
				</div>
			
		</div>
	</div>
	
</div>


@endsection




                                     
