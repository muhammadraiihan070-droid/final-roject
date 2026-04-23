@extends('admin.master')

@section('content')

<h1>Create Attractions</h1>
<hr>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.attractions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        @error('description')
            <div class="text-danger">{{ $message }}</div>
        @enderror

    </div>
    <div class="mb-3">
        <label for="price_range" class="form-label">Ticket Price</label>
        <input type="text" class="form-control" id="ticket_price" name="ticket_price" required>
        @error('ticket_price')
            <div class="text-danger">{{ $message }}</div>   
        @enderror
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image" required>
        @error('image')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Create Attractions</button>
</form>

@endsection