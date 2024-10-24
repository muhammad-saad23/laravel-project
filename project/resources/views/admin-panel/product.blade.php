@extends('admin-panel.Admin_layouts.main')

@section('section')
    
    <!-- bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
<!-- Libraries Stylesheet -->
<link href="{{asset('admin/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">



    <div class="container mt-3">
        <h1 class="mb-3"> Add Product</h1>
    <form class="form-group" action="{{url('/')}}/admin-panel/product" method="post" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
  <label for="product_name" class="form-label">Product name</label>
  <input type="text" class="form-control" name="product_name" value="{{old('product_name')}}" placeholder="Enter product name">
  <span class="text-danger">
        @error('product_name')
            {{$message}}
        @enderror
    </span>
    </div>
    <div class="mb-3">
  <label for="product_price" class="form-label">Product price</label>
  <input type="text" class="form-control" name="product_price" value="{{old('product_price')}}" placeholder="Enter product price">
  <span class="text-danger">
        @error('product_price')
            {{$message}}
        @enderror
    </span>
    </div>

    <label for="category_name" class="form-label">Categories</label>
    <select class="form-select mb-3" name="category_name" value="{{old('category_name')}}" aria-label="Default select example">

  <option selected value="0">Categories</option>
  @foreach ( $cat as $c )
  
  <option value="{{$c->cid}}">{{$c->cat_name}}</option>
  @endforeach    
  

    </select>
    <span class="text-danger">
        @error('category_name')
            {{$message}}
        @enderror
    </span>


<div class="mb-3">
    <label for="product_description" class="form-label">Product description</label>
    <textarea class="form-control" type="text" name="product_description" rows="3" value="{{old('product_description')}}" placeholder="Enter category description"></textarea>
    <span class="text-danger">
        @error('product_description')
            {{$message}}
        @enderror
    </span>
    </div>

    <div class="mb-3">
<label for="product_image" class="form-label">Product image</label>
<input type="file" class="form-control" name="product_image" accept=".png,.jpg,.jpeg"  value="{{old('product_image')}}">
<span class="text-danger">
        @error('product_image')
            {{$message}}
        @enderror
    </span>
    </div>

        <input type="submit" value="Add Product" class="btn btn-primary mb-3 mt-2">
    </form>
    @if (session('product'))
    <div class="alert alert-success" role="alert">
            {{session('product')}}
        </div>
  @endif
    </div>
    <hr style="height:3px;">


    

@endsection