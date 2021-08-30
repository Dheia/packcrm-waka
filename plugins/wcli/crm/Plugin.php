<?php namespace Wcli\Crm;

use Backend;
use System\Classes\PluginBase;
use Lang;

/**
 * crm Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'crm',
            'description' => 'No description provided yet...',
            'author'      => 'wcli',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Wcli\Crm\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {

        return [
            'wcli.crm.user' => [
                'tab' => 'crm',
                'label' => 'Utilisateur du CRM'
            ],
            'wcli.crm.admin' => [
                'tab' => 'crm',
                'label' => 'Manager du CRM'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'crm' => [
                'label'       => 'CRM',
                'url'         => Backend::url('wcli/crm/contacts'),
                'icon'        => 'icon-user',
                'permissions' => ['wcli.crm.*'],
                'order'       => 500,
                'sideMenu' => [
                    'side-menu-contacts' => [
                        'label' => Lang::get('wcli.crm::lang.menu.contacts'),
                        'icon' => 'icon-address-card',
                        'url' => Backend::url('wcli/crm/contacts'),
                    ],
                    'side-menu-clients' => [
                        'label' => Lang::get('wcli.crm::lang.menu.clients'),
                        'icon' => 'icon-building',
                        'url' => Backend::url('wcli/crm/clients'),
                    ],
                    'side-menu-gammes' => [
                        'label' => Lang::get('wcli.crm::lang.menu.gammes'),
                        'icon' => 'icon-dot-circle-o',
                        'url' => Backend::url('wcli/crm/gammes'),
                        'permissions' => ['wcli.crm.admin'],
                    ],
                    'side-menu-commercials' => [
                        'label' => Lang::get('wcli.crm::lang.menu.commercials'),
                        'icon' => 'icon-users',
                        'url' => Backend::url('wcli/crm/commercials'),
                        'permissions' => ['wcli.crm.*'],
                    ],
                    'side-menu-ventes' => [
                        'label' => Lang::get('wcli.crm::lang.menu.ventes'),
                        'icon' => 'icon-dollar',
                        'url' => Backend::url('wcli/crm/ventes'),
                        'permissions' => ['wcli.crm.*'],
                    ],
                ],
            ],
        ];
    }
}
