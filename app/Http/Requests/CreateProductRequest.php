<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Domains\EventLog\Core\Enums\StatusType;
use App\Domains\EventLog\Core\Enums\LogType;
use App\Domains\Notification\Core\DTO\V1\NotifyDTO;
use App\Domains\Notification\Core\Enums\NotificationType;
use App\DTO\CreateProductDTO;
use App\Rules\CheckRole;

final class CreateProductRequest extends FormRequest
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

    public function getDto(): CreateProductDTO
    {
        return new CreateProductDTO(
            $this->validated('name'),
            $this->validated('article'),
            $this->validated('status'),
            $this->validated('data'),
        );
    }
}
