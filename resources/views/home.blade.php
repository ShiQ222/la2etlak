@extends('layouts.main')

@section('content')
    <div class="jumbotron text-center">
        <h1>Welcome to La2etlak.com</h1>
        <p>Your go-to platform for lost and found items in Egypt.</p>
        <a href="/report-lost" class="btn btn-primary">Report Lost Item</a>
        <a href="/report-found" class="btn btn-secondary">Report Found Item</a>
    </div>

    <!-- Search Bar Section -->
    <div class="search-bar mt-4 mb-4">
        <form action="/search" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" name="query" placeholder="Search for lost or found items...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Placeholder for Featured Posts -->
    <h3>Featured Posts</h3>
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Lost iPhone</h5>
                    <p class="card-text">Lost at Cairo Airport on 2024-10-01</p>
                    <a href="/items/1" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Found Wallet</h5>
                    <p class="card-text">Found near Tahrir Square on 2024-10-05</p>
                    <a href="/items/2" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
    </div>

    <!-- How It Works Section -->
    <h3>How It Works</h3>
    <p>La2etlak allows you to post items you've lost or found, search for reported items, and reconnect with your belongings or help others do the same.</p>
@endsection
