<?php

declare(strict_types=1);

use TypiCMS\Modules\Partners\Models\Partner;

return [
    'model' => Partner::class,
    'linkable_to_page' => true,
    'per_page' => 50,
    'order' => [
        'position' => 'asc',
    ],
    'sidebar' => [
        'icon' => '<i class="icon-handshake"></i>',
        'weight' => 70,
    ],
    'permissions' => [
        'read partners' => 'Read',
        'create partners' => 'Create',
        'update partners' => 'Update',
        'delete partners' => 'Delete',
    ],
];
