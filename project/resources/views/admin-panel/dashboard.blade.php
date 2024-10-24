<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
@extends('admin-panel.Admin_layouts.main')

@section('section')

<h1>welcome </h1>           
<div class="container">
    <div class="row">

        <div class="col-lg-4 col-md-6 ">

            <div class="card bg-secondary mb-3" style="max-width: 18rem;">
              <div class="card-body ">
                <h4 class="card-title text-white" >Total Categories</h4>
                <h5  class="card-title  text-white">{{$category}}</h5>
              </div>
              <a class="card-footer bg-transparent text-white" href="{{route('viewcategory')}}">View Categories</a>
            </div>

            
        </div>
        <div class="col-lg-4 col-md-6">

        <div class="card bg-danger  mb-3" style="max-width: 18rem;">
                    <div class="card-body ">
                        <h4 class="card-title  text-white">Total Products</h4>
                        <h5  class="card-title  text-white">{{$product}}</h5>
                    </div>
                    <a class="card-footer bg-transparent text-white" href="{{route('viewproduct')}}">View Products</a>
                </div>
            
        </div>
        <div class="col-lg-4 col-md-6">

        <div class="card bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-body ">
                        <h4 class="card-title  text-white">Total Users</h4>
                        <h5  class="card-title  text-white">{{$user}}</h5>
                    </div>
                    <a class="card-footer bg-transparent text-white" href="{{route('viewuser')}}">View Users</a>
                </div>
            
        </div>
        
    </div>
    <hr>
    <div class="row">   
        @foreach ($pro as $c)                
            <div class="col-lg-4 col-md-6">
                <div class="card  mb-3" style="max-width: 18rem;background-color:#3179b8;">
                    <div class="card-body ">
                        <h4 class="card-title text-white">Total {{$c->cat_name}}</h4>
                        <h4  class="card-title text-white" value="">{{$c->product_count}}</h4>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


@endsection