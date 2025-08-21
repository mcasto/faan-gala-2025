<?php
return [
    'leftPanel' => file_get_contents(__DIR__ . '/html-blocks/auction-palooza/left-panel.html'),
    'rightPanel' => file_get_contents(__DIR__ . '/html-blocks/auction-palooza/right-panel.html'),
    'bottomPanel' => file_get_contents(__DIR__ . '/html-blocks/auction-palooza/bottom-panel.html'),

    // Mensajes de error y éxito
    'error_header' => 'Hubo algunos problemas con su envío:',
    'submission_error' => 'Lo sentimos, hubo un problema al guardar su artículo. Por favor, inténtelo de nuevo.',
    'item_submitted' => '¡Gracias! Su artículo para la subasta ha sido enviado exitosamente.',

    // Etiquetas del Formulario
    'donor_name' => 'Nombre del Donante o Empresa',
    'contact_name' => 'Nombre de Contacto',
    'email' => 'Dirección de Email',
    'phone' => 'Número de Teléfono',
    'address' => 'Dirección',
    'address_2' => 'Línea de Dirección 2 (opcional)',
    'item_name' => 'Nombre del Artículo',
    'item_value' => 'Valor del Artículo (USD)',
    'item_image' => 'Imagen del Artículo',
    'description' => 'Descripción del Artículo',
    'terms' => 'Términos & Condiciones (si aplica)',

    // Placeholders del Formulario
    'address_2_placeholder' => 'Apto, Suite, etc. (opcional)',
    'description_placeholder' => 'Por favor, proporcione una descripción detallada del artículo',
    'terms_placeholder' => 'Cualquier término, condición o restricción específica que aplique a este artículo',

    // Botones
    'submit_button' => 'Enviar Artículo para Subasta'
];
