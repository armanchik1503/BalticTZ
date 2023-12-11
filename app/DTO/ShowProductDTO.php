<?php

declare(strict_types=1);

namespace App\DTO;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class ShowProductDTO
 */
final class ShowProductDTO
{
    public function __construct(
        public array $product,
    ) {
    }
}