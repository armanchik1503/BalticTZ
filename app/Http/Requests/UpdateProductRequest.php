<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\DTO\UpdateProductDTO;
use App\Rules\CheckRole;

final class UpdateProductRequest extends FormRequest
{

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'name'    => 'required|min:10',
            'article' => ['required', 'regex:/^[a-zA-Z0-9]+$/', 'unique:products,article', new CheckRole()],
            'status'  => 'nullable|in:available,unavailable',
            'data'    => 'nullable|array'
        ];
    }

    public function getDto(): UpdateProductDTO
    {
        return new UpdateProductDTO(
            $this->validated('name'),
            $this->validated('article'),
            $this->validated('status'),
            $this->validated('data'),
        );
    }
}
