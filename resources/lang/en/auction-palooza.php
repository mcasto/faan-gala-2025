<?php
return [
    'leftPanel' => file_get_contents(__DIR__ . '/html-blocks/auction-palooza/left-panel.html'),
    'rightPanel' => file_get_contents(__DIR__ . '/html-blocks/auction-palooza/right-panel.html'),
    'bottomPanel' => file_get_contents(__DIR__ . '/html-blocks/auction-palooza/bottom-panel.html'),

    // Error and success messages
    'error_header' => 'There were some problems with your submission:',
    'submission_error' => 'Sorry, there was a problem saving your item. Please try again.',
    'item_submitted' => 'Thank you! Your auction item has been successfully submitted.',

    // Form Labels
    'donor_name' => 'Donor or Business Name',
    'contact_name' => 'Contact Name',
    'email' => 'Email Address',
    'phone' => 'Phone Number',
    'address' => 'Address',
    'address_2' => 'Address Line 2 (optional)',
    'item_name' => 'Name of Item',
    'item_value' => 'Value of Item (USD)',
    'item_image' => 'Item Image',
    'description' => 'Description of the Item',
    'terms' => 'Terms & Conditions (if applicable)',

    // Form Placeholders
    'address_2_placeholder' => 'Apt, Suite, etc. (optional)',
    'description_placeholder' => 'Please provide a detailed description of the item',
    'terms_placeholder' => 'Any specific terms, conditions, or restrictions that apply to this item',

    // Buttons
    'submit_button' => 'Submit Auction Item'
];
