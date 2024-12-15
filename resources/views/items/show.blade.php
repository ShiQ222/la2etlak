@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="item-card" style="border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); overflow: hidden; background-color: #fff; max-width: 600px; margin: auto;">
        <img src="{{ $item->image_url }}" alt="Item Image" style="width: 100%; height: 300px; object-fit: cover;">
        <div class="card-body" style="padding: 15px;">
            <h1 class="card-title" style="font-size: 1.5rem; font-weight: bold; margin-bottom: 20px;">{{ $item->title }}</h1>
            <p><strong>Location:</strong> {{ $item->location ?? 'N/A' }}</p>
            <p><strong>Date:</strong> {{ $item->created_at->format('Y-m-d') }}</p>
            <p><strong>Status:</strong> {{ ucfirst($item->status) }}</p>
            <p><strong>Category:</strong> {{ $item->category->name ?? 'N/A' }}</p>
            @if($item->subcategory)
                <p><strong>Subcategory:</strong> {{ $item->subcategory->name }}</p>
            @endif
            <p style="margin-top: 20px;">{{ $item->description }}</p>
        </div>
    </div>
</div>
@endsection
