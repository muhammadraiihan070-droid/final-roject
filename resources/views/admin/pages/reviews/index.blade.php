@extends('admin.master')

@section('content')
<div class="container">
    <h3>Data Reviews</h3>

   

    {{-- notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Reviewable ID</th>
                <th>Reviewer</th>
                <th>Description</th>
                <th>Rating</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->reviewable_id }}</td>
                <td>{{ $review->reviewer }}</td>
                <td>{{ $review->description }}</td>
                <td>{{ $review->rating }}</td>
                <td>
                    {{-- tombol edit --}}
                    <a href="{{ route('admin.reviews.edit', $review->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    {{-- tombol delete --}}
                    <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Data tidak ada</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection