@extends('layouts.admin.master')
@section('title', 'Image Galleries')

@section('content')
    <link rel="stylesheet" href="{{ asset('admin/inner/dropzone.min.css') }}">
    <script src="{{ asset('admin/inner/dropzone.js') }}"></script>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Upload Images</h5>

            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('admin.galleries.index') }}"><i class="fa-solid fa-arrow-left"></i>
                    Back</a>
            </small>
        </div>

        <div class="row">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Upload "{{ $country->name }}" Images</h5>
            </div>
            <div class="col-md-12">
                <div class="card-body">
                    <form class="dropzone" id="dropzone" action="{{ route('admin.gallery.upload.store', $country_id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="dz-message">
                            Drag and Drop Your Images Here<br>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row m-2">
                        @foreach ($galleries as $gallery)
                            <div class="fro-dropzone-image ">
                                <button class="btn btn-danger btn-sm fro-dropzone-image-btn delete-single-document"
                                    imageid="{{ $gallery->id }}" style="z-index: 9">X</button>
                                <a class="fro-dropzone-image-a fancybox" data-fancybox="demo" href="{{ $gallery->image }}"
                                    target="_blank">
                                    <img class="fro-dropzone-image-img" src="{{ $gallery->image }}" alt=""
                                        height="100px" width="100px">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a class="btn btn-primary m-4" href="{{ route('admin.countries.index') }}"><i class="fa fa-refresh"
                            aria-hidden="true"></i>
                        Finish</a>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('scripts')
    <script>
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone('form#dropzone', {
            maxFiles: 12,
            acceptedFiles: 'image/*',
            dictInvalidFileType: 'This form only accepts images.',
            dictDefaultMessage: 'Drag or click here to upload',
            maxFilesize: 100,
            timeout: 180000000,

        });

        myDropzone.on("complete", function(file) {
            location.reload();

            toastr.success("Images Upload Successfully!", {
                fadeAway: 1500
            });
        });

        $('.delete-single-document').click(function() {
            var id = $(this).attr('imageid');

            var url = "{{ url('/admin/country/delete-file/') }}" + "/" + id;

            swal({
                    title: `Are you sure?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: url,
                            type: "GET",
                            success: function(data) {
                                location.reload();
                                toastr.success("Images Deleted Successfully!", {
                                    fadeAway: 1500
                                });
                            },
                            error: function(data) {
                                alert("Some Problems Occured!");
                            },
                        });
                    }
                });
        });
    </script>
@endsection
