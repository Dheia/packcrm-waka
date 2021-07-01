<?php namespace Wcli\Crm\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Commercial Back-end Controller
 */
class Commercials extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Waka.Utils.Behaviors.BtnsBehavior',
        'Backend.Behaviors.RelationController',
        'Waka.Mailer.Behaviors.MailBehavior',
        'Waka.ImportExport.Behaviors.ExcelImport',
        'Waka.ImportExport.Behaviors.ExcelExport',
    ];
    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $btnsConfig = 'config_btns.yaml';
    public $relationConfig = 'config_relation.yaml';

    public $requiredPermissions = ['wcli.crm.*'];
    //FIN DE LA CONFIG AUTO

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Wcli.Crm', 'crm', 'side-menu-commercials');
    }

    //startKeep/

    //endKeep/
}

