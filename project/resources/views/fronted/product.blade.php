@extends('fronted.fronted-layout.fronted')
@section('section')

<div class="container">
<div class="row" >
	@foreach ($display_pro as $ps )
	<div class="col-lg-3 col-md-6 col-sm-12 mb-5" style="margin-bottom:7rem;">
		<div class="product mb-">			
			<div class="product-img">
				<img src="{{asset('images/'.$ps->pro_image)}}"  class="rounded" width="fit-content" alt="">												
			</div>
			<div class="product-body">
            	<h3 class="product-category">{{$ps->cat_name}}</h3>
            	<h2 class="product-name">{{$ps->pro_name}}</h2>
				<!-- <p class="product-category">{{$ps->pro_des}}</p> -->
				<h4 class="product-price">{{$ps->pro_price}}</h4>
				<a href="{{route('product',['pid'=>$ps->pid])}}" class="btn btn-primary">View</a>												
			</div>
			<div class="add-to-cart">
            	<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
			</div>
		</div>
	</div>
									
		@endforeach
	</div>
	<div class="row" style="display:flex;justify-content:center;">

		{{$display_pro->links('pagination::bootstrap-4')}}
	</div>
	</div>








<!-- <div class="container">
	<div class="row">
		<div class="col-lg-4 col-md-6 col-sm-12">
			@foreach ($display_pro as $ps )
			<div class="card product" style="width: 28rem;">
				<img src="{{asset('images/'.$ps->pro_image)}}" class="img-thumbnail w-50" alt="...">
				<div class="card-body">
					<h5 class="card-title">{{$ps->pro_name}}</h5>
					<p class="card-text">{{$ps->pro_des}}</p>
					<h4 class="product-price">{{$ps->pro_price}}</h4>
					<a href="#" class="btn btn-primary">Go somewhere</a>
				</div>
			</div>
			
			@endforeach
		</div>
		
	</div>
</div> -->





@endsection

