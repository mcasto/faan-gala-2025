@extends('layouts.app')

@section('title', 'Create Auction Item')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h2 class="text-2xl font-semibold">Create New Auction Item</h2>
                    </div>

                    <form action="{{ route('admin.auction-items.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Donor Information -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Donor Information</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="donor_name"
                                        class="block text-gray-700 text-sm font-bold mb-2">Organization/Company Name</label>
                                    <input type="text" name="donor_name" id="donor_name"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('donor_name') border-red-500 @enderror"
                                        value="{{ old('donor_name') }}" required>
                                    @error('donor_name')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="individual_name" class="block text-gray-700 text-sm font-bold mb-2">Contact
                                        Person Name</label>
                                    <input type="text" name="individual_name" id="individual_name"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('individual_name') border-red-500 @enderror"
                                        value="{{ old('individual_name') }}" required>
                                    @error('individual_name')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
                                        value="{{ old('email') }}" required>
                                    @error('email')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone</label>
                                    <input type="tel" name="phone" id="phone"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('phone') border-red-500 @enderror"
                                        value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address</label>
                                    <input type="text" name="address" id="address"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('address') border-red-500 @enderror"
                                        value="{{ old('address') }}" required>
                                    @error('address')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="address_2" class="block text-gray-700 text-sm font-bold mb-2">Address Line
                                        2</label>
                                    <input type="text" name="address_2" id="address_2"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('address_2') border-red-500 @enderror"
                                        value="{{ old('address_2') }}">
                                    @error('address_2')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Item Information -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Item Information</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="item_name" class="block text-gray-700 text-sm font-bold mb-2">Item
                                        Name</label>
                                    <input type="text" name="item_name" id="item_name"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('item_name') border-red-500 @enderror"
                                        value="{{ old('item_name') }}" required>
                                    @error('item_name')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="item_value" class="block text-gray-700 text-sm font-bold mb-2">Item Value
                                        ($)</label>
                                    <input type="number" name="item_value" id="item_value" step="0.01" min="0"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('item_value') border-red-500 @enderror"
                                        value="{{ old('item_value') }}">
                                    @error('item_value')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-2">
                                    <label for="description"
                                        class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                                    <textarea name="description" id="description" rows="4"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-2">
                                    <label for="terms_and_conditions"
                                        class="block text-gray-700 text-sm font-bold mb-2">Terms and Conditions</label>
                                    <textarea name="terms_and_conditions" id="terms_and_conditions" rows="4"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('terms_and_conditions') border-red-500 @enderror">{{ old('terms_and_conditions') }}</textarea>
                                    @error('terms_and_conditions')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-2">
                                    <label for="item_image_path" class="block text-gray-700 text-sm font-bold mb-2">Item
                                        Image</label>
                                    <input type="file" name="item_image_path" id="item_image_path"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('item_image_path') border-red-500 @enderror"
                                        accept="image/*">
                                    @error('item_image_path')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="item_received_date"
                                        class="block text-gray-700 text-sm font-bold mb-2">Date Received</label>
                                    <input type="date" name="item_received_date" id="item_received_date"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('item_received_date') border-red-500 @enderror"
                                        value="{{ old('item_received_date') }}">
                                    @error('item_received_date')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="item_received_time"
                                        class="block text-gray-700 text-sm font-bold mb-2">Time Received</label>
                                    <input type="time" name="item_received_time" id="item_received_time"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('item_received_time') border-red-500 @enderror"
                                        value="{{ old('item_received_time') }}">
                                    @error('item_received_time')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- FAAN Volunteer Information -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">FAAN Volunteer Information</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="faan_volunteer" class="block text-gray-700 text-sm font-bold mb-2">FAAN
                                        Volunteer Name</label>
                                    <input type="text" name="faan_volunteer" id="faan_volunteer"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('faan_volunteer') border-red-500 @enderror"
                                        value="{{ old('faan_volunteer') }}">
                                    @error('faan_volunteer')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="volunteer_email"
                                        class="block text-gray-700 text-sm font-bold mb-2">Volunteer Email</label>
                                    <input type="email" name="volunteer_email" id="volunteer_email"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('volunteer_email') border-red-500 @enderror"
                                        value="{{ old('volunteer_email') }}">
                                    @error('volunteer_email')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Admin Notes -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Admin Notes</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="status_id" class="block text-gray-700 text-sm font-bold mb-2">Item
                                        Status</label>
                                    <select name="status_id" id="status_id"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('status_id') border-red-500 @enderror">
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}"
                                                {{ old('status_id', 1) == $status->id ? 'selected' : '' }}>
                                                {{ $status->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status_id')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label for="admin_notes"
                                        class="block text-gray-700 text-sm font-bold mb-2">Notes</label>
                                    <textarea name="admin_notes" id="admin_notes" rows="4"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('admin_notes') border-red-500 @enderror">{{ old('admin_notes') }}</textarea>
                                    @error('admin_notes')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-8">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Create Auction Item
                            </button>
                            <a href="{{ route('admin.auction-items.index') }}"
                                class="text-gray-600 hover:text-gray-800">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
