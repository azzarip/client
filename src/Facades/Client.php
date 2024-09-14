<?php

namespace Azzarip\Client\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Azzarip\Client\Client
 */
class Client extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Azzarip\Client\Client::class;
    }
}
