<?php
return [
    'rightPanelTop' =>
    file_get_contents(
        __DIR__ . '/html-blocks/join-us/right-panel-top.html'
    ),
    'rightPanelBottom' =>
    file_get_contents(
        __DIR__ . '/html-blocks/join-us/right-panel-bottom.html'
    ),

    // Donation button labels
    'oneTimeConfig' => [
        'label' => 'One-Time Donation',
        'dropdown' => [
            [
                'label' => 'Donate $25',
                'thanks' => 'Thank you for your $25 donation',
                'url' => 'https://www.paypal.com/ncp/payment/86E6KQLSLVF5G'
            ],
            [
                'label' => 'Donate $50',
                'thanks' => 'Thank you for your $50 donation',
                'url' => 'https://www.paypal.com/ncp/payment/7EAD2B6AA2F64'
            ],
            [
                'label' => 'Donate $100',
                'thanks' => 'Thank you for your $100 donation',
                'url' => 'https://www.paypal.com/ncp/payment/SVW7PUMW8AHK8'
            ],
            [
                'label' => 'You Choose',
                'thanks' => 'Thank you for your donation',
                'url' => 'https://www.paypal.com/ncp/payment/AB3JPMNYXD6DA'
            ],
        ]
    ],
    'monthlyConfig' => [
        'buttonLabel' => '$20 Monthly Donation (for 12 months)',
        'modalLabel' => 'Monthly Donation - $20/month',
        'description' => 'Set up your recurring monthly donation of $20 for 12 months to support FAAN.',
    ],
    'paypal_description' => 'Complete your donation through PayPal.',
];
