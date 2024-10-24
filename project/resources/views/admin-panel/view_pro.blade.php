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
<div
        class="container"
    >
    <h1 class="text-center mt-3 mb-3">
        View Product        
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
        <!-- search -->
                <form action="" class=" mb-2 form-group" method="get">
                    <div class="row">
                        <div class="col-8">
                            <input type="search" name="search" value="{{$search}}" class="form-control" placeholder="Search Products">
                        </div>      
                        <div class="col-2">                            
                            <button class="btn btn-primary" type="submit" >Search</button>                                
                        </div>      
                        <div class="col-2">
                            <a href="{{route('viewproduct')}}">
                                <button class="btn btn-danger" type="button">Reset</button>                                
                            </a>
                        </div>      
                    </div>                
                </form>  
                <!-- filter-->
                
                <select class="my-2 " name="filter" id="filter" aria-label="Default select example">

                 <option selected>Select Category</option>
                 @foreach ($categories as $f)
                 <option value="{{$f->cid}}">{{$f->cat_name}}</option>                     
                 @endforeach

                </select>
                <div id="filter_product"></div>
                
        <table
            class="table table-primary text-center"
        >
            <thead>
                <tr class="table-dark fs-5">
                    <!-- <th scope="col">sno</th> -->
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <!-- <th scope="col">Description</th> -->
                    <th scope="col">Image</th>
                    <th scope="col" colspan="3">Action</th>
                </tr>
            </thead>
            <tbody id="tbody">
                    
                @forelse ($products as $p ) 
                
                    
                <tr class="fs-5">
                    <!-- <td scope="row">{{$p->id}}</td> -->
                    <td scope="row">{{$p->pro_name}}</td>
                    <td>{{$p->pro_price}}</td>
                    <td>{{$p->cat_name}}</td>
                    <!-- <td>{{$p->pro_des}}</td> -->
                    <td><img src="{{asset('images/'.$p->pro_image)}}" alt="" width="150px" heigh="150px"></td>
                    <td>
                        <a href="{{route('proShow',['id'=>$p->pid])}}" class="btn btn-primary">Show</a>
                        <a href="{{route('proDel',['id'=>$p->pid])}}" class="btn btn-danger">Delete</a>
                        <a href="{{route('proEdit',['id'=>$p->pid])}}" class="btn btn-success">Update</a>
                    </td>                    
                </tr>
                @empty
                <td colspan="12" class="fs-3"> No results Found:{{$search}}</td>
                @endforelse
                                
            </tbody>
        </table>
        <div class="row mx-3">
            {{$pro_view->links('pagination::bootstrap-5')}}
        </div>  
        
    </div>

    <!-- ajax  -->

    <script>
$(document).ready(function() {
    $('#filter').change(function() {
        var productId = $(this).val();

        $.ajax({
            url: "{{route('viewproduct')}}",
            type: 'GET',
            data: { 'filter': productId },
            success: function(data) {
                // var products=data.products;
                // var html='';
                // for (let i = 0; i < products.length; i++) {
                //     html+='<tr>\
                //     <td>'+products[i]['pro_name']+'</td>\
                //     <td>'+products[i]['pro_price']+'</td>\
                //     <td>'+products[i]['cat_name']+'</td>\
                //     <td>'+products[i]['pro_image']+'</td>\
                //     </tr>';                    
                // }
                // else{
                //     html+='<tr>\
                //     <td>No Products Found</td>\
                //     </tr>';
                // }
                // $('#tbody').html(html);
                console.log(data);
            }
        });
    });
});
    </script>

    @endsection