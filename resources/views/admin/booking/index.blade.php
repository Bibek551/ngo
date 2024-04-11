@extends('layouts.admin.master')
@section('title', 'Bookings')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Booking Persons ({{ $bookings->total() }})</h5>
        </div>

        <div class="table-responsive text-nowrap">
            @if ($bookings->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Country</th>
                            <th>Address</th>
                            <th>Pax</th>
                            <th>Url</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($bookings as $key => $booking)
                            <tr>
                                <td><strong>{{ $key + $bookings->firstItem() }}</strong></td>

                                <td><strong>{{ $booking->full_name ?? '' }}</strong></td>
                                <td>{{ $booking->email ?? '' }}</td>
                                <td>{{ $booking->phone ?? '' }}</td>
                                <td>{{ $booking->date ?? '' }}</td>
                                <td>{{ $booking->country ?? '' }}</td>
                                <td>{{ $booking->address ?? '' }}</td>
                                <td>{{ $booking->pax ?? '' }}</td>
                                <td><a class="btn btn-sm btn-primary" href="{{ $booking->url ?? '' }}" target="_blank">View</a>
                                </td>
                                <td style="white-space: break-spaces;">{{ $booking->message ?? '' }}</td>
                                <td>
                                    <form class="delete-form" action="{{ route('admin.bookings.destroy', $booking->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_booking mr-2" id=""
                                            data-type="confirm" type="submit" title="Delete"><i class="fa fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $bookings->links() }}
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
        $('.delete_booking').click(function(e) {
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
