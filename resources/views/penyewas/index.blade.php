@extends('layouts.app')

@section('title')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Penyewa</h1>

    </div>
    <hr />

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <table class="table table-hover" id="renterTable">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Number phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($penyewas->count() > 0)
                @php
                $counter = 1; // Initialize counter
                @endphp
                @foreach($penyewas as $penyewas)
                    <tr>
                        <td class="align-middle">{{ $counter++ }}</td> <!-- Increment counter -->
                        <td class="align-middle">{{ $penyewas->name }}</td>
                        <td class="align-middle">{{ $penyewas->email }}</td>
                        <td class="align-middle">{{ $penyewas->phone }}</td>
                        <td class="align-middle">{{ $penyewas->address }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('penyewas.show', $penyewas->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                {{-- <a href="{{ route('penyewas.edit', $penyewas->id)}}" type="button" class="btn btn-warning">Edit</a> --}}
                                <form action="{{ route('penyewas.destroy', $penyewas->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="6">Renter not found</td>
                </tr>
            @endif
        </tbody>

    </table>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#renterTable').DataTable({
            "pageLength": 5
        });
    });
</script>
@endpush
