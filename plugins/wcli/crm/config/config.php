<?php

return [
    'seeds' => [
        'produit' => [
                'class' => 'Wcli\Crm\Models\Produit',
                'files' => [
                    ['attribute' => 'image','mode' => 'copyUpload'],
                ]
            ],
    ],

];
