<?php namespace Wcli\Crm\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Secteur Back-end Controller
 */
class Secteurs extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Waka.Utils.Behaviors.BtnsBehavior',
        'Backend.Behaviors.RelationController',
        'Waka.Mailer.Behaviors.MailBehavior',
        'Waka.Utils.Behaviors.DuplicateModel',
    ];
    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $btnsConfig = 'config_btns.yaml';
    public $relationConfig = 'config_relation.yaml';
    public $duplicateConfig = 'config_duplicate.yaml';
    //FIN DE LA CONFIG AUTO

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Wcli.Crm', 'crm', 'side-menu-secteurs');
    }

}

