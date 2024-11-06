@extends('fronted.fronted-layout.fronted')
@section('section')
<!-- cdn -->
<!-- <link href="{{asset('fronted/css/add-to-cart.min.css')}}" type="text/css" rel="stylesheet"> -->


    <!-- add to cart -->
  
            @if (session('updatecart'))
            <div class="alert alert-success container" role="alert">
            {{session('updatecart')}}
           </div>
            @endif

            @if (session('deletecart'))
            <div class="alert alert-danger container" role="alert">
            {{session('deletecart')}}
           </div>
            @endif

            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Update</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>            
                            @php
                                $total=0;
                            @endphp                
                            @forelse ($cartitem as $item)
                                
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('images/'.$item->pro_image)}}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">{{$item->pro_name}}</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">{{$item->pro_price}}</p>
                                </td>
                                <td>
                                    <form action="{{url('/')}}/update/cart/{{$item->id}}" method="post">
                                        @csrf
                                        <div class="quantity">
                                            <input type="number" min="1" name="quantity" class="w-10" style="width:60px;" value="{{$item->quantity}}">
                                        </div>
                                    
                                    
                                </div>
                            </td>
                            <td>                                
                                <input type="hidden" name="id" class="btn btn-success" value="{{$item->id}}">
                                <input type="submit" name="update" class="btn btn-success" value="update">
                            </td>
                            </form>
                            <td>
                                <p class="mb-0 mt-4">{{$item->quantity*$item->pro_price}}</p>
                            </td>
                            <td>                                
                                    <a href="{{route('delCart',['id'=>$item->id])}}">
                                    <i class="fa fa-times text-danger"></i>
                                </a>    
                                
                            </td>
                        </tr>
                        @php
                            $total+= ($item->quantity*$item->pro_price);
                        @endphp
                        @empty
                            <td class="text-center" colspan="12"><h2>No Items Found</h2></td>
                            @endforelse
                    </tbody>
                </table>
                </div>
                <div class="float-end">
              <p class="mb-0 me-5 d-flex align-items-center">
                <span class="small text-muted me-2" style="font: size 4rem;">Order total:</span> <span
                  class="lead fw-normal">Rs.{{$total}}</span>
              </p>
            </div>
                
            <div style="display:flex;justify-content:flex-end;">
          <!-- <button  type="button" class="btn btn-danger btn-lg " style="margin:5px;">Continue shopping</button> -->
          <form action="{{route('checkout')}}" method="get">
            @csrf
              <input type="hidden" name="bill" value="{{$total}}">
              <input type="submit" name="checkout" class="btn btn-primary btn-lg" style="margin:5px;" value="proceed To checkout">
          </form>
        </div>

                
            </div>
        </div>
        <!-- Cart Page End -->


@endsection