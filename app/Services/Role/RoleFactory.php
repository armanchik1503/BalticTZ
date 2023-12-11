<?php

namespace App\Services\Role;

use App\Contracts\RoleInterface;
use App\Services\Role\TypeRoles\AdministratorService;
use Illuminate\Support\Facades\Config;

/**
 * Abstract class RoleFactory
 */
abstract class RoleFactory implements RoleInterface
{
    const USER_ROLE_ADMIN_ID = 'admin';

    /**
     * @return RoleInterface
     */
    public static function setUp(): RoleInterface
    {
        return match (Config::get('products.role')) {
            self::USER_ROLE_ADMIN_ID => new AdministratorService(),
        };
    }
}
