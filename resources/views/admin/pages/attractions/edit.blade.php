@extends('admin.master')

@section('content')

<h1>Edit Attraction</h1>
    <hr>
    <form action="{{ route('admin.attractions.update', $attraction) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $attraction->name) }}" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $attraction->description) }}</textarea>
            @error('description') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="ticket_price" class="form-label">Ticket Price</label>
            <input type="text" class="form-control" id="ticket_price" name="ticket_price" value="{{ old('ticket_price', $attraction->ticket_price) }}" required>
            @error('ticket_price') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image (Leave empty to keep current image)</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($attraction->image)
                <div class="mt-2">
<img src="{{ asset('storage/images/' . $attraction->image) }}" alt="{{ $attraction->name }}" width="150">                </div>
                </div>
            @endif
            @error('image') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Attraction</button>
        <a href="{{ route('admin.attractions.index') }}" class="btn btn-secondary">Back</a>
    </form>

@endsection