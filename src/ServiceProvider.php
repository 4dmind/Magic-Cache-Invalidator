<?php

namespace FDMind\MagicCacheInvalidator;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $actions = [
        Actions\InvalidateEntryCache::class,
    ];

    public function boot()
    {
        parent::boot();
    }
}
