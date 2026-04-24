@extends('admin.master')

@section('content')
    <h1>Zone Details</h1>
    <hr>

    @if($zone)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Name: {{ $zone->name }}
                </h5>

                <p class="card-text">
                    <strong>Price Range:</strong>
                    {{ $zone->price_range ?? '-' }}
                </p>

                <p class="card-text">
                    <strong>Description:</strong><br>
                    {{ $zone->description ?? 'No description' }}
                </p>

                @if(!empty($zone->image))
                    <div class="mt-3">
                        <strong>Image:</strong><br>
                       <img src="{{ asset('storage/images/' . $zone->image) }}" alt="{{ $zone->name }}" width="150">                </div>

                    </div>
                @endif
            </div>

            <div class="card-footer">
                <a href="{{ route('admin.zones.edit', $zone->id) }}" class="btn btn-warning">
                    Edit
                </a>
                <a href="{{ route('admin.zones.index') }}" class="btn btn-secondary">
                    Back to List
                </a>
            </div>
        </div>

        {{-- <div class="mt-4">
            <h3>Attractions in this Zone</h3>
            <hr>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($zone->attractions as $attraction)
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
            Data zone tidak ditemukan.
        </div>
    @endif
@endsection