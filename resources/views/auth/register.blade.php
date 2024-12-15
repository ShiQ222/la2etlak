<x-guest-layout>
    <div class="container mx-auto px-4">
        <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold text-center mb-4">{{ __('Create an Account') }}</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
<script src="{{ asset('js/register.js') }}" defer></script>

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                    <input 
                        id="name" 
                        type="text" 
                        name="name" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                        value="{{ old('name') }}" 
                        required 
                        autofocus>
                    @error('name')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                        value="{{ old('email') }}" 
                        required>
                    @error('email')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Phone Number -->
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">{{ __('Phone Number') }}</label>
                    <input 
                        id="phone" 
                        type="text" 
                        name="phone" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                        value="{{ old('phone') }}" 
                        required 
                        maxlength="15" 
                        pattern="\d*" 
                        title="Please enter a valid phone number (digits only)">
                    @error('phone')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Address -->
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">{{ __('Address') }}</label>
                    <input 
                        id="address" 
                        type="text" 
                        name="address" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                        value="{{ old('address') }}" 
                        required>
                    @error('address')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Date of Birth -->
<div class="mb-4">
    <label for="dob" class="block text-sm font-medium text-gray-700">{{ __('Date of Birth') }}</label>
    <div class="mt-1 flex space-x-2">
        <!-- Day -->
        <select name="dob_day" id="dob_day" class="flex-initial w-20 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            <option value="">{{ __('Day') }}</option>
            @for ($i = 1; $i <= 31; $i++)
                <option value="{{ $i }}" {{ old('dob_day') == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>

        <!-- Month -->
        <select name="dob_month" id="dob_month" class="flex-grow rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            <option value="">{{ __('Month') }}</option>
            @for ($i = 1; $i <= 12; $i++)
                <option value="{{ $i }}" {{ old('dob_month') == $i ? 'selected' : '' }}>
                    {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                </option>
            @endfor
        </select>

        <!-- Year -->
        <select name="dob_year" id="dob_year" class="flex-initial w-24 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            <option value="">{{ __('Year') }}</option>
            @for ($i = date('Y'); $i >= date('Y') - 100; $i--)
                <option value="{{ $i }}" {{ old('dob_year') == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>
    </div>
    @error('dob')
        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
    @enderror
</div>


                <!-- Country -->
                <div class="mb-4">
                    <label for="country" class="block text-sm font-medium text-gray-700">{{ __('Country') }}</label>
                    <select 
                        id="country" 
                        name="country" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                        required>
                        <option value="" disabled selected>{{ __('Select your country') }}</option>
                        @foreach ($countries as $code => $name)
                            <option value="{{ $name }}" {{ old('country') == $name ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                    @error('country')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                        required>
                    @error('password')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
                    <input 
                        id="password_confirmation" 
                        type="password" 
                        name="password_confirmation" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                        required>
                    @error('password_confirmation')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Terms and Conditions -->
<div class="mb-4">
    <label class="flex items-center">
        <input 
            type="checkbox" 
            name="terms" 
            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring focus:ring-indigo-500 focus:ring-opacity-50" 
            required>
        <span class="ml-2 text-sm text-gray-600">
            {{ __('I agree to the') }}
            <a href="javascript:void(0);" class="text-indigo-600 hover:text-indigo-900" onclick="loadTerms('termsModal')">
                {{ __('Terms and Conditions') }}
            </a>
        </span>
    </label>
    @error('terms')
        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
    @enderror
</div>

<!-- Terms and Conditions Modal -->
<div id="termsModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg overflow-hidden shadow-xl max-w-lg w-full">
        <!-- Modal Header -->
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-medium text-gray-900">{{ __('Terms and Conditions') }}</h3>
            <button onclick="closeModal('termsModal')" class="text-gray-600 hover:text-gray-900">
                &times;
            </button>
        </div>
        <!-- Modal Body -->
        <div class="px-6 py-4 max-h-96 overflow-y-auto" id="termsContent">
            <!-- Content will be loaded dynamically -->
            <p>{{ __('Loading...') }}</p>
        </div>
        <!-- Modal Footer -->
        <div class="px-6 py-4 border-t border-gray-200 flex justify-end">
            <button onclick="closeModal('termsModal')" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 focus:outline-none">
                {{ __('Close') }}
            </button>
        </div>
    </div>
</div>

				
				  <!-- Social Login Buttons -->
                <div class="flex justify-center mt-6 space-x-4">
                    <!-- Google Login -->
                    <a href="{{ route('social.redirect', ['provider' => 'google']) }}" class="flex items-center px-4 py-2 bg-red-500 text-white rounded shadow hover:bg-red-600">
                        <img src="/images/google-icon.svg" alt="Google" class="h-5 w-5 mr-2">
                        {{ __('Login with Google') }}
                    </a>

                    <!-- Facebook Login -->
                    <a href="{{ route('social.redirect', ['provider' => 'facebook']) }}" class="flex items-center px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700">
                        <img src="/images/facebook-icon.svg" alt="Facebook" class="h-5 w-5 mr-2">
                        {{ __('Login with Facebook') }}
                    </a>
                </div>

                <!-- Register Button -->
                <div class="mt-6">
                    <button 
                        type="submit" 
                        class="w-full px-4 py-2 bg-indigo-500 text-white rounded shadow hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
