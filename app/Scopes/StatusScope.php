<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

/**
 * CLass StatusScope
 */
class StatusScope implements Scope
{
    /**
     * @param  Builder  $builder
     * @param  Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->where('status', 'available');
    }
}
