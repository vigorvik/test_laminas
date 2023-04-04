<?php

namespace Hearthstone;

use Laminas\Router\Http\Segment;

return [

    'router' => [
        'routes' => [
            'card' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/card[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\CardController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'card' => __DIR__ . '/../view',
        ],
    ],
];