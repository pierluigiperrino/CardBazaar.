<x-layout>
    {{-- <div class="hero" style="margin-top: 70px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h2 class="animate__animated animate__pulse fs-1">Esplora da qui tutte le carte!</h2>
                        <p class="animate__animated animate__pulse">Che testo mettiamo? Che testo mettiamo? Che testo
                            mettiamo? Che testo mettiamo?</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="intro-excerpt text-center" style="margin-top: 4%">
        <h2 class="animate__animated animate__pulse fs-1">{{__('custom.src1')}}</h2>
        {{-- <p class="animate__animated animate__pulse">Che testo mettiamo? Che testo mettiamo? Che testo
            mettiamo? Che testo mettiamo?</p> --}}
    </div>

    <div class="product-section">
        <div class="container">
            <div class="row">
                @forelse ($announcements as $announcement)
                <x-card :target='$announcement'/>
                @empty
                <div class="text-center">
                    <h3 class="mt-5 mb-3">{{__('custom.src2')}}</h3>
                    <div><a href="{{ route('announcements.create') }}" class="btn btn-warning btn-sm">{{__('custom.src3')}}</a></div>
                </div>
                @endforelse
                <div class="mb-5"></div>
                {{-- MENU NAVIGAZIONE --}}
                {{ $announcements->links() }}
            </div>
        </div>
    </div>
</x-layout>
