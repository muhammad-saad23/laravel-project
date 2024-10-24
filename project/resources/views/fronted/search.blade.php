@extends('fronted.fronted-layout.fronted')
@section('section')

<div class="container">
<div class="row" >
	@forelse ($result as $r )
	<div class="col-lg-3 col-md-6 col-sm-12 mb-5" style="margin-bottom:7rem;">
		<div class="product mb-">			
			<div class="product-img">
				<img src="{{asset('images/'.$r->pro_image)}}"  class="rounded" width="fit-content" alt="">												
			</div>
			<div class="product-body">
            	<h3 class="product-category">{{$r->cat_name}}</h3>
            	<h2 class="product-name">{{$r->pro_name}}</h2>
				<!-- <p class="product-category">{{$r->pro_des}}</p> -->
				<h4 class="product-price">{{$r->pro_price}}</h4>
				<a href="{{route('product',['pid'=>$r->pid])}}" class="btn btn-primary">View</a>												
			</div>
			<div class="add-to-cart">
            	<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
			</div>
		</div>
	</div>
		@empty
        <h2 class="text-center" style="display:flex; justify-content:center;align-items:center;height: 9em;">No Result Founds.</h2>							
		@endforelse
	</div>
	<div class="row" style="display:flex;justify-content:center;">

		{{$result->links('pagination::bootstrap-4')}}
	</div>
	</div>

<!-- ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>   
<script>
    $(document).ready(function() {
    $('#searchForm').submit(function(e) {
        e.preventDefault(); // Prevent form submission

        var query = $('#query').val();

        $.ajax({
            url: "{{ route('search') }}",
            type: "GET",
            data: { query: query },
            success: function(data) {
                if (data.length>0) {
                    $('#searchResults').html(data);                    
                }
                else{
                    $('#searchResults').html('<p>No results found for "' + query + '".</p>');                    
                }
            },
            error: function() {
                alert('Error occurred while searching.');
            }
        });
    });
});

</script>

@endsection