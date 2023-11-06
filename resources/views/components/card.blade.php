<div class="col-12 col-lg-3 mb-5">
    <div class="custom-card">
        <div class="custom-card-content d-flex flex-column">
            <div>
                <img src="{{ !$target->images()->get()->isEmpty()? $target->images()->first()->getUrl(200, 300): '/assets/images/no-image.png' }}"
                    class="img-fluid product-thumbnail shadow" style="width: 200px; height: 300px;">
            </div>
            <div>
                <h3 class="name text-dark"
                    style="height: 50px; display:flex; align-items:center; justify-content:center;">
                    {{ $target->title }}</h3>
            </div>
            <div class="mt-1 mb-3">
                <strong class="product-price">{{ $target->price }}€</strong>
            </div>
            <div>
                <a href="{{ route('announcements.show', $target->uri) }}"
                    class="btn btn-warning shadow">{{ __('custom.home3') }}</a>
            </div>
            @if (Route::currentRouteName() == 'user_announcements')
                <form class="mt-1 mb-3" action="{{ route('user_announcements_delete', $target->id) }}" method="POST">
                    @csrf
                    <div>
                        <button type="submit" class="btn btn-danger shadow">{{ __('custom.card') }}</button>
                    </div>
                </form>

                {{-- <!-- Modal -->
                <button class="btn btn-danger shadow mt-1 mb-3" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">{{ __('custom.card') }}</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminazione
                                    Articolo</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Sei sicuro di voler elimianare questo articolo?
                            </div>
                            <div class="modal-body">
                                {{ $target->title }}
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('user_announcements_delete', $target->id) }}" method="POST">
                                    @csrf
                                    <div>
                                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Si,
                                            confermo</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
            @endif
        </div>
    </div>
</div>

{{-- <div class="card d-flex" style="width: 18rem; background-color:transparent; border:none;">
        <img src="assets/images/card-1.png" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div> --}}
