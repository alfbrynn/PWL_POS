<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <title>Registrasi Pengguna</title> 

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icheck-bootstrap@3.0.1/icheck-bootstrap.min.css">
  <!-- SweetAlert2 Bootstrap 4 Theme -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4@5.0.12/bootstrap-4.min.css">
  <!-- AdminLTE -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head> 
<body class="hold-transition login-page"> 
<div class="login-box"> 
  <div class="card card-outline card-primary"> 
    <div class="card-header text-center">
      <a href="{{ url('/') }}" class="h1"><b>Admin</b>LTE</a>
    </div> 
    <div class="card-body"> 
      <p class="login-box-msg">Buat Akun Baru</p> 
      <form action="{{ url('/register/ajax') }}" method="POST" id="form-register"> 
        @csrf

        <div class="input-group mb-3">
          <select name="level_id" id="level_id" class="form-control">
            <option value="">- Pilih Level -</option>
            @foreach(\App\Models\LevelModel::all() as $level)
              <option value="{{ $level->level_id }}">{{ $level->level_nama }}</option>
            @endforeach
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-tag"></span>
            </div>
          </div>
        </div>
        <small id="error-level_id" class="text-danger error-text"></small>

        <div class="input-group mb-3">
          <input type="text" name="username" id="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <small id="error-username" class="text-danger error-text"></small>

        <div class="input-group mb-3">
          <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-id-card"></span>
            </div>
          </div>
        </div>
        <small id="error-nama" class="text-danger error-text"></small>

        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <small id="error-password" class="text-danger error-text"></small>

        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
        </div>
      </form>
      <p class="mt-3 mb-1 text-center">
        <a href="{{ url('/login') }}">Sudah punya akun? Login</a>
      </p>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function() {
    $("#form-register").validate({
      rules: {
        username: { required: true, minlength: 4, maxlength: 20 },
        nama: { required: true },
        level_id: { required: true },
        password: { required: true, minlength: 6 },
        password_confirmation: {
          equalTo: "#password"
        }
      },
      submitHandler: function(form) {
        $.ajax({
          url: form.action,
          type: form.method,
          data: $(form).serialize(),
          success: function(response) {
            $('.error-text').text('');
            if (response.status) {
              Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: response.message
              }).then(() => {
                window.location.href = response.redirect;
              });
            } else {
              if (response.msgField) {
                $.each(response.msgField, function(key, val) {
                  $('#error-' + key).text(val[0]);
                });
              }
              Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: response.message
              });
            }
          },
          error: function() {
            Swal.fire({
              icon: 'error',
              title: 'Terjadi Kesalahan',
              text: 'Silakan coba beberapa saat lagi.'
            });
          }
        });
        return false;
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.input-group').append(error);
      },
      highlight: function(element) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>
</body>
</html>
