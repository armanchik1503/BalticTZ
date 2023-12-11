<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Product;

/**
 * @property Product $product
 */
class ProductResource extends BaseResource
{
    public function getResponseArray(): array
    {
        return [
            'id' => $this->product->id,
            'article' => $this->product->article,
            'name' => $this->product->name,
            'status' => $this->product->status,
            'data'  => json_encode($this->product->data)
        ];
    }
}
