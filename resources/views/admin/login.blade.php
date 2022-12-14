<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CelestialUI Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{ asset('assets_admin/vendors/typicons.font/font/typicons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_admin/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets_admin/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('assets_admin/images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">

            <center>
                <h3>LOGIN</h3>
            </center>
              <form class="pt-3" action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Log In</button>
                </div>
                <!-- <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="typcn typcn-social-facebook-circular mr-2"></i>Connect using facebook
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                </div> -->
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="{{ asset('assets_admin/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('assets_admin/js/off-canvas.js') }}"></script>
  <script src="{{ asset('assets_admin/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('assets_admin/js/template.js') }}"></script>
  <script src="{{ asset('assets_admin/js/settings.js') }}"></script>
  <script src="{{ asset('assets_admin/js/todolist.js') }}"></script>
  <!-- endinject -->

  {{-- @if (session('success'))
  <script>
    toastr.success('{{ session("success") }}')
  </script>
  @elseif (session('error'))
  <script>
    toastr.error('{{ session("error") }}')
  </script>
  @endif --}}
</body>

</html>

