<?php

namespace Farshadff\Zaya;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Farshadff\Zaya\Skeleton\SkeletonClass
 */
class ZayaSpaceFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'zayaspace';
    }
}
