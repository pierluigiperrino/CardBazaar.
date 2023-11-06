<x-layout>
    <div class="intro-excerpt text-center mt-5">
        <h2 class="animate__animated animate__pulse fs-1">{{ __('custom.user_ind1') }}</h2>
        <p class="animate__animated animate__pulse">{{ __('custom.user_ind1.1') }}</p>
    </div>

    <div class="product-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session()->has('send.ok'))
                        <div class="row">
                            <div class="col-12 text-center mt-3">
                                <p class="text-center fw-bolder shadow alert alert-success" role="alert">
                                    {{ session()->get('send.ok') }}</p>
                            </div>
                        </div>
                    @endif
                </div>
                @forelse ($announcements as $announcement)
                    @if ($announcement->is_accepted)
                        <x-card :target='$announcement' />
                    @endif
                @empty
                    <div class="text-center mt-5">
                        <h3 class="my-3">{{ __('custom.user_ind2') }}</h3>
                        <div>
                            <a href="{{ route('announcements.create') }}"
                                class="btn btn-warning btn-sm">{{ __('custom.cat.show3') }}</a>
                        </div>
                    </div>
                @endforelse
                <div class="mt-2 mb-5">
                    {{-- MENUNAVIGAZIONE --}}
                    {{ $announcements->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
