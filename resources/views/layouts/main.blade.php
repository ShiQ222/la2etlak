@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Welcome to La2etlak</h1>
    <p>La2etlak is your trusted Lost and Found Platform, connecting people with their lost belongings.</p>

    <!-- Features Section -->
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Report Lost Items</h5>
                    <p class="card-text">Easily report lost items with detailed descriptions and images.</p>
                    <a href="{{ route('items.lost') }}" class="btn btn-primary">View Lost Items</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Report Found Items</h5>
                    <p class="card-text">Help others by reporting items you’ve found.</p>
                    <a href="{{ route('items.found') }}" class="btn btn-primary">View Found Items</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Browse Categories</h5>
                    <p class="card-text">Explore items by category and find what you need.</p>
                    <a href="#" class="btn btn-primary">Browse Categories</a>
                </div>
            </div>
        </div>
    </div>

    <!-- How It Works Section -->
    <div class="mt-5">
        <h2>How It Works</h2>
        <p>Follow these simple steps to find or report lost items:</p>
        <ol>
            <li><strong>Register or Log In:</strong> Create an account to get started.</li>
            <li><strong>Report Items:</strong> Provide detailed information about lost or found items.</li>
            <li><strong>Connect:</strong> Use our platform to connect with the item owner or finder.</li>
        </ol>
    </div>

    <!-- Testimonials Section -->
    <div class="mt-5">
        <h2>What People Say</h2>
        <p>See how La2etlak has helped others:</p>
        <blockquote class="blockquote">
            <p class="mb-0">"Thanks to La2etlak, I found my lost wallet within a day!"</p>
            <footer class="blockquote-footer">Ahmed, Cairo</footer>
        </blockquote>
        <blockquote class="blockquote">
            <p class="mb-0">"This platform is amazing. Someone returned my missing pet safely."</p>
            <footer class="blockquote-footer">Fatma, Alexandria</footer>
        </blockquote>
    </div>

    <!-- Call to Action -->
    <div class="text-center mt-5">
        <a href="{{ route('register') }}" class="btn btn-lg btn-success">Get Started Now</a>
    </div>
</div>
@endsection
