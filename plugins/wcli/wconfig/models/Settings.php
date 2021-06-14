<?php namespace Wcli\Wconfig\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'wcli_wconfig_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';

    public function listUsers()
    {
        $users = \Backend\Models\User::get();
        $array = [];
        foreach ($users as $user) {
            $array[$user->id] = $user->fullName;
        }
        return $array;
    }
}
