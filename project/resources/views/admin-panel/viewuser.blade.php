@extends('admin-panel.Admin_layouts.main')

@section('section')

<link href="{{asset('admin/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
<div
        class="container"
    >
    <h1 class="text-center mt-3 mb-3">
        View Users        
    </h1>

    <!-- message delete -->
    @if (session('deleteuser'))
        <div class="alert alert-danger" role="alert">
            {{session('deleteuser')}}
        </div>
            
        @endif
        <!-- message update -->
        <!-- @if (session('update'))
        <div class="alert alert-success" role="alert">
            {{session('update')}}
        </div>
            
        @endif -->
        <form action="" class=" mb-2 form-group" method="get">
                    <div class="row">
                        <div class="col-8">
                            <input type="search" name="usersearch" value="{{$userSearch}}" class="form-control" placeholder="Search Users">
                        </div>      
                        <div class="col-2">                            
                            <button class="btn btn-primary" type="submit" >Search</button>                                
                        </div>      
                        <div class="col-2">
                            <a href="{{route('viewuser')}}">
                                <button class="btn btn-danger" type="button">Reset</button>                                
                            </a>
                        </div>      
                    </div>                
                </form>
        <table
            class="table table-primary text-center"
        >
            <thead>
                <tr class="table-dark fs-5">
                    <!-- <th scope="col">Sno</th> -->
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col" colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                    
                @forelse ($users as $u ) 
                
                    
                <tr class="fs-5">
                    <!-- <td scope="row">{{$u->id}}</td> -->
                    <td >{{$u->name}}</td>
                    <td>{{$u->email}}</td>                    
                    <td>
                        <a href="{{route('showuser',['id'=>$u->id])}}" class="btn btn-primary">Show</a>
                    
                        <a href="{{route('deleteuser',['id'=>$u->id])}}" class="btn btn-danger">Delete</a>
                    </td>                    
                </tr>
                @empty
                <td colspan="12" class="fs-3"> No results Found:{{$userSearch}}</td>
                @endforelse
                
                
            </tbody>
        </table>
        <div class="row mx-3">
            {{$users->links('pagination::bootstrap-5')}}
        </div>  
    </div>

    @endsection