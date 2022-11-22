<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exchange extends Model {
    protected $table = "exchange_log";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\Chart','user_id');
    }

    public function from()
    {
        return $this->belongsTo('App\Models\Chart','frome');
    }    
    
    public function to()
    {
        return $this->belongsTo('App\Models\Chart','toe');
    }
}
