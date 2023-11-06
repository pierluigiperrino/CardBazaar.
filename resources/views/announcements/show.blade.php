<x-layout>
    <div style="margin:80px;"></div>
    <div class="row justify-content-between gy-4 mt-3 mx-1">

        <section id="gallery-single" class="gallery-single d-flex flex-column">
            <div class="container mb-5">
                @if ($announcement)
                    <div class="row d-flex justify-content-center gy-2 mt-3">
                        <div id="carousel-show"
                            class="col-12 col-lg-6 d-flex justify-content-center carousel carousel-dark slide">

                            <div class="carousel-inner">
                                @if (!$announcement->images->isEmpty())
                                    @foreach ($announcement->images as $image)
                                        <div class="carousel-item @if ($loop->first) active @endif">
                                            <img src="{{ $image->getUrl(200, 300) }}" class="w-100"
                                                style="height: 300px; width: 200px; object-fit:contain;" alt="...">
                                        </div>
                                    @endforeach
                                @else
                                    <div class="carousel-item active">
                                        <img src="/assets/images/no-image.png" class=" w-100"
                                            style="height: 300px; width: 120px; object-fit:contain;" alt="...">
                                    </div>
                                @endif
                            </div>

                            @if ($announcement->images->count() > 1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel-show"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carousel-show"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            @endif
                        </div>

                        <div class="col-12 col-lg-6 d-flex justify-content-center my-5">
                            <div class="shadow dati-scheda p-2">
                                <div class="card-description">
                                    <h3 class="mb-3">{{ $announcement->title }}</h3>
                                    <div><strong>{{ __('custom.rev.ind3') }} <a
                                                href="{{ route('categories.show', ['name' => $announcement->category->name]) }}">{{ $announcement->category->name }}</a></strong>
                                    </div>
                                    <div><strong>{{ __('custom.rev.ind4') }}
                                            {{ $announcement->user->name }}</strong></div>
                                    <div class="mb-3"><strong>{{ __('custom.rev.ind5') }}
                                            {{ $announcement->created_at->format('d/m/Y') }}</strong>
                                    </div>
                                    <div><strong>{{ __('custom.rev.ind6') }}</strong></div>
                                    <p class="mb-4">{{ $announcement->body }}</p>
                                    <h5><strong>{{ $announcement->price }}€</strong></h5>
                                    {{-- <p><a href="{{ route('register') }}" class="btn btn-warning me-2">Contatta il venditore</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>


        <div class="product-section mx-0 mb-5 py-4">
            <div class="container dati-scheda shadow">
                <h2 class="d-flex justify-content-center mt-4">{{ __('custom.ann.show5') }}</h2>
                <div class="row d-flex">
                    @forelse ($relatedAnnouncements as $relatedAnnouncement)
                        <x-card :target='$relatedAnnouncement' />
                    @empty
                        <h4 class="my-3 mx-1 d-flex justify-content-center">{{ __('custom.ann.show6') }}</h4>
                        <div class="mb-5 d-flex justify-content-center"><a href="{{ route('announcements.create') }}"
                                class="btn btn-secondary col-4" style="background-color:#FFC107; border:none;color:#000; width:200px" >{{ __('custom.ann.show7') }}</a></div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layout>
