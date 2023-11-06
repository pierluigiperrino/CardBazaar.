<x-layout>
    <div class="intro-excerpt text-center mt-5">
        <h2 class="animate__animated animate__pulse fs-1">{{ $category->name }}</h2>
        {{-- <p class="animate__animated animate__pulse">{{__('custom.cat.show1')}} {{ $category->name }}</p> --}}
    </div>

    <div class="product-section">
        <div class="container">
            <div class="row">
                @forelse ($category->orderByAndPaginate() as $announcement)
                <x-card :target='$announcement'/>
                @empty
                <div class="text-center mt-5">
                    <h3 class="my-3">{{__('custom.cat.show2')}}</h3>
                    <div><a href="{{ route('announcements.create') }}" class="btn btn-warning btn-sm">{{__('custom.cat.show3')}}</a></div>
                </div>
                @endforelse
                <div class="mt-2 mb-5">
                    {{-- MENU NAVIGAZIONE --}}
                    {{ $category->orderByAndPaginate()->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
