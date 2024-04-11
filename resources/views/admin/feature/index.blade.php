@extends('layouts.admin.master')
@section('title', 'Features')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Features ({{ $features->total() }})</h5>
            <small class="text-muted float-end">
                <a href="{{ route('admin.features.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if ($features->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Logo</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Order</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($features as $key => $feature)
                            <tr>
                                <td><strong>{{ $key + $features->firstItem() }}</strong></td>
                                <td class="">
                                    <a href="{{ asset('admin/images/feature') }}/{{ $feature->logo ?: 'avatar.png' }}"
                                        data-fancybox="demo" class="fancybox">
                                        <img src="{{ asset('admin/images/feature') }}/{{ $feature->logo ?: 'avatar.png' }}"
                                            alt="{{ $feature->title }}" width="80px" class="bg-dark p-2">
                                    </a>
                                </td>
                                <td><strong>{{ $feature->title ?? '' }}</strong></td>
                                <td><span
                                        class="badge {{ $feature->status == 0 ? 'bg-label-danger' : 'bg-label-success' }}">{{ $feature->status == 0 ? 'Draft' : 'Published' }}</span>
                                </td>
                                <td>{{ $feature->order ?? '' }}</td>

                                <td>{{ $feature->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('admin.features.edit', $feature->id) }}"
                                        style="float: left;margin-right: 5px;" class="btn btn-sm btn-primary"><i
                                            class="fa-solid fa-pen-to-square"></i> Edit</a>


                                    <form class="delete-form" action="{{ route('admin.features.destroy', $feature->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger delete_feature mr-2"
                                            id="" title="Delete" data-type="confirm"><i class="fa fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $features->links() }}
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
        $('.delete_feature').click(function(e) {
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
