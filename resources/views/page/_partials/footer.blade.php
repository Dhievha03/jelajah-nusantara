<footer class="footer" style="background-color: white">
    <!-- Copyright - Bootstrap Brain Component -->
    <section class="py-5 py-xl-8 py-xxl-9 border-top border-light">
        <div class="container overflow-hidden">
            <div class="row gy-5 gy-md-0">
                <div class="col-xs-12 col-md-6">
                  <div class="credits text-center text-md-start mt-2 fs-7">
                    <p style="font-weight: 500">Tentang Kami</p>
                    <a class="text-decoration-none d-flex justify-content-center justify-content-md-start align-items-center" href="{{ route('about') }}">
                      <small class="text-muted">
                        About
                      </small>
                    </a>
                  </div>

                  <div class="credits text-center text-md-start mt-4 fs-7">
                      <p style="font-weight: 500">Hubungi Kami</p>
                      <a class="text-decoration-none d-inline justify-content-center justify-content-start align-items-center" href="mailto:teamjelajahnusantara@gmail.com">
                        <i class="text-muted bi bi-envelope-fill" style="font-size: 18px; margin-right: 8px;"></i>
                        <small class="text-muted">
                          teamjelajahnusantara@gmail.com
                        </small>
                      </a>
                  </div>  
                </div>

                <div class="col-xs-12 col-md-6">
                    <div class="nav justify-content-center justify-content-md-end">
                        <div class="row">
                            <div class="row col-12">
                              <div class="col-xs-9 col-md-6">
                                <a href="{{ route('home') }}">
                                  <img src="{{ asset('logo/logo-no-background.png') }}" alt="logo" class="w-100">
                              </a>
                              </div>
                            </div>
                            <div class="col-12 mt-2" style="text-align: justify">
                                <small class="text-muted">
                                    Teman setia petualangan Anda di berbagai destinasi menakjubkan di Indonesia!
                                    Kami hadir untuk memastikan setiap langkah perjalanan Anda diberkati dengan keunikan
                                    dan keindahan sejarah yang hanya dapat ditemukan di Indonesia.
                                </small>
                            </div>
                        </div>

                        {{-- <p class="mb-0 text-center">
              <a
                
              >
                <span>Contact Us</span>
                <i class="bi bi-envelope-arrow-down"></i>
              </a>
            </p> --}}
                    </div>
                </div>

            </div>
        </div>

    </section>
    <div class="bg-app-primary p-4">
        <div class="copyright text-center text-white" style="font-weight: 500">
            &copy; Jelajah Nusantara 2024. All Rights Reserved.
        </div>
    </div>
</footer>
