<?php

namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;
use Bosnadev\Repositories\Contracts\RepositoryInterface;

class SlaveRepository extends Repository
{
    public function model()
    {
        return 'App\Slave';
    }

    public function findOrCreate($ip, $name)
    {
        $slave = $this->model->where('ip', $ip)->where('name', $name)->first();
        if( $slave ) return $slave;
        return $this->model->create(['ip' => $ip, 'name' => $name]);
    }
}
