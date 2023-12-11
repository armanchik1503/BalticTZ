<?php

namespace App\Handlers;

use App\DTO\ListProductDTO;
use App\DTO\UpdateProductDTO;
use App\Models\Product;

class UpdateProductHandler
{
    /**
     * @param int                       $id
     * @param \App\DTO\UpdateProductDTO $dto
     *
     * @return \App\DTO\ListProductDTO
     */
    public function handle(int $id, UpdateProductDTO $dto): ListProductDTO
    {
        $product = Product::findOrFail($id);
        $product->setAttribute('article', $dto->article ?? $product->getAttribute('article'));
        $product->setAttribute('name', $dto->name ?? $product->getAttribute('name'));
        $product->setAttribute('status', $dto->status ?? $product->getAttribute('status'));
        $product->setAttribute('data', json_decode($dto->data) ?? $product->getAttribute('data'));
        $product->save();

        return new ListProductDTO($product->toArray());
    }
}