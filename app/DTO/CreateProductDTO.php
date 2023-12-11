<?php

declare(strict_types=1);

namespace App\DTO;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class CreateProductDTO
 */
class CreateProductDTO
{
    /**
     * @param string|null $article
     * @param string|null $name
     * @param string|null $status
     * @param array|null  $data
     */
    public function __construct(
        public ?string $article,
        public ?string $name,
        public ?string $status,
        public ?array  $data
    ) {
    }
}