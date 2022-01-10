<?php namespace Wcli\Crm\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Client Back-end Controller
 */
class Clients extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Waka.Utils.Behaviors.BtnsBehavior',
        'Backend.Behaviors.RelationController',
        'Waka.Utils.Behaviors.SideBarUpdate',
        'Waka.Worder.Behaviors.WordBehavior',
        'Waka.Pdfer.Behaviors.PdfBehavior',
        'Waka.ImportExport.Behaviors.ExcelImport',
        'Waka.ImportExport.Behaviors.ExcelExport',
        'Waka.Cloud.Behaviors.CloudPdf',
        'Waka.Cloud.Behaviors.CloudWord',
    ];
    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $btnsConfig = 'config_btns.yaml';
    public $relationConfig = 'config_relation.yaml';
    public $sideBarUpdateConfig = 'config_side_bar_update.yaml';

    public $requiredPermissions = ['wcli.crm.*'];
    //FIN DE LA CONFIG AUTO
    //startKeep/
    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Wcli.Crm', 'crm', 'side-menu-clients');
    }
    public function update($id)
    {
        $this->bodyClass = 'compact-container';
        return $this->asExtension('FormController')->update($id);
    }
    //endKeep/
}

