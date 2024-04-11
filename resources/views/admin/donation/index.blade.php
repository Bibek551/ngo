@extends('layouts.admin.master')
@section('title', 'Donation')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Donations ({{ $donations->total() }})</h5>
        </div>

        <div class="table-responsive text-nowrap">
            @if ($donations->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Company</th>
                            <th>Price</th>
                            <th>App</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($donations as $key => $donation)
                            <tr>
                                <td><strong>{{ $key + $donations->firstItem() }}</strong></td>

                                <td><strong>{{ $donation->fname ?? '' }}</strong></td>
                                <td><strong>{{ $donation->lname ?? '' }}</strong></td>
                                <td>{{ $donation->email ?? '' }}</td>
                                <td>{{ $donation->phone ?? '' }}</td>
                                <td>{{ $donation->company ?? '' }}</td>
                                <td>{{ $donation->price ?? '' }}</td>
                                <td>{{ $donation->app ?? '' }}</td>
                                <td>{{ $donation->updated_at->diffForHumans() }}</td>
                                <td>
                                    <form class="delete-form" action="{{ route('admin.donations.destroy', $donation->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_donation mr-2" id=""
                                            data-type="confirm" type="submit" title="Delete"><i class="fa fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $donations->links() }}
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
        $('.delete_donation').click(function(e) {
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
