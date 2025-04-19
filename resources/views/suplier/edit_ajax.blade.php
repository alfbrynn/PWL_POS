@empty($suplier)
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                    Data yang anda cari tidak ditemukan
                </div>
                <a href="{{ url('/suplier') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@else
    <form action="{{ url('/suplier/' . $suplier->suplier_id . '/update_ajax') }}" method="POST" id="form-edit-suplier">
        @csrf
        @method('PUT')
        <div id="modal-master" class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Suplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Suplier</label>
                        <input value="{{ $suplier->nama_suplier }}" type="text" name="nama_suplier" id="nama_suplier" class="form-control" required>
                        <small id="error-nama_suplier" class="error-text form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label>Alamat Suplier</label>
                        <input value="{{ $suplier->alamat_suplier }}" type="text" name="alamat_suplier" id="alamat_suplier" class="form-control" required>
                        <small id="error-alamat_suplier" class="error-text form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label>Kontak Suplier</label>
                        <input value="{{ $suplier->kontak_suplier }}" type="text" name="kontak_suplier" id="kontak_suplier" class="form-control" required>
                        <small id="error-kontak_suplier" class="error-text form-text text-danger"></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function () {
            $("#form-edit-suplier").validate({
                rules: {
                    nama_suplier: { required: true, minlength: 3, maxlength: 50 },
                    alamat_suplier: { required: true, minlength: 5 },
                    kontak_suplier: { required: true, minlength: 10, maxlength: 15 }
                },
                submitHandler: function (form) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function (response) {
                            if (response.status) {
                                $('#myModal').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message
                                });
                                dataSuplier.ajax.reload(); 
                            } else {
                                $('.error-text').text('');
                                $.each(response.msgField, function (prefix, val) {
                                    $('#error-' + prefix).text(val[0]);
                                });
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Terjadi Kesalahan',
                                    text: response.message 
                                });
                            }
                        }
                    });
                    return false;
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endempty
