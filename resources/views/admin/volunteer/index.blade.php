@extends('layouts.admin.master')
@section('title', 'Volunteer')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Volunteers ({{ $volunteers->total() }})</h5>
        </div>

        <div class="table-responsive text-nowrap">
            @if ($volunteers->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>DOB</th>
                            <th>Blood-Group</th>
                            <th>Education</th>
                            <th>Nationality</th>
                            <th>Gender</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($volunteers as $key => $volunteer)
                            <tr>
                                <td><strong>{{ $key + $volunteers->firstItem() }}</strong></td>

                                <td><strong>{{ $volunteer->fname ?? '' }}</strong></td>
                                <td><strong>{{ $volunteer->lname ?? '' }}</strong></td>
                                <td>{{ $volunteer->email ?? '' }}</td>
                                <td>{{ $volunteer->phone ?? '' }}</td>
                                <td>{{ $volunteer->date ?? '' }}</td>
                                <td>{{ $volunteer->bloodgroup ?? '' }}</td>
                                <td>{{ $volunteer->education ?? '' }}</td>
                                <td>{{ $volunteer->nationality ?? '' }}</td>
                                <td>{{ $volunteer->gender ?? '' }}</td>
                                <td>{{ $volunteer->updated_at->diffForHumans() }}</td>
                                <td>
                                    <form class="delete-form"
                                        action="{{ route('admin.volunteers.destroy', $volunteer->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_volunteer mr-2" id=""
                                            data-type="confirm" type="submit" title="Delete"><i class="fa fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $volunteers->links() }}
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
        $('.delete_volunteer').click(function(e) {
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
