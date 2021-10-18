<?php

namespace Bestfitcz\KbCzkExchangeRate;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Bestfitcz\KbCzkExchangeRate\Skeleton\SkeletonClass
 */
class KbCzkExchangeRateFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'kb-czk-exchange-rate';
    }
}
