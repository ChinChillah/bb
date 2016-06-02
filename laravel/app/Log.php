<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model {

    protected $table = 'logs';
    protected $fillable = ['slave_id', 'data'];
    protected $guarded = ['created_at', 'updated_at'];

    public function getDataAttribute($value)
    {
        return unserialize(base64_decode($value));
    }

    public function slave()
    {
        return $this->belongsTo("App\Slave");
    }

}
