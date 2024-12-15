<nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="shrink-0">
                <a href="{{ url('/') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden sm:flex space-x-8">
                <!-- Home -->
                <a href="{{ url('/') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">{{ __('Home') }}</a>
                
                <!-- All Items -->
                <a href="{{ route('items.index') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">{{ __('All Items') }}</a>

                <!-- Lost Items -->
                <a href="{{ route('items.lost') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">{{ __('Lost Items') }}</a>

                <!-- Found Items -->
                <a href="{{ route('items.found') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">{{ __('Found Items') }}</a>

                <!-- Categories Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <!-- Trigger Button -->
                    <button @click="open = !open" class="flex items-center text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                        {{ __('Categories') }}
                        <svg class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <ul x-show="open" @click.outside="open = false" class="absolute left-0 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-md shadow-lg mt-2 w-48 z-50">
                        @foreach($categories as $category)
                            <li x-data="{ subOpen: false }" class="relative">
                                <!-- Category Link -->
                                <button @click="subOpen = !subOpen" class="flex justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <span>{{ $category->name }}</span>
                                    @if($category->subcategories->isNotEmpty())
                                        <!-- Right Arrow for Subcategories -->
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    @endif
                                </button>

                                <!-- Subcategories Dropdown -->
                                @if($category->subcategories->isNotEmpty())
                                    <ul x-show="subOpen" @click.outside="subOpen = false" class="absolute left-full top-0 bg-white dark:bg-gray-800 rounded-md shadow-lg w-48 z-50">
                                        @foreach($category->subcategories as $subcategory)
                                            <li>
                                                <a href="{{ route('items.subcategory', ['category' => $category->name, 'subcategory' => $subcategory->name]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                    {{ $subcategory->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- User Authentication Links -->
            <div>
                @if(Auth::check())
                    <a href="{{ route('logout') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                        {{ __('Logout') }}
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}" class="ml-4 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">{{ __('Register') }}</a>
                @endif
            </div>
        </div>
    </div>
</nav>
