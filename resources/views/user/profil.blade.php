<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profil Pengguna</title>

  <!-- CSS CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header text-center">
              <h3 class="card-title">Profil Saya</h3>
            </div>
            <div class="card-body text-center">
              @php
                $foto = auth()->user()->foto ? 'uploads/' . auth()->user()->foto : 'uploads/default.jpg';
              @endphp
              
              <!-- Foto Profil -->
              <img src="{{ asset($foto) }}"
                   class="rounded-circle mb-3"
                   style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #007bff;"
                   alt="Foto Profil">

              <!-- Info User -->
              <h4 class="mb-1">{{ auth()->user()->nama }}</h4>
              <p class="mb-1 text-muted">
                <strong>Username:</strong> {{ auth()->user()->username }}
              </p>
              <p class="text-muted">
                <strong>Level:</strong> {{ auth()->user()->level->level_nama ?? '-' }}
              </p>

              <!-- Tombol Upload -->
              <button class="btn btn-primary mt-3" data-toggle="modal" data-target="#uploadFotoModal">
                <i class="fas fa-upload"></i> Ubah Foto Profil
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Upload Foto -->
  <div class="modal fade" id="uploadFotoModal" tabindex="-1" aria-labelledby="uploadFotoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form id="form-upload-foto" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Upload Foto Profil</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <input type="file" name="foto" id="foto" class="form-control" required>
            <small id="error-foto" class="text-danger"></small>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Upload</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- JS CDN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<script>
  $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
  });

  $('#form-upload-foto').submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      type: 'POST',
      url: '{{ route("profil.updateFoto") }}',
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        $('#uploadFotoModal').modal('hide');
        Swal.fire('Sukses!', response.message, 'success').then(() => {
          location.reload();
        });
      },
      error: function (xhr) {
        let err = xhr.responseJSON;
        $('#error-foto').text(err?.errors?.foto ? err.errors.foto[0] : 'Terjadi kesalahan.');
      }
    });
  });
</script>
</body>
</html>
