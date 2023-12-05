@extends('page._layouts.main')
@section('title', 'Home')

@section('header')
<div class="bg-image" style="background-image: url('{{ asset('page/img/background.png') }}'); height: 80vh"></div>
@endsection

@section('content')
<div class="container">
  <section>
    <div class="row">
      <div class="col-md-6 gx-5 mb-2">
        <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
          <img src="https://mdbootstrap.com/img/new/slides/031.jpg" class="img-fluid"/>
          <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
        </div>
      </div>

      <div class="col-md-6 gx-5 mb-2">
        <h4><strong>Facilis consequatur eligendi</strong></h4>
        <p class="text-muted">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis
          consequatur eligendi quisquam doloremque vero ex debitis
          veritatis placeat unde animi laborum sapiente illo possimus,
          commodi dignissimos obcaecati illum maiores corporis.
        </p>
        <p><strong>Doloremque vero ex debitis veritatis?</strong></p>
        <p class="text-muted">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod
          itaque voluptate nesciunt laborum incidunt. Officia, quam
          consectetur. Earum eligendi aliquam illum alias, unde optio
          accusantium soluta, iusto molestiae adipisci et?
        </p>
      </div>
    </div>
  </section>
</div>

<section id="trending">
  <h1 class="text-center my-5">Trending</h1>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col-12 col-md-6 col-lg-4">
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
      <div class="col-12 col-md-6 col-lg-4">
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
      <div class="col-12 col-md-6 col-lg-4">
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