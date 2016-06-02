<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slave extends Model {

    protected $table = 'slaves';
    protected $fillable = ['ip', 'name'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function logs()
    {
        return $this->hasMany("App\Log");
    }

    public function dumps()
    {
        return $this->hasMany("App\Dump");
    }

}
