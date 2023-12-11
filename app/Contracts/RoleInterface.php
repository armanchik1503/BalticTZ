<?php

namespace App\Contracts;

/**
 * Interface for the roles
 */
interface RoleInterface
{

    /**
     * @return bool
     */
    public function edit(): bool;
}
