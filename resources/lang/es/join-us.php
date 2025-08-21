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

    // Etiquetas de botones de donación
    'oneTimeConfig' => [
        'label' => 'Donación Única',
        'dropdown' => [
            [
                'label' => 'Donar $25',
                'thanks' => 'Gracias por su donación de $25',
                'url' => 'https://www.paypal.com/ncp/payment/86E6KQLSLVF5G'
            ],
            [
                'label' => 'Donar $50',
                'thanks' => 'Gracias por su donación de $50',
                'url' => 'https://www.paypal.com/ncp/payment/7EAD2B6AA2F64'
            ],
            [
                'label' => 'Donar $100',
                'thanks' => 'Gracias por su donación de $100',
                'url' => 'https://www.paypal.com/ncp/payment/SVW7PUMW8AHK8'
            ],
            [
                'label' => 'Usted Elige',
                'thanks' => 'Gracias por su donación',
                'url' => 'https://www.paypal.com/ncp/payment/AB3JPMNYXD6DA'
            ],
        ]
    ],
    'monthlyConfig' => [
        'buttonLabel' => 'Donación Mensual de $20 (por 12 meses)',
        'modalLabel' => 'Donación Mensual - $20/mes',
        'description' => 'Configure su donación recurrente mensual de $20 por 12 meses para apoyar a FAAN.',
    ],
    'paypal_description' => 'Complete su donación a través de PayPal.',
];
