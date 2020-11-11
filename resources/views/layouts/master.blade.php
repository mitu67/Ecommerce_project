<!DOCTYPE html>
<html>
<head>
	<title>
  @yield('title' , 'laravel Ecommerce Project' )
</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	

	<link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">	

	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body>

	<div class="wrapper">
		

	<nav class="navbar navbar-expand-lg navbar-light bg-light">

		<div class="container">
			
  <a class="navbar-brand" href="{{route('home.index')}}">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home.index') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
      </li>


       <li class="nav-item">
        <a class="nav-link" href="{{ route('products.index') }}">Products</a>
      </li>


      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>

    <form class="form-inline my-2 my-lg-0" action = "{{ route('search') }}" method="get"  >
    	<div class="input-group mb-3">
  <input type="text" class="form-control" name="search" placeholder="Search Products" aria-label="Recipient's username" aria-describedby="button-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button" id="button-addon2">search</button>
  </div>
</div>
  
    </form>
  </div>
  </div>
</nav>

<div class="list-group">
          @foreach(APP\Model\Category::orderBy('name' , 'asc')
                                      ->where('parent_id', NULL)
                                      ->get() as $parent)
     <a href="#main-{{ $parent->id }}" class="list-group-item list-group-item-action" data-toggle="collapse">

   <img src="{{ asset('img/categories/' . $parent->image) }}" width="50">
   {{ $parent->name }}
     </a>


     <div class="collapse" id="main-{{ $parent->id }}">
      <div class="child-rows">
       @foreach(APP\Model\Category::orderBy('name' , 'asc')
                                      ->where('parent_id', $parent->id)
                                      ->get() as $child)


       <a href="#main-{{ $parent->id }}" class="list-group-item list-group-item-action" >

       <img src="{{ asset('img/categories/' . $child->image) }}" width="30">
       {{ $child->name }}
         </a>

          @endforeach                              
     </div>
     </div>
  @endforeach


</div>




     @yield('content')  


<footer class="footer-bottom">
	<p class="text-center">@copyright ; 2020 All right reserved</p>
</footer>


	</div>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html>