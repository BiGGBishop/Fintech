<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model {
    protected $table = "seller_log";
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
