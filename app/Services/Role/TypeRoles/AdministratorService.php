<?php

namespace App\Services\Role\TypeRoles;

use App\Services\Role\RoleFactory;

/**
 * Class AdministratorService
 */
class AdministratorService extends RoleFactory
{

    /**
     * @return bool
     */
    public function edit(): bool
    {
        return true;
    }
}
