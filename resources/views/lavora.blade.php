<x-layout>
    <div class="px-5 shadow work-bg">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h2 class="animate__animated animate__heartBeat mb-3">{{__('custom.lav1')}}</h2>
                        <p class="mb-4 ">{{__('custom.lav2')}}</p>
                    </div>
                </div>

                <div class="col-xl-5 col-xxl-6 text-center">
                    <img class="img-fluid rounded-3 my-5" src="/assets/images/bianco.png" alt="Library" />
                </div>
            </div>
        </div>
    </div>
    <div class="form-section my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 ">
                    <div class="my-5">
                        <h2 class="mb-4 text-center">{{__('custom.lav3')}}</h2>
                        <form action="{{route('become.revisor')}}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-floating mb-4">
                                <textarea name="aboutYou" class="form-control mb-4 @error('aboutYou') is-invalid @enderror" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">{{__('custom.lav4')}}</label>
                                @error('aboutYou')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-secondary">{{__('custom.lav5')}}</button>
                            </div>
                        </form>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-layout>
