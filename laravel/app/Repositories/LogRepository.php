<?php

namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;
use Bosnadev\Repositories\Contracts\RepositoryInterface;

class LogRepository extends Repository
{
    public function model()
    {
        return 'App\Log';
    }
}
