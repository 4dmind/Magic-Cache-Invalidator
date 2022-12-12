<?php

namespace Fdmind\MagicCacheInvalidator;

use Statamic\Providers\AddonServiceProvider;
use Fdmind\InvalidateEntryCache\Actions\InvalidateEntryCache;

class ServiceProvider extends AddonServiceProvider
{
    protected $actions = [
        InvalidateEntryCache::class,
    ];

    public function boot()
    {
        parent::boot();
    }
}
