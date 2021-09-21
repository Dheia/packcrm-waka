<?php namespace Wcli\Crm\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'wcli_crm_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
}
