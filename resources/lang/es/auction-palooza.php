<?php
return [
    'leftPanel' => file_get_contents(__DIR__ . '/html-blocks/auction-palooza/left-panel.html'),
    'rightPanel' => file_get_contents(__DIR__ . '/html-blocks/auction-palooza/right-panel.html'),
    'bottomPanel' => file_get_contents(__DIR__ . '/html-blocks/auction-palooza/bottom-panel.html'),

    // Error and success messages
    'error_header' => 'Hubo algunos problemas con tu envío:',
    'submission_error' => 'Lo sentimos, hubo un problema al guardar tu artículo. Por favor, inténtalo de nuevo.',
    'item_submitted' => '¡Gracias! Tu artículo para la subasta ha sido enviado correctamente.',

    // Form Labels
    'donor_name' => 'Nombre del Donante o Empresa',
    'contact_name' => 'Nombre de Contacto',
    'email' => 'Correo Electrónico',
    'phone' => 'Número de Teléfono',
    'address' => 'Dirección',
    'address_2' => 'Línea de Dirección 2 (opcional)',
    'item_name' => 'Nombre del Artículo',
    'item_value' => 'Valor del Artículo (USD)',
    'item_image' => 'Imagen del Artículo',
    'description' => 'Descripción del Artículo',
    'terms' => 'Términos y Condiciones (si aplica)',

    // Form Placeholders
    'address_2_placeholder' => 'Apto, Suite, etc. (opcional)',
    'description_placeholder' => 'Por favor, proporciona una descripción detallada del artículo',
    'terms_placeholder' => 'Cualquier término, condición o restricción específica que aplique a este artículo',

    // Buttons
    'submit_button' => 'Enviar Artículo para Subasta'
];
