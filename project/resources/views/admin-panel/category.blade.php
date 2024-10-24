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
        <h1 class="mb-3"> Add Category</h1>
    <form class="form-group" action="{{url('/')}}/admin-panel/category" method="post" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
  <label for="category_name" class="form-label">Category name</label>
  <input type="text" class="form-control" name="category_name" value="{{old('category_name')}}" placeholder="Enter category name">
  <span class="text-danger">
        @error('category_name')
            {{$message}}
        @enderror
    </span>
    </div>
   

<div class="mb-3">
    <label for="category_description" class="form-label">Category description</label>
    <textarea class="form-control" type="text" name="category_description" rows="3" value="{{old('category_description')}}" placeholder="Enter category description"></textarea>
    <span class="text-danger">
        @error('category_description')
            {{$message}}
        @enderror
    </span>
    </div>

    <div class="mb-3">
<label for="category_image" class="form-label">Category image</label>
<input type="file" class="form-control" name="category_image" accept=".png,.jpg,.jpeg"  value="{{old('category_image')}}">
<span class="text-danger">
        @error('category_image')
            {{$message}}
        @enderror
    </span>
    </div>

        <input type="submit" value="Add Category" class="btn btn-primary mb-3 mt-2">
    </form>
    @if (session('category'))
    <div class="alert alert-success" role="alert">
            {{session('category')}}
        </div>
  @endif
    </div>
    <hr style="height:3px;">


 <a href="{{route('viewcategory')}}">viewcategory</a>   

@endsection