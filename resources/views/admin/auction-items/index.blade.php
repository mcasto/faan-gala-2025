@extends('layouts.app')

@section('title', 'Auction Items')

@push('styles')
    <style>
        .expandable-row {
            display: none;
        }

        .expandable-row.show {
            display: table-row;
        }

        .image-icon {
            width: 24px;
            height: 24px;
            cursor: zoom-in;
            color: #6B7280;
        }

        .image-icon:hover {
            color: #374151;
        }

        .expand-icon {
            cursor: pointer;
            transition: transform 0.2s ease;
            display: inline-block;
            width: 24px;
            height: 24px;
            margin-right: 8px;
            vertical-align: middle;
        }

        .expanded .expand-icon {
            transform: rotate(90deg);
        }

        .modal {
            visibility: hidden;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(17, 24, 39, 0.95);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.2s ease;
        }

        .modal.show {
            visibility: visible;
            opacity: 1;
        }

        .modal-content {
            position: relative;
            background: transparent;
            max-width: calc(100vw - 2rem);
            max-height: calc(100vh - 2rem);
            transform: scale(0.95);
            transition: transform 0.2s ease;
        }

        .modal.show .modal-content {
            transform: scale(1);
        }

        .modal-close {
            position: absolute;
            top: -2.5rem;
            right: -0.5rem;
            width: 2rem;
            height: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 9999px;
            opacity: 0.8;
            transition: all 0.2s ease;
        }

        .modal-close:hover {
            opacity: 1;
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.1);
        }

        #modalImage {
            display: block;
            max-width: 100%;
            max-height: 90vh;
            margin: 0 auto;
            border-radius: 0.375rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        tr.hoverable:hover {
            background-color: #f9fafb;
        }
    </style>
@endpush

@section('content')
    <x-admin-toolbar />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold">Auction Items</h2>
                        <a href="{{ route('admin.auction-items.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add New Item
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Item Details
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Donor
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Contact
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Value
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Image
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($items as $item)
                                    <tr class="hoverable">
                                        <td class="px-6 py-4">
                                            <div class="flex items-start">
                                                <svg class="expand-icon" onclick="toggleDetails(this.closest('tr'))"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">{{ $item->item_name }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">Status: {{ $item->status->name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">{{ $item->donor_name }}</div>
                                            <div class="text-sm text-gray-500">{{ $item->individual_name }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                <a href="mailto:info@faanecuador.org?subject=Regarding Auction Item: {{ urlencode($item->item_name) }}&body=Regarding donor: {{ urlencode($item->email) }}"
                                                    class="text-blue-600 hover:text-blue-900"
                                                    onclick="event.stopPropagation()">
                                                    {{ $item->email }}
                                                </a>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">${{ number_format($item->item_value, 2) }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($item->item_image_path)
                                                <svg class="image-icon" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor"
                                                    onclick="openImageModal('{{ Storage::url($item->item_image_path) }}', event)">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            @else
                                                <span class="text-gray-400">—</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-right text-sm font-medium">
                                            <a href="{{ route('admin.auction-items.edit', $item) }}"
                                                class="text-indigo-600 hover:text-indigo-900 mr-3"
                                                onclick="event.stopPropagation()">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.auction-items.destroy', $item) }}" method="POST"
                                                class="inline"
                                                onsubmit="return confirm('Are you sure you want to delete this item?')"
                                                onclick="event.stopPropagation()">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr class="expandable-row bg-gray-50" style="display: none;">
                                        <td colspan="6" class="px-6 py-4">
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <h4 class="font-semibold mb-2">Contact Information</h4>
                                                    <p class="text-sm">Phone: {{ $item->phone }}</p>
                                                    <p class="text-sm">Address: {{ $item->address }}</p>
                                                    @if ($item->address_2)
                                                        <p class="text-sm">Address 2: {{ $item->address_2 }}</p>
                                                    @endif
                                                </div>
                                                <div>
                                                    <h4 class="font-semibold mb-2">Volunteer Information</h4>
                                                    <p class="text-sm">Volunteer: {{ $item->faan_volunteer }}</p>
                                                    @if ($item->volunteer_email)
                                                        <p class="text-sm">
                                                            Volunteer Email:
                                                            <a href="mailto:info@faanecuador.org?subject=Regarding Auction Item: {{ urlencode($item->item_name) }}&body=Regarding volunteer: {{ urlencode($item->volunteer_email) }}"
                                                                class="text-blue-600 hover:text-blue-900">
                                                                {{ $item->volunteer_email }}
                                                            </a>
                                                        </p>
                                                    @endif
                                                    @if ($item->item_received_timestamp)
                                                        <p class="text-sm">Received:
                                                            {{ \Carbon\Carbon::parse($item->item_received_timestamp)->format('Y-m-d') }}
                                                        </p>
                                                    @endif
                                                </div>
                                                @if ($item->description)
                                                    <div class="col-span-2">
                                                        <h4 class="font-semibold mb-2">Description</h4>
                                                        <p class="text-sm whitespace-pre-line">{{ $item->description }}</p>
                                                    </div>
                                                @endif
                                                @if ($item->terms_and_conditions)
                                                    <div class="col-span-2">
                                                        <h4 class="font-semibold mb-2">Terms and Conditions</h4>
                                                        <p class="text-sm whitespace-pre-line">
                                                            {{ $item->terms_and_conditions }}</p>
                                                    </div>
                                                @endif
                                                @if ($item->admin_notes)
                                                    <div
                                                        class="col-span-2 mt-4 bg-yellow-50 p-4 rounded-lg border border-yellow-200">
                                                        <h4 class="font-semibold mb-2 text-yellow-800">Admin Notes</h4>
                                                        <p class="text-sm whitespace-pre-line text-yellow-700">
                                                            {{ $item->admin_notes }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="modal"
        style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.9); z-index: 9999;">
        <div class="modal-content"
            style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 10000;">
            <button class="modal-close" onclick="closeImageModal()"
                style="position: absolute; top: -2rem; right: -2rem;">&times;</button>
            <img id="modalImage" style="max-height: 80vh; max-width: 90vw; object-fit: contain;">
        </div>
    </div>

    @push('scripts')
        <script>
            function toggleDetails(row) {
                const content = row.nextElementSibling;
                if (!content || !content.classList.contains('expandable-row')) {
                    console.log('Invalid content element or missing expandable-row class');
                    return;
                }

                row.classList.toggle('expanded');
                content.classList.toggle('show');
                content.style.display = content.classList.contains('show') ? 'table-row' : 'none';

            }

            function openImageModal(imageUrl, event) {
                event.stopPropagation();
                const modal = document.getElementById('imageModal');
                const modalImg = document.getElementById('modalImage');
                modalImg.src = imageUrl;

                // Ensure image is loaded before showing
                modalImg.onload = function() {
                    modal.style.display = 'block';
                    document.body.style.overflow = 'hidden'; // Prevent scrolling
                };
            }

            function closeImageModal() {
                const modal = document.getElementById('imageModal');
                modal.style.display = 'none';
                document.body.style.overflow = ''; // Restore scrolling
            }

            // Setup event listeners when DOM is ready
            document.addEventListener('DOMContentLoaded', function() {
                const modal = document.getElementById('imageModal');
                if (modal) {
                    modal.addEventListener('click', function(e) {
                        if (e.target === this) {
                            closeImageModal();
                        }
                    });
                }
            });
        </script>
    @endpush

@endsection
