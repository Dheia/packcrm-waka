<?php namespace Wcli\Crm\Updates;

use DB;
use Excel;
use Seeder;

class SeedSettings extends Seeder
{
    public function run()
    {
        Db::table('system_settings')->truncate();
        $sql = plugins_path('wcli/crm/updates/files/system_settings.sql');
        DB::unprepared(file_get_contents($sql));
    }
}
