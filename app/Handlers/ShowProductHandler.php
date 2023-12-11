<?php

namespace App\Handlers;

use App\DTO\ShowProductDTO;
use App\Models\Product;
use App\Scopes\StatusScope;

/**
 * Class ShowProductHandler
 */
class ShowProductHandler
{
    /**
     * @param int $id
     *
     * @return \App\DTO\ShowProductDTO
     */
    public function handle(int $id): ShowProductDTO
    {
        return new ShowProductDTO(
            Product::query()
                   ->withGlobalScope('status', new StatusScope())
                   ->findOrFail($id)
        );
    }
}