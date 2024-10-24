<!-- boostrap cdn -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <div class="mask d-flex  align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
        @if (session('login'))
    <div class="alert alert-danger" role="alert">
            {{session('login')}}
        </div>
  @endif
          <div class="card bg-dark text-white"  style="border-radius: 15px;">
            <div class="card-body p-5">

              <h2 class="text-uppercase text-center mb-5">Login</h2>

              <form action="{{url('login')}}" method="post"> 
                    @csrf
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="email">Your Email</label>
                  <input type="" name="email" placeholder="Enter your email" class="form-control form-control-lg" value="{{old('email')}}"/>
                  <span class="text-danger">
                  @error('email')
                           {{$message}}
                       @enderror 
                  </span>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                  <input type="password" name="password" class="form-control form-control-lg" placeholder="Enter your password" value="{{old('password')}}"/>
                  <span class="text-danger">
                  @error('password')
                           {{$message}}
                       @enderror 
                  </span>
                </div>

                <div class="d-flex justify-content-center mt-5">
                  <button  type="submit" data-mdb-button-init
                    data-mdb-ripple-init class="btn btn-success w-100  btn-lg gradient-custom-4 text-body">Login</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">create an account:<a href="{{route('register')}}"
                    class="fw-bold text-light"><u>registration here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
