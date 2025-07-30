{{-- Donor Information Section --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <fieldset class="p-2">
        <legend>{{ __('auction-palooza.donor_info') }}</legend>
        <input type="text" name="donor_name" placeholder="{{ __('auction-palooza.donor_placeholder') }}" required
            value="{{ old('donor_name') }}"
            class="w-full p-2 mb-4 border border-gray-300 rounded @error('donor_name') border-red-500 @enderror" />
        @error('donor_name')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </fieldset>

    <fieldset class="p-2">
        <legend>{{ __('auction-palooza.contact_name') }}</legend>
        <input type="text" name="individual_name" placeholder="{{ __('auction-palooza.individual_placeholder') }}"
            required value="{{ old('individual_name') }}"
            class="w-full p-2 mb-4 border border-gray-300 rounded @error('individual_name') border-red-500 @enderror" />
        @error('individual_name')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </fieldset>

    <fieldset class="p-2">
        <legend>{{ __('auction-palooza.email') }}</legend>
        <input type="email" name="email" placeholder="{{ __('auction-palooza.email_placeholder') }}" required
            value="{{ old('email') }}"
            class="w-full p-2 mb-4 border border-gray-300 rounded @error('email') border-red-500 @enderror" />
        @error('email')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </fieldset>

    <fieldset class="p-2">
        <legend>{{ __('auction-palooza.phone') }}</legend>
        <input type="tel" name="phone" placeholder="{{ __('auction-palooza.phone_placeholder') }}" required
            pattern="[0-9]{3}-?[0-9]{3}-?[0-9]{4}" value="{{ old('phone') }}"
            class="w-full p-2 mb-4 border border-gray-300 rounded @error('phone') border-red-500 @enderror" />
        @error('phone')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </fieldset>

    <fieldset class="p-2">
        <legend>{{ __('auction-palooza.address') }}</legend>
        <input type="text" name="address" placeholder="{{ __('auction-palooza.address_placeholder') }}" required
            value="{{ old('address') }}"
            class="w-full p-2 mb-4 border border-gray-300 rounded @error('address') border-red-500 @enderror" />
        @error('address')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </fieldset>

    <fieldset class="p-2">
        <legend>{{ __('auction-palooza.address_2') }}</legend>
        <input type="text" name="address_2" placeholder="{{ __('auction-palooza.address_2_placeholder') }}"
            value="{{ old('address_2') }}"
            class="w-full p-2 mb-4 border border-gray-300 rounded @error('address_2') border-red-500 @enderror" />
        @error('address_2')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </fieldset>
</div>

{{-- Item Information Section --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
    <fieldset class="p-2">
        <legend>{{ __('auction-palooza.item_name') }}</legend>
        <input type="text" name="item_name" placeholder="{{ __('auction-palooza.item_name_placeholder') }}" required
            value="{{ old('item_name') }}"
            class="w-full p-2 mb-4 border border-gray-300 rounded @error('item_name') border-red-500 @enderror" />
        @error('item_name')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </fieldset>

    <fieldset class="p-2">
        <legend>{{ __('auction-palooza.item_value') }}</legend>
        <input type="number" name="item_value" step="0.01"
            placeholder="{{ __('auction-palooza.item_value_placeholder') }}" value="{{ old('item_value') }}"
            class="w-full p-2 mb-4 border border-gray-300 rounded @error('item_value') border-red-500 @enderror" />
        @error('item_value')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </fieldset>

    <fieldset class="p-2 md:col-span-2 lg:col-span-1">
        <legend>{{ __('auction-palooza.item_image') }}</legend>
        <input type="file" name="item_image" accept="image/*"
            class="w-full p-2 mb-4 border border-gray-300 rounded @error('item_image') border-red-500 @enderror" />
        @error('item_image')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </fieldset>
</div>

{{-- Description and Terms Section --}}
<div class="grid grid-cols-1 gap-4 mt-4">
    <fieldset class="p-2">
        <legend>{{ __('auction-palooza.description') }}</legend>
        <textarea name="description" rows="4" placeholder="{{ __('auction-palooza.description_placeholder') }}"
            class="w-full p-2 mb-4 border border-gray-300 rounded @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
        @error('description')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </fieldset>

    <fieldset class="p-2">
        <legend>{{ __('auction-palooza.terms') }}</legend>
        <textarea name="terms" rows="4" placeholder="{{ __('auction-palooza.terms_placeholder') }}"
            class="w-full p-2 mb-4 border border-gray-300 rounded @error('terms') border-red-500 @enderror">{{ old('terms') }}</textarea>
        @error('terms')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </fieldset>
</div>

<div class="flex justify-end mt-6 p-2">
    <button type="submit"
        class="px-4 py-2 rounded bg-yellow-500 text-slate-800 font-semibold hover:bg-yellow-600 hover:text-white transition">
        {{ __('auction-palooza.submit_button') }}
    </button>
</div>
