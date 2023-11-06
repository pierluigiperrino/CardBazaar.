<x-layout>
<!-- SEZIONE Login -->
<div id="loginSection"style="margin: 5%">
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
                            <p class="mt-3 text-center">{{__('custom.auth.log5')}} <button onclick="showSection('registerSection')">{{__('custom.auth.log6')}}</button></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
   
    <!-- SEZIONE Registrazione -->
    <div id="RegisterSection" style="margin: 5%;" class="hidden">
        <div class="register-section shadow">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="register-form">
                            <h2 class="mb-5 text-center">{{__('custom.auth.reg1')}}</h2>
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{__('custom.auth.reg2')}}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{old('name')}}" required>
                                    @error('name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{__('custom.auth.reg3')}}</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{old('email')}}" required>
                                    @error('email')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">{{__('custom.auth.reg4')}}</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" value="{{old('password')}}" required>
                                    @error('password')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">{{__('custom.auth.reg5')}}</label>
                                    <input type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}" required>
                                    @error('password_confirmation')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-secondary">{{__('custom.auth.reg6')}}</button>
                                </div>
                            </form>
                            <p class="mt-3 text-center">{{__('custom.auth.reg7')}} <a onclick="showSection('loginSection')">{{__('custom.auth.reg8')}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- End Register Section -->   
</x-layout>
