<?php
return [
    'leftPanel' => file_get_contents(__DIR__ . '/html-blocks/auction-palooza/left-panel.html'),
    'rightPanel' => file_get_contents(__DIR__ . '/html-blocks/auction-palooza/right-panel.html'),
    'bottomPanel' => file_get_contents(__DIR__ . '/html-blocks/auction-palooza/bottom-panel.html'),
    'form' => file_get_contents(__DIR__ . '/html-blocks/auction-palooza/form.html'),

    // Error and success messages
    'error_header' => 'Hubo algunos problemas con su envío:',
    'submission_error' => 'Lo sentimos, hubo un problema al guardar su artículo. Por favor, inténtelo de nuevo.',
    'item_submitted' => '¡Gracias! Su artículo para la subasta ha sido enviado exitosamente.',

    // Form Labels
    'donor_info' => 'Información del Donante',
    'contact_name' => 'Nombre de Contacto',
    'email' => 'Correo Electrónico',
    'phone' => 'Número de Teléfono',
    'address' => 'Dirección',
    'address_2' => 'Dirección Línea 2 (opcional)',
    'item_name' => 'Nombre del Artículo',
    'item_value' => 'Valor del Artículo',
    'item_image' => 'Imagen del Artículo',
    'description' => 'Descripción del Artículo',
    'terms' => 'Términos y Condiciones (si aplica)',

    // Form Placeholders
    'donor_placeholder' => 'Nombre del Donante o Empresa',
    'individual_placeholder' => 'Nombre Individual',
    'email_placeholder' => 'Correo Electrónico',
    'phone_placeholder' => 'Número de Teléfono',
    'address_placeholder' => 'Dirección',
    'address_2_placeholder' => 'Apt, Suite, etc. (opcional)',
    'item_name_placeholder' => 'Nombre del Artículo',
    'item_value_placeholder' => 'Valor del Artículo',
    'description_placeholder' => 'Por favor proporcione una descripción detallada del artículo',
    'terms_placeholder' => 'Cualquier término, condición o restricción específica que aplique a este artículo',

    // Buttons
    'submit_button' => 'Enviar Artículo para Subasta'
];
