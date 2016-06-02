<?php

namespace App\Services\Crypto;

use Illuminate\Support\Facades\Facade;

class AESFacade extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'AES';
    }
}
