@extends('admin-panel.Admin_layouts.main')

@section('section')

<link href="{{asset('admin/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <!-- jquery ajax cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="container">
    <h1 class="my-4 m ms-3">Orders</h1>
    
    <table class="table table-primary text-center">
  <thead>
    <tr class="table-dark fs-5">
      <th scope="col">Customer Name</th>
      <th scope="col">Bill</th>
      <th scope="col">Status</th>
      <th scope="col">Order Date</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($order as $o)
        
    <tr class="fs-5">
        <th scope="">{{$o->customer_name}}</th>
        <td>{{$o->bill}}</td>
        <td>{{$o->status}}</td>
        <td>{{$o->created_at}}</td>
    </tr>    
    @endforeach
  </tbody>
</table>
</div>


    

    @endsection