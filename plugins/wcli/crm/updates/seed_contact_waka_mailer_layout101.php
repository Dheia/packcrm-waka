<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedContactWakaMailerLayout101 extends Seeder
{
    public function run()
    {
        \Waka\Mailer\Models\Layout::truncate();
            
        $inject = \Waka\Mailer\Models\Layout::create([
                'name' => 'base',
                'contenu' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css" media="screen">
        {{ baseCss|raw }}
        {{ addCss|raw }}
    </style>
</head>
<body>                    
    {{ content|raw }}
    {{mailPartial(\'base_footer\',ds)}}
                                  
                                
         
</body>
</html>',
                'baseCss' => '/wcli/wconfig/assets/css/simple_grid/email.css',
                'AddCss' => '',
                'sort_order' => 1,
                'created_at' => '2021-06-23 10:21:51',
                'updated_at' => '2021-08-31 14:29:47'
            ]);
 
    }

}
