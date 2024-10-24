@extends('admin-panel.Admin_layouts.main')

@section('section')
    

<link href="{{asset('admin/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">

    <!-- show category -->
    <div class="container">
        <h1 class="mb-4 mt-4 ms-4">User</h1>
    <div class="col-md-8">
        <input type="hidden" value="{{$show->id}}">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$show->name}}
                    </div>
                  </div>
                  <hr>                  
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$show->email}}
                    </div>
                  </div>                                                     
                  <hr>
                </div>
              </div>
              </div>
@endsection