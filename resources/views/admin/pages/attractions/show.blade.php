@extends('admin.master')

@section('content')

<h1>Attractions Details</h1>
    <hr>

    @if($attraction)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Name: {{ $attraction->name }}
                </h5>

                <p class="card-text">
                    <strong>Ticket Price:</strong>
                    {{ $attraction->ticket_price ?? '-' }}
                </p>

                <p class="card-text">
                    <strong>Description:</strong><br>
                    {{ $attraction->description ?? 'No description' }}
                </p>

                @if(!empty($attraction->image))
                    <div class="mt-3">
                        <strong>Image:</strong><br>
                        <img src="{{ asset('storage/images/' . $attraction->image) }}" alt="{{ $attraction->name }}" width="150">                </div>

                    </div>
                @endif
            </div>

            <div class="card-footer">
                <a href="{{ route('admin.attractions.edit', $attraction->id) }}" class="btn btn-warning">
                    Edit
                </a>
                <a href="{{ route('admin.attractions.index') }}" class="btn btn-secondary">
                    Back to List
                </a>
            </div>
        </div>

        {{-- <div class="mt-4">
            <h3>Attractions in this Attraction</h3>
            <hr>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Ticket Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($attraction-attractions as $attraction)
                        <tr>
                            <td>{{ $attraction->name }}</td>

                            <td>
                                @if($attraction->price)
                                    Rp {{ number_format($attraction->price, 0, ',', '.') }}
                                @else
                                    -
                                @endif
                            </td>

                            <td>
                                @if(!empty($attraction->image))
                                    <img src="{{ asset('storage/' . $attraction->image) }}"
                                         alt="{{ $attraction->name }}"
                                         width="80">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('admin.attractions.show', $attraction->id) }}"
                                   class="btn btn-sm btn-info">
                                    View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                Belum ada wisata di zona ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div> --}}
    @else
        <div class="alert alert-danger">
            Data attraction tidak ditemukan.
        </div>
    @endif

@endsection