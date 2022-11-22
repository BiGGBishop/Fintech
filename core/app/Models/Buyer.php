<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model {
    protected $table = "buyer_log";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function plan()
    {
        return $this->belongsTo('App\Models\Chart','plan_id');
    }
}
