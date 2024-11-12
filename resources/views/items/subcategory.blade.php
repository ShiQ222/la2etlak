<!-- resources/views/items/subcategory.blade.php -->

<h1>Items in {{ $category->name }} > {{ $subcategory->name }}</h1>

@if($items->isEmpty())
    <p>No items available in this subcategory.</p>
@else
    <ul>
        @foreach($items as $item)
            <li>
                <h2>{{ $item->title }}</h2>
                <p>{{ $item->description }}</p>
                <p>Location: {{ $item->location }}</p>
                <p>Status: {{ ucfirst($item->status) }}</p>
            </li>
        @endforeach
    </ul>
@endif
