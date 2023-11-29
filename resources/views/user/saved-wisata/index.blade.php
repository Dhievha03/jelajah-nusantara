@extends('user._layouts.dashboard')

@section('content')
     <!-- Begin Page Content -->
<div class="container-fluid">

 <!-- Page Heading -->
 <div class="card p-4 mb-4">
    <h5 class="font-weight-bold p-0 m-0">Wisata Tersimpan</h5>
 </div>

 <!-- Content Row -->
  <div class="row mb-4">
    <div class="col-md-3">
      <div class="card">
        <img class="card-img-top" src="{{ asset('user/img/bg-1.jpg') }}" alt="foto wisata">
        <div class="card-body">
          <h5 class="card-title">Wisata 1</h5>
          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, sequi doloremque. Vitae deleniti nemo officia sunt? Nobis, accusantium quis. Animi!.</p>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection