<?php

namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;
use Bosnadev\Repositories\Contracts\RepositoryInterface;

class UserRepository extends Repository
{
    public function model()
    {
        return 'App\User';
    }
}
