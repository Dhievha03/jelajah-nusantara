@extends('page._layouts.main')
@section('title', 'Tentang Kami')

@section('css')
<link rel="stylesheet" href="{{ asset('page/css/about.css') }}">
@endsection

@section('header')
    <div class="header-container">
        <div class="bg-black-sh"></div>
        <div class="container">
            <div class="header-content-text">
                <p class="text-app-secondary" style="font-size: 48px;">Tentang Kami</p>
            </div>
        </div>
        <img class="w-100 h-100" style="object-fit: cover; object-position: center"
            src="{{ asset('page/img/background-3.png') }}" alt="" srcset="">
    </div>
@endsection

@section('content')
<div class="container mt-4">
  <div class="row text-center justify-content-center">
    <!-- Team item-->
    <div class="col-xl-3 col-sm-6 mb-5 d-flex">
      <div class="bg-white rounded shadow-sm py-5 px-4">
        <img
          src="{{ asset('developer/Adit.jpg') }}"
          alt=""
          width="auto"
          class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm"
        />
        <h5 class="mb-0">Aditia Prasasti</h5>
        <span class="text-muted"
          >Front-End Developer</span
        >
        <ul class="social mb-0 list-inline mt-3">
          <li class="list-inline-item">
            <a target="_blank" href="https://www.instagram.com/aditprzz/" class="social-link"
              ><i class="bi bi-instagram"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="mailto:aditpraz222@gmail.com" class="social-link"
              ><i class="bi bi-envelope-at-fill"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a target="_blank" href="https://www.linkedin.com/in/aditiaprasasti/" class="social-link"
              ><i class="bi bi-linkedin"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- End-->

    <!-- Team item-->
    <div class="col-xl-3 col-sm-6 mb-5 d-flex">
      <div class="bg-white rounded shadow-sm py-5 px-4">
        <img
          src="{{ asset('developer/Rafa.jpg') }}"
          alt=""
          width="auto"
          class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm"
        />
        <h5 class="mb-0">Syarafat Syazwan</h5>
        <span class="text-muted">UI/UX Designer</span>
        <ul class="social mb-0 list-inline mt-3">
          <li class="list-inline-item">
            <a target="_blank" href="https://www.instagram.com/0patt._/" class="social-link"
              ><i class="bi bi-instagram"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="mailto:syarafatsyazwan36@gmail.com" class="social-link"
              ><i class="bi bi-envelope-at-fill"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a target="_blank" href="https://www.linkedin.com/in/syarafat-syazwan-62790b230/" class="social-link"
              ><i class="bi bi-linkedin"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- End-->

    <!-- Team item-->
    <div class="col-xl-3 col-sm-6 mb-5 d-flex">
      <div class="bg-white rounded shadow-sm py-5 px-4">
        <img
          src="{{ asset('developer/Linggar.jpg') }}"
          alt=""
          width="auto"
          class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm"
        />
        <h5 class="mb-0">Linggar Alfin Nur Safitri</h5>
        <span class="text-muted"
          >Front-End Developer</span
        >
        <ul class="social mb-0 list-inline mt-3">
          <li class="list-inline-item">
            <a target="_blank" href="https://www.instagram.com/linggaralfin/" class="social-link"
              ><i class="bi bi-instagram"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="mailto:linggaralfinnursafitri@gmail.com" class="social-link"
              ><i class="bi bi-envelope-at-fill"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a target="_blank" href="https://www.linkedin.com/in/linggar-alfin-nur-safitri-543630295/" class="social-link"
              ><i class="bi bi-linkedin"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- End-->

    <div class="row text-center justify-content-center">
      <!-- Team item-->
      <div class="col-xl-3 col-sm-6 mb-5 d-flex">
        <div class="bg-white rounded shadow-sm py-5 px-4">
          <img
            src="{{ asset('developer/auliannisafjra.jpg') }}"
            alt=""
            width="auto"
            class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm"
          />
          <h5 class="mb-0">Aulia Annisa Fajra</h5>
          <span class="text-muted"
            >Back-End Developer</span
          >
          <ul class="social mb-0 list-inline mt-3">
            <li class="list-inline-item">
              <a target="_blank" href="https://www.instagram.com/auliannisafjra/" class="social-link"
                ><i class="bi bi-instagram"></i>
              </a>
            </li>
            <li class="list-inline-item"> 
              <a href="mailto:auliarara03@gmail.com" class="social-link"
                ><i class="bi bi-envelope-at-fill"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a target="_blank" href="https://www.linkedin.com/in/aulia-annisa-fajra-303f127/" class="social-link"
                ><i class="bi bi-linkedin"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
      
      <!-- End-->
      <!-- Team item-->
      <div class="col-xl-3 col-sm-6 mb-5 d-flex">
        <div class="bg-white rounded shadow-sm py-5 px-4">
          <img
            src="{{ asset('developer/Arya.jpg') }}"
            alt=""
            width="auto"
            class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm"
          />
          <h5 class="mb-0">Arya Dhievha Rusdiana</h5>
          <span class="text-muted"
            >Back-End Developer</span
          >
          <ul class="social mb-0 list-inline mt-3">
            <li class="list-inline-item">
              <a target="_blank" href="https://www.instagram.com/_dhievha/" class="social-link"
                ><i class="bi bi-instagram"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="mailto:aryadhievha03@gmail.com" class="social-link"
                ><i class="bi bi-envelope-at-fill"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a target="_blank" href="https://www.linkedin.com/in/dhievha" class="social-link"
                ><i class="bi bi-linkedin"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!-- End-->
    </div>
  </div>
</div>
@endsection
