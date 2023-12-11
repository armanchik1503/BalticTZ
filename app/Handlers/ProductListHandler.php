<?php

declare(strict_types=1);

namespace App\Handlers;

use App\DTO\ListProductDTO;
use App\Models\Product;
use App\Scopes\StatusScope;

/**
 * Class ProductListHandler
 */
final class ProductListHandler
{
    /**
     * @return \App\DTO\ListProductDTO
     */
    public function handle(): ListProductDTO
    {
        return new ListProductDTO(
            Product::query()
                   ->withGlobalScope('status', new StatusScope())
                   ->get()
                   ->toArray()
        );
    }
}