@extends('layouts.admin.master')
@section('title', 'Books')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Books ({{ $books->total() }})</h5>
            <small class="text-muted float-end">
                <a href="{{ route('admin.book.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if ($books->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>File</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Order</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                        @foreach ($books as $key => $book)
                            @php
                                $file_path = asset('admin/images/book/' . $book->image);
                                $ext = pathinfo($file_path, PATHINFO_EXTENSION);
                            @endphp
                            <tr>
                                <td><strong>{{ $key + $books->firstItem() }}</strong></td>
                                <td class="">
                                    <a href="{{ asset('admin/images/book/') }}/{{ $book->image ?: 'avatar.png' }}"
                                        data-fancybox="demo" class="fancybox">

                                        @if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png' || $ext == 'webp')
                                            <img src="{{ asset('admin/images/book/') }}/{{ $book->image ?: 'avatar.png' }}"
                                                alt="{{ $book->title }}" width="80px">
                                        @else
                                            <img src="{{ asset('admin/images/file.png') }}" alt="{{ $book->title }}"
                                                width="80px">
                                        @endif
                                    </a>
                                </td>
                                <td><strong>{{ $book->title ?? '' }}</strong></td>
                                <td><span
                                        class="badge {{ $book->status == 0 ? 'bg-label-danger' : 'bg-label-success' }}">{{ $book->status == 0 ? 'Draft' : 'Published' }}</span>
                                </td>
                                <td>{{ $book->order ?? '' }}</td>

                                <td>{{ $book->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('admin.book.edit', $book->id) }}"
                                        style="float: left;margin-right: 5px;" class="btn btn-sm btn-primary"><i
                                            class="fa-solid fa-pen-to-square"></i> Edit</a>


                                    <form class="delete-form" action="{{ route('admin.book.destroy', $book->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger delete_book mr-2" id=""
                                            title="Delete" data-type="confirm"><i class="fa fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $books->links() }}
            @else
                <div class="card-body">
                    <h6>No Data Found!</h6>
                </div>
            @endif
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $('.delete_book').click(function(e) {
            e.preventDefault();
            swal({
                    title: `Are you sure?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(this).closest("form").submit();
                    }
                });

        });
    </script>
@endsection
