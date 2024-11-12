@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Lost Items</h1>
    @if ($items->isEmpty())
        <p>No lost items available.</p>
    @else
        <div class="row">
            @foreach ($items as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 {{ $item->highlighted ? 'border border-warning' : '' }}">
                        @if($item->image_url)
                            <img src="{{ asset($item->image_url) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                        @else
                            <img src="{{ asset('images/default-image.png') }}" class="card-img-top" alt="No image available" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('items.lost', $item->id) }}">{{ $item->title }}</a>
                            </h5>
                            <p class="card-text">{{ Str::limit($item->description, 100) }}</p>
                            <p><strong>Location:</strong> {{ $item->location }}</p>
                            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($item->date)->format('M d, Y') }}</p>
                            <p><strong>Category:</strong> {{ $item->category->name }}</p>
                            @if($item->subcategory)
                                <p><strong>Subcategory:</strong> {{ $item->subcategory->name }}</p>
                            @endif
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Views: {{ $item->views }}</small>
                            <br>
                            <small class="text-muted">Highlighted: {{ $item->highlighted ? 'Yes' : 'No' }}</small>
                            <br>
                            <small class="text-muted">Claimed: {{ $item->is_claimed ? 'Yes' : 'No' }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
