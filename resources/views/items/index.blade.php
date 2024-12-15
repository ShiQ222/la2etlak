@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>All Items</h1>
    <div class="row" style="display: flex; flex-wrap: wrap; gap: 20px;">
        @foreach($items as $item)
            <x-item-card 
                :title="$item->title"
                :description="$item->description"
                :image="$item->image_url"
                :location="$item->location"
                :category="$item->category->name ?? 'N/A'"
                :subcategory="$item->subcategory->name ?? 'N/A'"
                :status="$item->status"
                :date="$item->created_at->format('Y-m-d')"
                :link="route('items.show', $item->id)" />
        @endforeach
    </div>
</div>
@endsection
