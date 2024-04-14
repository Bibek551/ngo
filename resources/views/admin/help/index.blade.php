@extends('layouts.admin.master')
@section('title', 'Helps')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Help ({{ $helps->total() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('admin.helps.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if ($helps->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Short Description</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($helps as $key => $help)
                            <tr>
                                <td><strong>{{ $key + $helps->firstItem() }}</strong></td>
                                <td class="">
                                    <a class="fancybox" data-fancybox="demo"
                                        href="{{ asset('admin/images/help/') }}/{{ $help->image ?: 'avatar.png' }}">
                                        <img src="{{ asset('admin/images/help/') }}/{{ $help->image ?: 'avatar.png' }}"
                                            alt="{{ $help->title }}" width="80px">
                                    </a>
                                </td>
                                <td><strong>{{ $help->title ?? '' }}</strong></td>
                                <td>{{ $help->short_description ?? '' }}</td>
                                <td>{{ $help->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.helps.edit', $help->id) }}"
                                        style="float: left;margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i>
                                        Edit</a>

                                    <form class="delete-form" action="{{ route('admin.helps.destroy', $help->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_help mr-2" id=""
                                            data-type="confirm" type="submit" title="Delete"><i class="fa fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $helps->links() }}
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
        $('.delete_help').click(function(e) {
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
