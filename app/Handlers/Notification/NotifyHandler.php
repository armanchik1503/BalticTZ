<?php

namespace App\Handlers\Notification;

use App\Jobs\SendProductCreatedNotification;
use App\Models\Product;

/**
 * Class NotifyHandler
 */
class NotifyHandler
{
    /**
     * @param \App\Models\Product $product
     *
     * @return void
     */
    public function handle(Product $product): void
    {
        SendProductCreatedNotification::dispatch($product);
    }
}