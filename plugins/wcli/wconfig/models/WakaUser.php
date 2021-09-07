<?php namespace Wcli\Wconfig\Models;


use Backend\Models\User as WinterUser;

/**
 * Administrator user model
 *
 * @package winter\wn-backend-module
 * @author Alexey Bobkov, Samuel Georges
 */
class WakaUser extends WinterUser
{
    public $attributesToDs = [
        'fullName',
    ];
}
