<div>
    <div class="intro-excerpt text-center mt-5">
        <h2 class="animate__animated animate__pulse fs-1">{{ __('custom.rev.tab1') }}</h2>
    </div>

    <div class="product-section">
        <div class="container">
            <div class="row">
                @if (session()->has('success'))
                    <div class="row">
                        <div class="col-12 text-center mt-3">
                            <p class="text-center fw-bolder shadow alert alert-success" role="alert">
                                {{ session()->get('success') }}</p>
                        </div>
                    </div>
                @endif

                <div class="input-group my-3">
                    <input wire:model="search" type="text" class="form-control"
                        placeholder="{{ __('custom.rev.tab1.1') }}">
                </div>
                <table class="table border mt-2">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('custom.rev.tab2') }}</th>
                            <th scope="col">{{ __('custom.rev.tab3') }}</th>
                            <th scope="col">{{ __('custom.rev.tab4') }}</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($announcements_to_check as $announcement_to_check)
                            <tr>
                                <th>{{ $announcement_to_check->id }}</th>
                                <td>{{ $announcement_to_check->title }}</td>
                                <td>{{ $announcement_to_check->category->name }}</td>
                                <td>
                                    @if ($announcement_to_check->is_accepted == true)
                                        <span class="badge bg-success text-wrap"
                                            style="width: 6rem">{{ __('custom.rev.tab5') }}</span>
                                    @elseif (is_null($announcement_to_check->is_accepted))
                                        <span class="badge bg-primary text-wrap"
                                            style="width: 6rem">{{ __('custom.rev.tab6') }}</span>
                                    @elseif ($announcement_to_check->is_accepted == false)
                                        <span class="badge bg-danger text-wrap"
                                            style="width: 6rem">{{ __('custom.rev.tab7') }}</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="{{ route('revisor.show', ['uri' => $announcement_to_check->uri]) }}"
                                            class="btn btn-secondary me-md-2">{{ __('custom.rev.tab8') }}</a>

                                        <button wire:click="destroy({{ $announcement_to_check->id }})" 
                                            class="btn btn-dark me-md-2">{{ __('custom.rev.tab9') }}</button>

                                        {{-- <!-- Modal -->

                                        <button class="btn btn-dark me-md-2" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">{{ __('custom.rev.tab9') }}</button>
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        {{ $announcement_to_check->title }}
                                                    </div>
                                                    <div class="modal-footer">

                                                        <button wire:click="destroy({{ $announcement_to_check->id }})"
                                                            class="btn btn-dark" data-bs-dismiss="modal">Si,
                                                            confermo</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr colspan="4"> </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-2 mb-5">
                    {{-- MENUNAVIGAZIONE --}}
                    {{ $announcements_to_check->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
