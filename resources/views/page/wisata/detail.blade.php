@extends('page._layouts.main')
@section('title', 'Wisata')

@section('content')
<div class="container">
  <div class="row mt-4 pt-4">
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <h5 class="font-weight-bold">Prasasti Batu Tulis</h5>
              <p style="font-size: 14px">Nama Pembuat | Waktu Pembuatan</p>
            </div>
            <div style="min-width: 44px; cursor: pointer; text-align: right">
              <i class="bi bi-bookmark-fill" style="font-size: 28px; color: #a4a4a4"></i>
            </div>
          </div>
          
          <hr class="pt-0 mt-0" />
          <div class="d-flex justify-content-center mb-2">
            <img class="img-wisata" src="{{ asset('user/img/bg-1.jpg') }}" alt="Wisata Image" />
          </div>
          <div class="mt-4">
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, id quidem et quod consectetur exercitationem animi vitae recusandae doloremque corrupti voluptatum alias veritatis fugit veniam dolorum maxime asperiores ,
              provident facilis eos laudantium illo ullam asperiores. Reprehenderit, modi officiis.
            </p>
            <p>
              voluptas laboriosam placeat iste suscipit facere. Delectus. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti repudiandae quidem voluptates excepturi et facere magni error totam eaque laborum, provident
              facilis eos laudantium illo ullam asperiores. Reprehenderit, modi officiis.
            </p>
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-xl-4 col-lg-5">
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="pt-2 pb-2" style="overflow: hidden">
            <!-- Google Maps Static API -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.187205302385!2d106.80641491002824!3d-6.623653564721033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c80b1e4ec2f1%3A0x494fbc07f23d1437!2sPrasasti%20Batu%20Tulis!5e0!3m2!1sid!2sid!4v1701804545611!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <div>
            Jl. Batu Tulis No.54, RT.02/RW.02, Batutulis, Kec. Bogor Sel., Kota Bogor, Jawa Barat 16133</div>
            <a href="#" target="_blank" rel="noopener noreferrer">Lihat di maps</a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
