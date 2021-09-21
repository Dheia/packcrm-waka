<?php namespace Wcli\Crm\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Projet Back-end Controller
 */
class Projets extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Waka.Utils.Behaviors.BtnsBehavior',
        'Backend.Behaviors.RelationController',
        'Waka.Utils.Behaviors.SideBarUpdate',
        'Waka.Worder.Behaviors.WordBehavior',
        'Waka.Mailer.Behaviors.MailBehavior',
        'Waka.ImportExport.Behaviors.ExcelImport',
        'Waka.ImportExport.Behaviors.ExcelExport',
        'Backend.Behaviors.ReorderController',
        'Waka.Utils.Behaviors.DuplicateModel',
        'Waka.MsGraph.Behaviors.OutlookBehavior',
        'Waka.Cloud.Behaviors.CloudWord',
    ];
    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $btnsConfig = 'config_btns.yaml';
    public $relationConfig = 'config_relation.yaml';
    public $duplicateConfig = 'config_duplicate.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $sideBarUpdateConfig = 'config_side_bar_update.yaml';
    //FIN DE LA CONFIG AUTO

    public $produitListWidget;
    public $prduitFilterWidget;
    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Wcli.Crm', 'crm', 'side-menu-projets');
        $this->produitListWidget = $this->createProduitListWidget();
    }

    //startKeep/

    public function update($id)
    {
        $this->bodyClass = 'compact-container';
        return $this->asExtension('FormController')->update($id);
    }

    public function relationExtendRefreshResults($field)
    {
        // Make sure the field is the expected one
        if ($field != 'projetProduits')
            return;
        
        $model = \Wcli\Crm\Models\Projet::find($this->params[0]);
        $model->save();

        $fieldMarkup = $this->formGetWidget()->renderField('info', ['useContainer' => true]);

        return [
            '#Form-field-Projet-info-group' => $fieldMarkup
        ];
    }

    public function onLoadReorder()
    {
        $this->vars['manageId'] = post("manageId");
        $this->reorder();
        return $this->makePartial('reorder');
    }

    public function reorderExtendQuery($query)
    {
        if (isset($this->params[0])) {
            $query->where('projet_id', (int) $this->params[0]);
        } else {
            throw new \Exception('Category\'s ID must be given for reordering of Projects.');
        }
    }

    public function onCloseReorder()
    {
        $modelId = post('manageId');
        $model = \Wcli\Crm\Models\Projet::find($modelId);
        $this->initForm($model);
        $this->initRelation($model, "projetProduits");
        return $this->relationRefresh("projetProduits");
    }

    /**
     * FIN REORDER
     */

    public function onAddproduits()
    {
        $manageId = post('manage_id');
        $this->vars['manageId'] = $manageId;
        $this->vars['produitListWidget'] = $this->produitListWidget;
        #Variable necessary for the Filter funcionality
        $this->vars['produitFilterWidget'] = $this->produitFilterWidget;
        #Process the custom list partial, The name you choose here will be the partials file name
        return $this->makePartial('produit_list');
    }

    public function onAddproduitsValidation()
    {
        $modelId = post('manageId');
        $model = \Wcli\Crm\Models\Projet::find($modelId);
        $checked = post('checked');

        if ($checked ?? false) {
            foreach ($checked as $relationId) {
                $baseProduit = \Wcli\Crm\Models\Produit::find($relationId);
                $projetProduit = new \Wcli\Crm\Models\ProjetProduit();
                $projetProduit->fill($baseProduit->toArray());
                $model->projetProduits()->add($projetProduit);
                $projetProduit->sort_order = $projetProduit->id;
                $projetProduit->save();
            }
        }
       $this->initForm($model);
       $this->initRelation($model, "projetProduits");

        return $this->relationRefresh("projetProduits");
    }


    protected function createProduitListWidget()
    {

        #First we need config for the list, as described in video tutorials mentioned at the beginning.
        # Specify which list configuration file use for this list
        $config = $this->makeConfig('$/wcli/crm/models/produit/columns.yaml');

        # Specify the List model
        $config->model = new \Wcli\Crm\Models\Produit;

        # Lets configure some more things like report per page and lets show checkboxes on the list.
        # Most of the options mentioned in https://octobercms.com/docs/backend/lists#configuring-list # will work
        $config->recordsPerPage = '30';
        $config->showCheckboxes = 'true';
        $config->defaultSort = [
            'column' => 'sort_order',
            'direction' => 'asc',
        ];

        # Here we will actually make the list using Lists Widget
        $widget_produit = $this->makeWidget('Backend\Widgets\Lists', $config);

        #For the optional Step 4. Alter produit list query before displaying it.
        # We will bind to list.extendQuery event and assign a function that should be executed to extend
        # the query (the function is defined in this very same controller file)
        // $widget_produit->bindEvent('list.extendQuery', function ($query) {
        //     $this->missionTemplateExtendQuery($query);
        // });

        # Step 3. The filter part, we must define the config, really similar to the Produit list widget config
        # Filter configuration file
        $filterConfig = $this->makeConfig('$/wcli/crm/controllers/produits/config_filters.yaml');

        # Use Filter widgets to make the widget and bind it to the controller
        $filterWidget = $this->makeWidget('Backend\Widgets\Filter', $filterConfig);
        $filterWidget->bindToController();

        # We need to bind to filter.update event in order to refresh the list after selecting
        # the desired filters.
        $filterWidget->bindEvent('filter.update', function () use ($widget_produit, $filterWidget) {
            return $widget_produit->onRefresh();
        });

        // #Finally we are attaching The Filter widget to the Produit widget.
        $widget_produit->addFilter([$filterWidget, 'applyAllScopesToQuery']);

        $this->ProduitFilterWidget = $filterWidget;

        # Dont forget to bind the whole thing to the controller
        $widget_produit->bindToController();

        #Return the prepared widget object
        return $widget_produit;
    }

        //endKeep/
}

