<?php

return [
    'form-labels' => [
        'purchaser_name' => [
            'label' => 'Nombre del Comprador',
            'hint' => 'Usted es la persona que ordena la(s) entrada(s)'
        ],
        'email' => [
            'label' => 'Email',
        ],
        'phone' => [
            'label' => 'Teléfono',
        ],
        'quantity' => [
            'label' => 'Cantidad',
            'hint' => 'Número de Entradas Solicitadas'
        ],
        'payment_methods' => [
            [
                'label' => 'Efectivo',
                'info' => file_get_contents(__DIR__ . '/html-blocks/ticket/cash.html'),
            ],
            [
                'label' => 'Cheque',
                'info' => file_get_contents(__DIR__ . '/html-blocks/ticket/check.html'),
            ],
            'label' => 'Método de Pago',
            [
                'label' => 'Transferencia Bancaria',
                'info' => file_get_contents(__DIR__ . '/html-blocks/ticket/bank-transfer.html'),
            ],
        ],
        'table_number_or_ambassador' => [
            'label' => 'ID de Mesa o Embajador',
            'hint' => 'Algunas mesas tienen un Embajador/Tema de Película. ID si se conoce.'
        ],
        'vegetarian_requirement' => [
            'label' => 'Requerimiento Vegetariano',
            'hint' => 'El plato principal será una combinación de res y pollo. Si prefiere vegetariano, por favor note sus preferencias/restricciones.'
        ],
        'note_from_rsvp' => [
            'label' => 'Nota del RSVP',
            'hint' => '¿Qué es lo que más espera de este evento?'
        ],
        'submit' => [
            'label' => 'Enviar RSVP',
        ],
    ],
    'header' => 'Formulario de Registro',
    'subheader' => 'Por favor, complete el formulario a continuación para confirmar su asistencia (RSVP)',
    'guest-form' => [
        'name' => 'Nombre del Invitado',
        'email' => 'Email del Invitado',
    ]
];
