@component('components.master')
<div class="container mx-auto flex justify-center">
    <div class="px-12 py-6 bg-gray-200 rounded-lg">
        <div class="col-md-8">
            <div class="font-bold text-lg mb-2">{{ _('Register') }}</div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="name"
                    >
                        Name
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
                        required
                    >

                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="address"
                    >
                        Address
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="address"
                        id="address"
                        value="{{ old('address') }}"
                        required
                    >

                    @error('address')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="city"
                    >
                        City
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="city"
                        id="city"
                        value="{{ old('city') }}"
                        required
                    >

                    @error('city')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="postalCode"
                    >
                        Postal Code/Zip
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="postalCode"
                        id="postalCode"
                        value="{{ old('postalCode') }}"
                        required
                    >

                    @error('postalCode')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="province"
                    >
                        Province
                    </label>

                    
                    <select class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="province"
                        id="province"
                        value="{{ old('province') }}"
                        required>
                    <option value="Ontario">Ontario</option>
                    <option value="Alberta">Alberta</option>
                    <option value="British Columbia">British Columbia</option>
                    <option value="Manitoba">Manitoba</option>
                    <option value="New Brunswick">New Brunswick</option>
                    <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                    <option value="Northwest Territories">Northwest Territories</option>
                    <option value="Nova Scotia">Nova Scotia</option>
                    <option value="Nunavut">Nunavut</option>
                    <option value="Prince Edward Island">Prince Edward Island</option>
                    <option value="Quebec">Quebec</option>
                    <option value="Saskatchewan">Saskatchewan</option>
                    <option value="Yukon">Yukon</option>

                    </select>

                    @error('province')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="phone"
                    >
                        Phone Number
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="phone"
                        id="phone"
                        value="{{ old('phone') }}"
                        required
                    >

                    @error('phone')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="email"
                    >
                        Email
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required
                    >

                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="password"
                    >
                        Password
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                        type="password"
                        name="password"
                        id="password"
                        autocomplete="new-password"
                    >

                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="password_confirmation"
                    >
                        Password Confirmation
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        autocomplete="new-password"
                    >

                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                        Register
                    </button>
                </div>
            </form>
        </div>
        <br>
        <b><a href="{{ route('login') }}" class="text-xs text-gray-700">Already have an account? Login here</a></b>
    </div>
</div>
@endcomponent
