<x-layout>

    {{-- CHI SIAMO --}}

    <div class="intro-excerpt text-center mt-5">
        <h2 class="animate__animated animate__pulse fs-1">{{ __('custom.about.us1') }}</h2>
        <div class="container">
            <div class="row">
                <p>{{ __('custom.about.us2') }}</p>
                <p>{{ __('custom.about.us3') }}</p>
                <p>{{ __('custom.about.us4') }}</p>
            </div>
        </div>
        {{-- <p class="animate__animated animate__pulse">{{ __('custom.ann.ind2') }}</p> --}}
    </div>

    {{-- STAFF --}}

    <div class="intro-excerpt text-center mt-5">
        <h2 class="animate__animated animate__pulse fs-1">{{ __('custom.about.us5') }}</h2>
        {{-- <p class="animate__animated animate__pulse">{{ __('custom.ann.ind2') }}</p> --}}
    </div>
    <div class="product-section">
        <div class="container">
            <div class="row my-5">
                <div class="col-12 col-lg-3 d-flex align-items-center flex-column">
                    <img class="object-fit-cover rounded-circle"
                        style="border: 5px solid rgb(66, 33, 104); width: 200px; height: 200px;"
                        src="assets/images/staff/Alessandro-Mascellini.jpg" alt="">
                    <div class="mb-5 mt-2 fs-4 fw-bold">Alessandro Mascellini <a href="https://www.linkedin.com/in/alessandro-mascellini-full-stack-developer-junior/"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-12 col-lg-3 d-flex align-items-center flex-column">
                    <img class="object-fit-cover rounded-circle"
                        style="border: 5px solid rgb(66, 33, 104); width: 200px; height: 200px;"
                        src="assets/images/staff/Jessy-Nesola.jpg" alt="">
                    <div class="mb-5 mt-2 fs-4 fw-bold">Jessy Nesola <a href="https://www.linkedin.com/in/jessynesola-dev/"><i class="fa-brands fa-linkedin"></i></a></div>
                </div>
                <div class="col-12 col-lg-3 d-flex align-items-center flex-column">
                    <img class="object-fit-cover rounded-circle"
                        style="border: 5px solid rgb(66, 33, 104); width: 200px; height: 200px;"
                        src="assets/images/staff/Emanuele-Papale.jpg" alt="">
                    <div class="mb-5 mt-2 fs-4 fw-bold">Emanuele Papale <a href="https://www.linkedin.com/in/emanuele-papale/"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-12 col-lg-3 d-flex align-items-center flex-column">
                    <img class="object-fit-cover rounded-circle"
                        style="border: 5px solid rgb(66, 33, 104); width: 200px; height: 200px;"
                        src="assets/images/staff/Pierluigi-Perrino.png" alt="">
                    <div class="mb-5 mt-2 fs-4 fw-bold">Pierluigi Perrino <a href="https://www.linkedin.com/in/pierluigi-perrino/"><i class="fa-brands fa-linkedin"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
