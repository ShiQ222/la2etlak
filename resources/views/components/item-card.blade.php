<div class="item-card" style="border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); overflow: hidden; background-color: #fff; max-width: 300px;">
    <img src="{{ $image }}" alt="Item Image" class="item-card-img" style="width: 100%; height: 150px; object-fit: cover;">
    <div class="card-body" style="padding: 15px;">
        <h5 class="card-title" style="font-size: 1.2rem; font-weight: bold; margin-bottom: 10px;">{{ $title }}</h5>
        
        <p class="card-meta" style="font-size: 0.9rem; color: #555; margin: 5px 0;">
            <span style="font-weight: bold;">Location:</span> {{ $location }}
        </p>

        <p class="card-meta" style="font-size: 0.9rem; color: #555; margin: 5px 0;">
            <span style="font-weight: bold;">Category:</span> {{ $category }}
        </p>

        <p class="card-meta" style="font-size: 0.9rem; color: #555; margin: 5px 0;">
            <span style="font-weight: bold;">Subcategory:</span> {{ $subcategory }}
        </p>

        <p class="card-meta" style="font-size: 0.9rem; color: #555; margin: 5px 0;">
            <span style="font-weight: bold;">Status:</span> {{ $status }}
        </p>

        <p class="card-meta" style="font-size: 0.9rem; color: #555; margin: 5px 0;">
            <span style="font-weight: bold;">Date:</span> {{ $date }}
        </p>

        <a href="{{ $link }}" class="btn btn-primary" style="display: block; margin-top: 10px; background-color: #007bff; color: white; padding: 8px 12px; text-align: center; border-radius: 5px; text-decoration: none;">
            View Details
        </a>
    </div>
</div>
