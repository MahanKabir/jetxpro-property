<?php

namespace JetXPro\Property;

use Illuminate\Support\Facades\Facade;

class PropertyFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'property';
    }
}