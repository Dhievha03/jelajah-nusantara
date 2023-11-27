@extends('admin._layouts.main')

@section('css')
<link rel="stylesheet" href="{{ asset('template-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
     <!-- Begin Page Content -->
<div class="container-fluid">

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Wisata</h1>
 </div>

 <!-- Content Row -->
 <div class="row">
  <div class="col-lg-12">
    <div class="card p-4 mb-4">
      @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible" role="alert">
          {{ session()->get('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      @endif
      @if (session()->has('error'))
      <div class="alert alert-danger alert-dismissible" role="alert">
          {{ session()->get('error') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      @endif
      <div class="d-flex justify-content-between align-items-center">
        <h5 class="font-weight-bold">Data Wisata Yang Belum Dicek</h5>
      </div>
      <div class="table-responsive mt-4">
        <table class="table" id="data-table" style="width: 100%;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Wisata</th>
                    <th>Nama Pengirim</th>
                    <th>Provinsi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
 </div>
</div>
<!-- /.container-fluid -->
@endsection

@section('script')
<script src="{{ asset('template-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
  var dataTable = $('#data-table').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      autoWidth: true,
      scrollX: true,
      ajax: "{{ route('admin.wisata-approval.getWisatas') }}",
      columns: [
      {
          data: 'DT_RowIndex',
          orderable: false,
          searchable: false
      },
      {
          data: 'nama_wisata',
          name: 'nama_wisata',
      },
      {
          data: 'pengirim',
          name: 'pengirim',
      },
      {
          data: 'provinsi',
          name: 'provinsi',
      },
      {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
      },
      ],
      language: {
          emptyTable: 'Tidak ada data dalam table',
          lengthMenu: 'Tampilkan _MENU_ entri',
          search: 'Pencarian:',
          info: 'Menampilkan _START_ hingga _END_ dari _TOTAL_ entri',
          infoEmpty: "Menampilkan 0 hingga 0 dari 0 entri",
          paginate: {
              previous: '<i class="bx bx-chevron-left"></i>',
              next: "<i class='bx bx-chevron-right'></i>",
          }
      },
  });
</script>
@endsection
