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
        View Category        
    </h1>

    <!-- message delete -->
    @if (session('delete'))
        <div class="alert alert-danger" role="alert">
            {{session('delete')}}
        </div>
            
        @endif
        <!-- message update -->
        @if (session('update'))
        <div class="alert alert-success" role="alert">
            {{session('update')}}
        </div>
            
        @endif

        <form action="" class=" mb-2 form-group" method="get">
                    <div class="row">
                        <div class="col-8">
                            <input type="search" name="catsearch" value="{{$cat_search}}" class="form-control" placeholder="Search Category">
                        </div>      
                        <div class="col-2">                            
                            <button class="btn btn-primary" type="submit" >Search</button>                                
                        </div>      
                        <div class="col-2">
                            <a href="{{route('viewcategory')}}">
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
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col" colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                                
                @forelse ($view as $d)                                    
                <tr class="fs-5">
                    <!-- <td scope="row">$d+$d</td> -->
                    <td scope="row">{{$d->cat_name}}</td>
                    <td>{{$d->cat_des}}</td>
                    <td><img src="{{asset('images/'.$d->cat_image)}}" alt="" width="150px" heigh="150px"></td>
                    <td>
                        <a href="{{route('catShow',['id'=>$d->cid])}}" class="btn btn-primary">Show</a>
                    </td>
                    <td><a href="{{route('catDel',['id'=>$d->cid])}}" class="btn btn-danger">Delete</a></td>
                    <td><a href="{{route('catEdit',['id'=>$d->cid])}}" class="btn btn-success">Update</a></td>
                </tr>       
                
                @empty
                <td colspan="12" class="fs-3"> No results Found:{{$cat_search}}</td>                                         
                    
                @endforelse
            </tbody>
        </table>
        <div class="row mx-3">
    
            {{$view->links('pagination::bootstrap-5')}}
        </div>
    </div>

    @endsection