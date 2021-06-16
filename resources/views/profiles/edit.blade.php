@component('components.app')
@if(session()->has('message'))
    <div class="alert alert-success font-bold color:green" >
        {{ session()->get('message') }}
    </div>
@endif
<form method="POST" action="{{ route('profiles.update',auth()->user()->username)}}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

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
            value="{{ $user->address }}"
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
            value="{{ $user->city }}"
            required
        >

        @error('city')
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
            value="{{ $user->province }}"
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
            for="postalCode"
        >
            Postal/Zip Code
        </label>

        <input class="border border-gray-400 p-2 w-full"
            type="text"
            name="postalCode"
            id="postalCode"
            value="{{ $user->postalCode }}"
            required
        >

        @error('postalCode')
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
            value="{{ $user->phone }}"
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
            value="{{ $user->email }}"
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
            required
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
            required
        >

        @error('password_confirmation')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <button type="submit"
                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4"
        >
            Submit
        </button>
        <a href="{{ route('home') }}"
                    class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500 mr-4"
            >
                Back To Home
        </a>

    </div>
</form>
@endcomponent