<?php

namespace Rinjax\LaraHelper\Managers;

use Illuminate\Support\Facades\Facade;


class HelperManagerFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'rinjaxHelper'; }
}