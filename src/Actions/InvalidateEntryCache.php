<?php

namespace k4dmind\InvalidateEntryCache\Actions;

use Statamic\Actions\Action;
use Statamic\Contracts\Entries\Entry;
use Statamic\StaticCaching\StaticCacheManager;

class InvalidateEntryCache extends Action
{
    /**
     * The run method
     *
     * @return void
     */
    public function run($items, $values)
    {
        $cacheManager = new StaticCacheManager(app());
        $cacheDriver = $cacheManager->driver();
        $baseUrl = $cacheDriver->getBaseUrl();

        $items->each(function($entry, $v) use ($cacheDriver, $baseUrl) {

            if($entry instanceof Entry) {
                $cacheDriver->invalidateUrl($entry->url(), $baseUrl);
            }
        });
        return __('Static cache for selected entries was cleared.');
    }

    public static function title()
    {
        return __('Invalidate cache');
    }

    public function visibleTo($item)
    {
        return $item instanceof Entry;
    }
}
