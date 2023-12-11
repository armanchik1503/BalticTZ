<?php

namespace App\Handlers;

use App\DTO\ListProductDTO;
use App\Models\Product;

class DeleteProductHandler
{
    /**
     * @param int $id
     *
     * @return \App\DTO\ListProductDTO
     */
    public function handle(int $id): ListProductDTO
    {
        Product::find($id)->forceDelete();

        return new ListProductDTO(
            Product::query()
                   ->get()
                   ->toArray()
        );
    }
}