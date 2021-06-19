<?php

return [
    'brand_data' => [
        'logoPath' => themes_path('wakatailwind/assets/images/logo.png'),
        'faviconPath' => themes_path('wakatailwind/assets/images/logo.png'),
        'appName' => 'Pack CRM',
        'tagline' => 'Automatisez vos documents',
        'primaryColor' => "#004C54",
        'secondaryColor' => "#405261",
        'accentColor' => "#F94D2A",
    ],
    'dataSource' => [
        'src' => 'wcli/wconfig/config/datasources.yaml',
    ],
    'workflows' => [
        // '/wcli/crm/config/project_w.yaml',
    ],
    'start_data' => [
        'clients' => [
            'class' => '\Wcli\Crm\Classes\Imports\ClientsImport',
            'table' => 'wcli_crm_clients',
            'truncate' => true,
        ],
        'contacts' => [
            'class' => '\Wcli\Crm\Classes\Imports\ContactsImport',
            'table' => 'wcli_crm_contacts',
            'truncate' => true,
        ],
        'secteurs' => [
            'class' => '\Wcli\Crm\Classes\Imports\SecteursImport',
            'table' => 'wcli_crm_secteurs',
            'truncate' => true,
        ],
        'commercials' => [
            'class' => '\Wcli\Crm\Classes\Imports\CommercialsImport',
            'table' => 'wcli_crm_commercials',
            'truncate' => true,
        ],
        'ventes' => [
            'class' => '\Wcli\Crm\Classes\Imports\VentesImport',
            'table' => 'wcli_crm_ventes',
            'truncate' => true,
        ],
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
