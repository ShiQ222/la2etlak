<!-- resources/views/items/category.blade.php -->

<h1>Items in {{ $category->name }}</h1>

@if($items->isEmpty())
    <p>No items available in this category.</p>
@else
    <ul>
        @foreach($items as $item)
            <li>
                <h2>{{ $item->title }}</h2>
                <p>{{ $item->description }}</p>
                <p>Location: {{ $item->location }}</p>
                <p>Status: {{ ucfirst($item->status) }}</p>
                @if($item->subcategory)
                    <p>Subcategory: {{ $item->subcategory->name }}</p>
                @endif
            </li>
        @endforeach
    </ul>
@endif
