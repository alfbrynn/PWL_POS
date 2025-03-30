@extends('layouts.template')

@section('content')
  <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
          <a class="btn btn-sm btn-primary mt-1" href="{{ url('suplier/create') }}">Tambah</a>
        </div>
      </div>
      <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table table-bordered table-striped table-hover table-sm" id="table_suplier">
            <thead>
                <tr><th>ID</th><th>Nama Suplier</th><th>Alamat</th><th>Kontak</th><th>Aksi</th></tr>
            </thead>
        </table>
    </div>
@endsection

@push('css')
@endpush

@push('js')
  <script>
    $(document).ready(function() {
      var dataSuplier = $('#table_suplier').DataTable({
          serverSide: true,
          ajax: {
              "url": "{{ url('suplier/list') }}",
              "dataType": "json",
              "type": "POST"
          },
          columns: [
            {
              data: "DT_RowIndex",
              className: "text-center",
              orderable: false,
              searchable: false
            },{
              data: "nama_suplier",
              className: "",
              orderable: true,
              searchable: true
            },{
              data: "alamat_suplier",
              className: "",
              orderable: true,
              searchable: true
            },{
              data: "kontak_suplier",
              className: "",
              orderable: true,
              searchable: true
            },{
              data: "aksi",
              className: "",
              orderable: false,
              searchable: false
            }
          ]
      });
    });
  </script>
@endpush
