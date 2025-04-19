<form action="{{ url('/suplier/ajax') }}" method="POST" id="form-tambah-suplier">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Suplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Nama Suplier</strong></label>
                    <input type="text" name="nama_suplier" id="nama_suplier" class="form-control" required>
                    <small id="error-nama_suplier" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label><strong>Alamat Suplier</strong></label>
                    <textarea name="alamat_suplier" id="alamat_suplier" class="form-control" required></textarea>
                    <small id="error-alamat_suplier" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label><strong>Kontak Suplier</strong></label>
                    <input type="text" name="kontak_suplier" id="kontak_suplier" class="form-control" required>
                    <small id="error-kontak_suplier" class="error-text form-text text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Kembali</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    $("#form-tambah-suplier").validate({
        rules: {
            nama_suplier: {
                required: true,
                minlength: 3,
                maxlength: 100
            },
            alamat_suplier: {
                required: true
            },
            kontak_suplier: {
                required: true,
                minlength: 8,
                maxlength: 15
            }
        },
        submitHandler: function(form) {
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function(response) {
                    if (response.status) {
                        $('#myModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message
                        });
                        dataSuplier.ajax.reload(); // GANTI kalau pakai nama lain
                    } else {
                        $('.error-text').text('');
                        $.each(response.msgField, function(prefix, val) {
                            $('#error-' + prefix).text(val[0]);
                        });
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: response.message
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Terjadi kesalahan pada server.'
                    });
                }
            });
            return false;
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
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
