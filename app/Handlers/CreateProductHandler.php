<?php

namespace App\Handlers;

use App\DTO\CreateProductDTO;
use App\DTO\ListProductDTO;
use App\Handlers\Notification\NotifyHandler;
use App\Models\Product;

class CreateProductHandler
{
    public function __construct(private readonly NotifyHandler $notify)
    {
    }

    /**
     * @param \App\DTO\CreateProductDTO $dto
     *
     * @return \App\DTO\ListProductDTO
     */
    public function handle(CreateProductDTO $dto): ListProductDTO
    {
        $product = new Product();
        $product->setAttribute('article', $dto->article ?? $product->getAttribute('article'));
        $product->setAttribute('name', $dto->name ?? $product->getAttribute('name'));
        $product->setAttribute('status', $dto->status ?? $product->getAttribute('status'));
        $product->setAttribute('data', json_decode($dto->data) ?? $product->getAttribute('data'));
        $product->save();

        $this->sendNotify($product);

        return new ListProductDTO($product->toArray());
    }

    /**
     * @param \App\Models\Product $product
     *
     * @return void
     */
    private function sendNotify(Product $product): void
    {
        $this->notify->handle($product);
    }
}