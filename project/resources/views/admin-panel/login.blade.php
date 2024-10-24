<!-- bootstrap cdn -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<section style="background-color:#1f51a1;">
  <div class="container py-5 h-100">
    <div class="row  d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        @if (session('adminlogin'))
        <div class="alert alert-danger" role="alert">
            {{session('adminlogin')}}
        </div>
        @endif
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-left">

            <h3 class="mb-4 text-center fs-1 " style="font-family:sans-serif;">Admin Login</h3>
                <form action="{{url('admin-panel/login')}}" method="post">
                  @csrf
                <div class="mb-3">
  <label for="email" class="form-label fs-5">Email</label>
  <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Enter your email">
  <span class="text-danger">
    @error('email')
        {{$message}}
    @enderror
  </span>
</div>
                <div class="mb-3">
  <label for="password" class="form-label fs-5">Password</label>
  <input type="password" class="form-control" name="password" value="{{old('password')}}" placeholder="Enter your password">
  <span class="text-danger">
    @error('password')
        {{$message}}
    @enderror
  </span>
</div>

                <div class="mb-3 mt-5">
                    <input type="submit" value="Login" class="btn btn-primary w-100 fs-5">
                </div>
                </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>