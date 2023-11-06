<x-layout>
    <!-- SEZIONE LOGIN -->
    <div style="margin: 5%">
    <div class="login-section shadow">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="login-form">
                        <h2 class="mb-5 text-center">{{__('custom.auth.log1')}}</h2>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="email" class="form-label">{{__('custom.auth.log2')}}</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">{{__('custom.auth.log3')}}</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-secondary">{{__('custom.auth.log4')}}</button>
                            </div>
                        </form>
                        {{-- <p class="mt-3"><a href="#">Forgot your password?</a></p> --}}
                        <p class="mt-3 text-center">{{__('custom.auth.log5')}} <a href="{{ route('register') }}">{{__('custom.auth.log6')}}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- End Login Section -->
</x-layout>
