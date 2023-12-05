@extends('page._layouts.main')
@section('title', 'Trending')

@section('header')
<div class="bg-image" style="background-image: url('{{ asset('page/img/background.png') }}'); height: 80vh">
  <div class="mask">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="dropdown-center">
        <button
          class="btn btn-light dropdown-toggle"
          type="button"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          Pilih Provinsi
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Sumatera Barat</a></li>
          <li><a class="dropdown-item" href="#">Sumatera Selatan</a></li>
          <li><a class="dropdown-item" href="#">Sumatera Utara</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection

@section('content')
<section id="trending">
  <h1 class="text-center my-5">Trending</h1>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card h-100">
          <img
            src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp"
            class="card-img-top"
            alt="Hollywood Sign on The Hill"
          />
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
              This is a longer card with supporting text below as a
              natural lead-in to additional content. This content is a
              little bit longer.
            </p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img
            src="https://mdbcdn.b-cdn.net/img/new/standard/city/042.webp"
            class="card-img-top"
            alt="Palm Springs Road"
          />
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a short card.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img
            src="https://mdbcdn.b-cdn.net/img/new/standard/city/043.webp"
            class="card-img-top"
            alt="Los Angeles Skyscrapers"
          />
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
              This is a longer card with supporting text below as a
              natural lead-in to additional content.
            </p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img
            src="https://mdbcdn.b-cdn.net/img/new/standard/city/044.webp"
            class="card-img-top"
            alt="Skyscrapers"
          />
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
              This is a longer card with supporting text below as a
              natural lead-in to additional content. This content is a
              little bit longer.
            </p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img
            src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp"
            class="card-img-top"
            alt="Hollywood Sign on The Hill"
          />
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
              This is a longer card with supporting text below as a
              natural lead-in to additional content. This content is a
              little bit longer.
            </p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img
            src="https://mdbcdn.b-cdn.net/img/new/standard/city/042.webp"
            class="card-img-top"
            alt="Palm Springs Road"
          />
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a short card.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img
            src="https://mdbcdn.b-cdn.net/img/new/standard/city/043.webp"
            class="card-img-top"
            alt="Los Angeles Skyscrapers"
          />
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
              This is a longer card with supporting text below as a
              natural lead-in to additional content.
            </p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img
            src="https://mdbcdn.b-cdn.net/img/new/standard/city/044.webp"
            class="card-img-top"
            alt="Skyscrapers"
          />
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
              This is a longer card with supporting text below as a
              natural lead-in to additional content. This content is a
              little bit longer.
            </p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img
            src="https://mdbcdn.b-cdn.net/img/new/standard/city/043.webp"
            class="card-img-top"
            alt="Los Angeles Skyscrapers"
          />
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
              This is a longer card with supporting text below as a
              natural lead-in to additional content.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection