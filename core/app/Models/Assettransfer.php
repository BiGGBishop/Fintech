<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assettransfer extends Model {
    protected $table = "asset_transfer";
    protected $guarded = [];

    public function sender()
    {
        return $this->belongsTo('App\Models\User','sender_id');
    }    
    public function receiver()
    {
        return $this->belongsTo('App\Models\User','receiver_id');
    }
    public function plan()
    {
        return $this->belongsTo('App\Models\Chart','asset');
    }
}
