<?php

return [
    'dataSource' => [
        'src' => 'wcli/wconfig/config/datasources.yaml',
    ],
    'workflows' => [
        // '/wcli/crm/config/project_w.yaml',
    ],
    // 'cloud' => [ //obligatoire si utilisation du cloud et du plugin lot
    //     //'class' => 'Waka\Cloud\Classes\Cloud\Gd',
    //     'class' => 'Waka\MsGraph\Classes\Cloud\MsDrive',
    //     'controller' => [
    //         'word' => [
    //             'show' => true,
    //             'class' => 'Waka\Worder\Models\Document',
    //             'constructor' => 'Waka\Worder\Classes\WordCreator2',
    //             'label' => 'Documents Word',
    //         ],
    //         'pdf' => [
    //             'show' => true,
    //             'class' => 'Waka\Pdfer\Models\WakaPdf',
    //             'constructor' => 'Waka\Pdfer\Classes\PdfCreator',
    //             'label' => 'Documents Pdf',
    //         ],
    //         'cloudis' => [
    //             'show' => true,
    //             'label' => 'Image Cloudi ',
    //             'folder' => 'Images',
    //         ],
    //         'montages' => [
    //             'show' => true,
    //             'label' => 'Montages',
    //             'folder' => 'Images',
    //         ],
    //     ],
    //     'folderModel' => [
    //         'client' => [
    //             'model' => 'Wcli\Crm\Models\Client',
    //             'public_folder' => 'public',
    //             'folder' => 'Clients',
    //         ],
    //         'project' => [
    //             'model' => 'Wcli\Crm\Models\Project',
    //             'before' => 'Wcli\Crm\Models\Client',
    //             'folder' => 'Projets',
    //         ],
    //         "contact" => [
    //             'model' => 'Wcli\Crm\Models\Contact',
    //             'before' => 'Wcli\Crm\Models\Client',
    //             'folder' => 'Contacts',
    //         ],
    //     ],
    //     'sync' => [
    //         'word' => [
    //             'label' => 'synchroniser doc word',
    //             'cloud_folder' => 'template_word',
    //             'app_folder' => 'word/templates/',
    //         ],

    //     ],
    //     // 'word_folder' => 'template_word',
    // ],
    'assets' => [ // obligatoire pour pdf et mailer
        'css' => [
            //si il  a du less penser à le mettre dans le registrer du plugin pour le combiner en css
            //'pdf' => ['/wcli/wconfig/assets/css/simple_grid/pdf.css' => 'pdf de base'],
            'email' => ['/wcli/wconfig/assets/css/simple_grid/email.css' => 'email de base'],
        ],
    ],
];
