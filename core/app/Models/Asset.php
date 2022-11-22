<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model {
    protected $table = "assets";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function plan()
    {
        return $this->belongsTo('App\Models\Chart','plan_id');
    }
}
