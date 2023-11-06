<div>
    <div style="margin: 5%">
        <section class="login-section shadow-lg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="login-form">
                            <h2 class="mb-4 text-center">{{ __('custom.liv.cre1') }}</h2>
                            <form wire:submit.prevent="store">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">{{ __('custom.liv.cre2') }}</label>
                                    <input wire:model="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" id="title"
                                        required>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="body" class="form-textarea">{{ __('custom.liv.cre3') }}</label>
                                    <textarea wire:model="body" type="text" class="form-control @error('body') is-invalid @enderror" id="body"
                                        required></textarea>
                                    @error('body')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">{{ __('custom.liv.cre4') }}</label>
                                    <input wire:model="price" type="text"
                                        class="form-control @error('price') is-invalid @enderror" id="price"
                                        required>
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label">{{ __('custom.liv.cre5') }}</label>
                                    <select wire:model.defer="category" id="category"
                                        class="form-select @error('category') is-invalid @enderror">
                                        <option value="">{{ __('custom.liv.cre6') }}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="temporary_images"
                                        class="form-label">{{ __('custom.liv.cre7') }}</label>
                                    <input wire:model="temporary_images" type="file" multiple
                                        class="form-control @error('temporary_images.*') is-invalid @enderror"
                                        id="upload{{ $iteration }}">
                                    @error('temporary_images.*')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if (!empty($images))
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <div class="row border border-4 border-info rounded py-4">
                                                <div class="text-center text-decoration-underline fs-5">{{ __('custom.liv.cre8') }}</div>
                                                @foreach ($images as $key => $image)
                                                    <div class="col my-3">
                                                        <div class="bg-prew mx-auto shadow rounded"
                                                            style="background-image: url({{ $image->temporaryUrl() }});">
                                                        </div>
                                                        <button type="button"
                                                            class="btn btn-danger shadow d-block text-center mt-4 mx-auto"
                                                            wire:click="removeImage({{ $key }})">{{ __('custom.liv.cre9') }}</button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="d-grid">
                                    <button type="submit"
                                        class="btn btn-secondary mb-5">{{ __('custom.liv.cre10') }}</button>
                                    @if (session()->has('success'))
                                        <p class="text-center fw-bolder shadow alert alert-success" role="alert">
                                            {{ session()->get('success') }}</p>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
