<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dump extends Model {

    protected $table = 'dumps';
    protected $fillable = ['slave_id', 'data'];
    protected $guarded = ['created_at', 'updated_at'];

    public function getDataAttribute($value)
    {
        return nl2br(unserialize(base64_decode($value)));
    }

    public function slave()
    {
        return $this->belongsTo("App\Slave");
    }

}
