<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Services\UserService
 */
class UserFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'user-service';
    }
}
