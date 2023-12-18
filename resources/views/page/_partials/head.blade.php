<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>Jelajah Nusantara</title>

<link href="{{ asset('logo/favicon.png') }}" rel="icon">

<meta name="dicoding:email" content="aditpraz222@gmail.com">

<meta name="title" content="Jelajah Nusantara - @yield('title')">
<meta name="description" content="Jelajah Nusantara - @yield('description')" />
<meta name="keywords" content="Jelajah Nusantara, Wisata Bersejarah, Peninggalan Sejarah, Situs Bersejarah, Destinasi Bersejarah, Candi Bersejarah, Istana Bersejarah, Benteng Bersejarah, Museum Sejarah, Monumen Bersejarah, Warisan Budaya, Tradisi Sejarah, Acara Budaya, Festival Sejarah, Tur Guided Sejarah, Aktivitas Sejarah, Acara Pendidikan Sejarah, Rekreasi Sejarah, Restoran Bersejarah, Website Pencarian Sejarah, Aplikasi Pemandu Wisata Sejarah, Peta Wisata Bersejarah, Kurasi Informasi Sejarah, Database Wisata Bersejarah, Pelestarian Situs Bersejarah, Pariwisata Berkelanjutan, Program Konservasi Sejarah, Ulasan Wisata Sejarah, Rating Destinasi Bersejarah, Pengalaman Pengunjung Sejarah, Peta Destinasi Sejarah, Navigasi ke Situs Bersejarah, Rute Wisata Sejarah" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="author" content="Jelajah Nusantara">

<meta name="dcterms.type" content="Service" />
<meta name="dcterms.language" content="id" />
<meta property="og:url" content="{{ (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" }}" />
<meta property="og:title" content="Jelajah Nusantara - @yield('title')" />
<meta property="og:description" content="Jelajah Nusanta - @yield('description')" />
<meta property="og:site_name" content="Jelajah Nusantara" />
<meta property="og:type" content="website" />
<meta property="og:image" content="{{ asset('logo/favicon.png') }}" />

{{-- css --}}
<link rel="stylesheet" href="{{ asset('page/css/style.css') }}" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.css" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&family=Quicksand:wght@500;700&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css"/>

@livewireStyles
@yield('css')