<?php
return [
    'rightPanelTop' =>
    file_get_contents(
        __DIR__ . '/html-blocks/join-us/right-panel-top.html'
    ),
    'rightPanelDonate' =>
    file_get_contents(
        __DIR__ . '/html-blocks/join-us/right-panel-donate.html'
    ),
    'rightPanelBottom' =>
    file_get_contents(
        __DIR__ . '/html-blocks/join-us/right-panel-bottom.html'
    ),

    // Donation button labels
    'one_time_donation' => 'One-Time Donation',
    'monthly_donation' => '$20 Monthly Donation (for 12 months)',
    'donate_25' => 'Donate $25',
    'donate_50' => 'Donate $50',
    'donate_100' => 'Donate $100',
    'you_choose' => 'You Choose',
    'choose_amount' => 'Choose Amount',
    'donation_modal_title_25' => 'Donate $25',
    'donation_modal_title_50' => 'Donate $50',
    'donation_modal_title_100' => 'Donate $100',
    'donation_modal_title_custom' => 'Choose Your Donation Amount',
    'monthly_donation_modal_title' => 'Monthly Donation - $20/month',
    'monthly_donation_description' => 'Set up your recurring monthly donation of $20 for 12 months to support FAAN.',
    'paypal_description' => 'Complete your donation through PayPal.',
];
