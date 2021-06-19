<?php namespace Wcli\Wconfig\Updates;

use Seeder;
use Waka\Mailer\Models\Bloc;
use Waka\Mailer\Models\Layout;
use Waka\Mailer\Models\WakaMail;

class SeedEmails extends Seeder
{
    public function run()
    {
        Bloc::truncate();
        $bloc = Bloc::create([
            'name'                 => 'base footer',
            'slug'                 => 'base_footer',
            'contenu'              =>  \File::get(plugins_path('wcli/wconfig/updates/files/email/bloc_footer.htm')),
            'description'            => 'Footer pour le template de base',
        ]);
        // $bloc = Bloc::create([
        //     'name'                 => 'base header',
        //     'slug'                 => 'base_header',
        //     'contenu'              =>  \File::get(plugins_path('wcli/wconfig/updates/files/email/bloc_header.htm')),
        //     'description'            => 'Header pour le template de base',
        // ]);
        Layout::truncate();
        $layout = Layout::create([
            'name'                 => 'base',
            'contenu'              =>  \File::get(plugins_path('wcli/wconfig/updates/files/email/template.htm')),
            'baseCss'            => '/wcli/wconfig/assets/css/simple_grid/email.css',
        ]);
        WakaMail::truncate();
        $email = WakaMail::create([
            'name'                 => 'hello',
            'slug'                 => 'wcli.crm::hello',
            'layout_id'            => 1,
            'no_ds' => false,
            'test_id'               => 1,
            'subject'              =>  'Hello {{ds.name}}',
            'html'              =>  \File::get(plugins_path('wcli/wconfig/updates/files/email/hello.htm')),
            'data_source'            => 'contact',
        ]);
        $email = WakaMail::create([
            'name'                 => 'liste des ventes (contact)',
            'slug'                 => 'wcli.crm::contact_ventes',
            'layout_id'            => 1,
            'no_ds' => false,
            'test_id'               => 1,
            'subject'              =>  '{{ds.name}}',
            'html'              =>  \File::get(plugins_path('wcli/wconfig/updates/files/email/liste_ventes.htm')),
            'data_source'            => 'contact',
        ]);
        $email = WakaMail::create([
            'name'                 => 'liste des ventes (commercial)',
            'slug'                 => 'wcli.crm::commercial_ventes',
            'layout_id'            => 1,
            'no_ds' => false,
            'test_id'               => 1,
            'subject'              =>  '{{ds.name}}',
            'html'              =>  \File::get(plugins_path('wcli/wconfig/updates/files/email/liste_ventes.htm')),
            'data_source'            => 'commercial',
        ]);
        
    }
}
