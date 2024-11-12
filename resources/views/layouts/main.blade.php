<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La2etlak - Lost and Found Platform</title>
    <!-- Bootstrap CSS (for styling and layout) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">La2etlak.com</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('items.lost') }}">Lost Items</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('items.found') }}">Found Items</a></li>
                
                <!-- Category Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('items.category', 'Electronics') }}">Electronics</a>
                        <a class="dropdown-item" href="{{ route('items.category', 'Clothing') }}">Clothing</a>
                        <a class="dropdown-item" href="{{ route('items.category', 'Accessories') }}">Accessories</a>
                        <a class="dropdown-item" href="{{ route('items.category', 'Documents') }}">Documents</a>
                        <a class="dropdown-item" href="{{ route('items.category', 'Jewelry') }}">Jewelry</a>
                        <a class="dropdown-item" href="{{ route('items.category', 'Keys') }}">Keys</a>
                        <a class="dropdown-item" href="{{ route('items.category', 'Bags') }}">Bags</a>
                        <a class="dropdown-item" href="{{ route('items.category', 'Footwear') }}">Footwear</a>
                        <a class="dropdown-item" href="{{ route('items.category', 'Toys') }}">Toys</a>
                        <a class="dropdown-item" href="{{ route('items.category', 'Books') }}">Books</a>
                        <a class="dropdown-item" href="{{ route('items.category', 'Medical') }}">Medical</a>
                        <a class="dropdown-item" href="{{ route('items.category', 'Personal Items') }}">Personal Items</a>
                        <a class="dropdown-item" href="{{ route('items.category', 'Sports Equipment') }}">Sports Equipment</a>
                        <a class="dropdown-item" href="{{ route('items.category', 'Stationery') }}">Stationery</a>
                        <a class="dropdown-item" href="{{ route('items.category', 'Household Items') }}">Household Items</a>
                        <a class="dropdown-item" href="{{ route('items.category', 'Tools') }}">Tools</a>
                        <a class="dropdown-item" href="{{ route('items.category', 'Vehicles') }}">Vehicles</a>
                        <a class="dropdown-item" href="{{ route('items.category', 'Pet Items') }}">Pet Items</a>
                        <a class="dropdown-item" href="{{ route('items.category', 'Miscellaneous') }}">Miscellaneous</a>
                    </div>
                </li>

                @guest
                    <!-- Show Login and Register links if the user is not logged in -->
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @else
                    <!-- Show dropdown with user’s name if logged in -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="dropdown-item">Log Out</button>
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    <!-- Main Content Section -->
    <div class="container mt-5">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5">
        <p>&copy; 2024 La2etlak.com All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
