@extends('layouts.app')

@section('title', 'Join Us')

@section('content')
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Left Panel -->
        <div class="w-full md:w-1/2 relative left-panel" style="background-image: url('storage/images/join-us-bg.jpeg');">
            <div class="absolute inset-0 "></div>
            <div class="relative z-10 flex flex-col justify-between p-8 text-white min-h-[60vh] md:min-h-screen h-full">
            </div>
        </div>

        <!-- Right Panel -->
        <div class="w-full md:w-1/2 relative flex flex-col justify-center items-center bg-slate-600">
            <div class="absolute inset-0 bg-black/30"></div>
            <div class="relative z-10 w-full p-8">
                <div class="text-white">
                    {!! $rightPanelTop !!}
                    <hr class='my-4' />
                    <div class="flex flex-col space-y-4">
                        <div class="relative">
                            <button id="oneTimeDonationBtn"
                                class="w-full px-6 py-3 bg-yellow-500 text-slate-800 font-semibold rounded-lg hover:bg-yellow-600 hover:text-white transition duration-300 flex items-center justify-between">
                                <span>One-Time Donation</span>
                                <svg id="oneTimeArrow" class="ml-2 h-4 w-4 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <!-- One-Time Donation Dropdown -->
                            <div id="oneTimeDropdown"
                                class="absolute top-full left-0 right-0 mt-1 bg-slate-800 rounded-lg shadow-lg opacity-0 invisible transform scale-95 transition-all duration-200 z-40">
                                <div class="py-2">
                                    <button
                                        class="donation-modal-btn w-full px-4 py-2 text-left text-yellow-500 hover:bg-slate-700 hover:text-white transition"
                                        data-amount="25" data-url="https://www.paypal.com/ncp/payment/86E6KQLSLVF5G">
                                        $25
                                    </button>
                                    <button
                                        class="donation-modal-btn w-full px-4 py-2 text-left text-yellow-500 hover:bg-slate-700 hover:text-white transition"
                                        data-amount="50" data-url="https://www.paypal.com/ncp/payment/7EAD2B6AA2F64">
                                        $50
                                    </button>
                                    <button
                                        class="donation-modal-btn w-full px-4 py-2 text-left text-yellow-500 hover:bg-slate-700 hover:text-white transition"
                                        data-amount="100" data-url="https://www.paypal.com/ncp/payment/SVW7PUMW8AHK8">
                                        $100
                                    </button>
                                    <button
                                        class="donation-modal-btn w-full px-4 py-2 text-left text-yellow-500 hover:bg-slate-700 hover:text-white transition"
                                        data-amount="custom" data-url="https://www.paypal.com/ncp/payment/AB3JPMNYXD6DA">
                                        You Choose
                                    </button>
                                </div>
                            </div>
                        </div>

                        <button id="monthlyDonationBtn"
                            class="px-6 py-3 bg-yellow-500 text-slate-800 font-semibold rounded-lg hover:bg-yellow-600 hover:text-white transition duration-300">
                            $20 Monthly Donation (for 12 months)
                        </button>
                    </div>
                    <hr class='my-4' />
                    {!! $rightPanelBottom !!}
                </div>
            </div>
        </div>
    </div>

    <!-- PayPal Monthly Donation Modal -->
    <div id="monthlyDonationModal" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-slate-800">Monthly Donation - $20/month</h3>
                <button id="closeModalBtn" class="text-slate-600 hover:text-slate-800 text-xl font-bold">&times;</button>
            </div>
            <div class="mb-4">
                <p class="text-slate-600 text-sm mb-4">Set up your recurring monthly donation of $20 for 12 months to
                    support FAAN.</p>
                <div id="paypal-button-container-P-00T03963TT926993UNCKLB3Q"></div>
            </div>
        </div>
    </div>

    <!-- PayPal One-Time Donation Modal -->
    <div id="oneTimeDonationModal" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4">
            <div class="flex justify-between items-center mb-4">
                <h3 id="donationModalTitle" class="text-lg font-semibold text-slate-800">One-Time Donation</h3>
                <button id="closeDonationModalBtn"
                    class="text-slate-600 hover:text-slate-800 text-xl font-bold">&times;</button>
            </div>
            <div class="mb-4">
                <p class="text-slate-600 text-sm mb-4">Complete your donation through PayPal.</p>
                <div id="paypal-form-container">
                    <!-- PayPal form will be inserted here -->
                </div>
            </div>
        </div>
    </div>

    <script
        src="https://www.paypal.com/sdk/js?client-id=ATHisUp0ai56Xleqxu6JdHOY-u0zbSxic4TB7SSm2Tefzgv1dmZJkN7ghlPMApTSmeIjKQEu_03oipI-&vault=true&intent=subscription"
        data-sdk-integration-source="button-factory"></script>
    <script>
        // Modal functionality
        const monthlyDonationBtn = document.getElementById('monthlyDonationBtn');
        const monthlyDonationModal = document.getElementById('monthlyDonationModal');
        const closeModalBtn = document.getElementById('closeModalBtn');

        // One-time donation modal functionality
        const oneTimeDonationModal = document.getElementById('oneTimeDonationModal');
        const closeDonationModalBtn = document.getElementById('closeDonationModalBtn');
        const donationModalTitle = document.getElementById('donationModalTitle');
        const paypalFormContainer = document.getElementById('paypal-form-container');

        // One-time donation dropdown functionality
        const oneTimeDonationBtn = document.getElementById('oneTimeDonationBtn');
        const oneTimeDropdown = document.getElementById('oneTimeDropdown');
        const oneTimeArrow = document.getElementById('oneTimeArrow');
        const donationModalBtns = document.querySelectorAll('.donation-modal-btn');

        // Handle donation modal button clicks
        donationModalBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const amount = this.getAttribute('data-amount');
                const paypalUrl = this.getAttribute('data-url');

                // Set modal title
                if (amount === 'custom') {
                    donationModalTitle.textContent = 'Choose Your Donation Amount';
                } else {
                    donationModalTitle.textContent = `Donate $${amount}`;
                }

                // Create PayPal form and insert into modal
                const paypalForm = `
                    <form action="${paypalUrl}" method="post" target="_blank" style="display: inline-grid; justify-items: center; align-content: start; gap: 0.5rem;">
                        <input type="submit" value="${amount === 'custom' ? 'Choose Amount' : `Donate $${amount}`}"
                               style="text-align: center; border: none; border-radius: 0.25rem; min-width: 11.625rem; padding: 0 2rem; height: 2.625rem; font-weight: bold; background-color: #ffd140; color: #000000; font-family: 'Helvetica Neue', Arial, sans-serif; font-size: 1rem; line-height: 1.25rem; cursor: pointer;" />
                        <img src="https://www.paypalobjects.com/images/Debit_Credit.svg" alt="cards" />
                        <section style="font-size: 0.75rem;">
                            Powered by
                            <img src="https://www.paypalobjects.com/paypal-ui/logos/svg/paypal-wordmark-color.svg" alt="paypal" style="height: 0.875rem; vertical-align: middle;" />
                        </section>
                    </form>
                `;

                paypalFormContainer.innerHTML = paypalForm;

                // Show modal
                oneTimeDonationModal.classList.remove('hidden');
                oneTimeDonationModal.style.display = 'flex';

                // Close dropdown
                closeOneTimeDropdown();
            });
        });

        // Close one-time donation modal
        closeDonationModalBtn.addEventListener('click', function() {
            oneTimeDonationModal.classList.add('hidden');
            oneTimeDonationModal.style.display = 'none';
        });

        // Close modal when clicking outside
        oneTimeDonationModal.addEventListener('click', function(e) {
            if (e.target === oneTimeDonationModal) {
                oneTimeDonationModal.classList.add('hidden');
                oneTimeDonationModal.style.display = 'none';
            }
        });

        // Toggle one-time donation dropdown
        oneTimeDonationBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            if (oneTimeDropdown.classList.contains('opacity-0')) {
                // Open dropdown
                oneTimeDropdown.classList.remove('opacity-0', 'invisible', 'scale-95');
                oneTimeDropdown.classList.add('opacity-100', 'visible', 'scale-100');
                oneTimeArrow.style.transform = 'rotate(180deg)';
            } else {
                // Close dropdown
                closeOneTimeDropdown();
            }
        });

        // Close one-time dropdown
        function closeOneTimeDropdown() {
            oneTimeDropdown.classList.remove('opacity-100', 'visible', 'scale-100');
            oneTimeDropdown.classList.add('opacity-0', 'invisible', 'scale-95');
            oneTimeArrow.style.transform = 'rotate(0deg)';
        }

        // Close one-time dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!oneTimeDonationBtn.contains(event.target) && !oneTimeDropdown.contains(event.target)) {
                closeOneTimeDropdown();
            }
        });

        // Monthly donation modal functionality
        monthlyDonationBtn.addEventListener('click', function() {
            monthlyDonationModal.classList.remove('hidden');
            monthlyDonationModal.style.display = 'flex';
            // Initialize PayPal button when modal opens
            initPayPalButton();
        });

        closeModalBtn.addEventListener('click', function() {
            monthlyDonationModal.classList.add('hidden');
            monthlyDonationModal.style.display = 'none';
        });

        // Close modal when clicking outside
        monthlyDonationModal.addEventListener('click', function(e) {
            if (e.target === monthlyDonationModal) {
                monthlyDonationModal.classList.add('hidden');
                monthlyDonationModal.style.display = 'none';
            }
        });

        // Initialize PayPal button
        function initPayPalButton() {
            // Clear any existing PayPal button
            document.getElementById('paypal-button-container-P-00T03963TT926993UNCKLB3Q').innerHTML = '';

            paypal.Buttons({
                style: {
                    shape: 'rect',
                    color: 'gold',
                    layout: 'vertical',
                    label: 'paypal'
                },
                createSubscription: function(data, actions) {
                    return actions.subscription.create({
                        /* Creates the subscription */
                        plan_id: 'P-00T03963TT926993UNCKLB3Q'
                    });
                },
                onApprove: function(data, actions) {
                    alert('Thank you! Your subscription ID is: ' + data.subscriptionID);
                    // Close modal after successful subscription
                    monthlyDonationModal.classList.add('hidden');
                    monthlyDonationModal.style.display = 'none';
                }
            }).render('#paypal-button-container-P-00T03963TT926993UNCKLB3Q');
        }
    </script>
@endsection
