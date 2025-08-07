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
    'one_time_donation' => 'Donación Única',
    'monthly_donation' => 'Donación Mensual de $20 (por 12 meses)',
    'donate_25' => 'Donar $25',
    'donate_50' => 'Donar $50',
    'donate_100' => 'Donar $100',
    'you_choose' => 'Tú Eliges',
    'choose_amount' => 'Elegir Cantidad',
    'donation_modal_title_25' => 'Donar $25',
    'donation_modal_title_50' => 'Donar $50',
    'donation_modal_title_100' => 'Donar $100',
    'donation_modal_title_custom' => 'Elige tu Cantidad de Donación',
    'monthly_donation_modal_title' => 'Donación Mensual - $20/mes',
    'monthly_donation_description' => 'Configura tu donación mensual recurrente de $20 por 12 meses para apoyar a FAAN.',
    'paypal_description' => 'Completa tu donación a través de PayPal.',
];
