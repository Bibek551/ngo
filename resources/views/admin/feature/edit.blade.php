@extends('layouts.admin.master')
@section('title', 'Features')

@section('content')
    @include('admin.includes.message')

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Feature "{{ $feature->title }}"</h5>
                <small class="text-muted float-end">
                    <a href="{{ route('admin.features.index') }}" class="btn btn-primary"><i
                            class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.features.update', $feature->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $feature->title) }}" name="title" id=""
                                    placeholder="">
                                @error('title')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label" for="basic-default-fullname">Status</label>
                                        <select name="status" id=""
                                            class="form-select @error('status') is-invalid @enderror">
                                            <option {{ $feature->status == 1 ? 'selected' : '' }} value="1">
                                                Published
                                            </option>
                                            <option {{ $feature->status == 0 ? 'selected' : '' }} value="0">Draft
                                            </option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="basic-default-fullname">Order</label>
                                        <input type="number" name="order"
                                            class="form-control @error('order') is-invalid @enderror"
                                            value="{{ old('order', $feature->order) }}">
                                        @error('order')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Description</label>
                                <textarea id="" class="form-control @error('description') is-invalid @enderror ckeditor" name="description"
                                    rows="8" placeholder="">{{ old('description', $feature->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Short Description</label>
                                <textarea id="" class="form-control @error('short_description') is-invalid @enderror" name="short_description"
                                    rows="4" placeholder="">{{ old('short_description', $feature->short_description) }}</textarea>
                                @error('short_description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card card-body seo my-3 shadow br-8 p-4">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="basic-default-message">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror image"
                                        name="image" id="">
                                    <img src="" height="60" alt="" class="view-image mt-2">
                                    @if ($feature->image)
                                        <img src="{{ asset('admin/images/feature/' . $feature->image) }}" width="100"
                                            class="mt-2 old-image">
                                    @endif
                                    @error('image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">Logo <span class="fw-bold">(40 x
                                            40px)</label>
                                    <input type="file" class="form-control @error('logo') is-invalid @enderror image"
                                        name="logo" id="">
                                    <img src="" height="60" alt="" class="view-image bg-dark mt-2">
                                    @if ($feature->logo)
                                        <img src="{{ asset('admin/images/feature/' . $feature->logo) }}" width="100"
                                            class="mt-2 old-image bg-dark p-2">
                                    @endif
                                    @error('logo')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="card card-body seo my-3 shadow br-8 p-4">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Seo Title</label>
                                    <input type="text" class="form-control @error('seo_title') is-invalid @enderror"
                                        name="seo_title" id=""
                                        value="{{ old('seo_title', $feature->seo_title) }}" placeholder="">
                                    @error('seo_title')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Meta Description</label>
                                    <textarea name="meta_description" id="" rows="6"
                                        class="form-control @error('meta_description') is-invalid @enderror">{{ old('meta_description', $feature->meta_description) }}</textarea>
                                    @error('meta_description')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Meta Keywords</label>
                                    <input type="text"
                                        class="form-control @error('meta_keywords') is-invalid @enderror"
                                        name="meta_keywords" id=""
                                        value="{{ old('meta_keywords', $feature->meta_keywords) }}" placeholder="">
                                    @error('meta_keywords')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-rotate"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(".image").change(function() {
            input = this;
            var nthis = $(this);

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    nthis.siblings('.old-image').hide();
                    nthis.siblings('.view-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
@endsection
