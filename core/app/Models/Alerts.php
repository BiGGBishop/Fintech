<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alerts extends Model {
    protected $table = "alerts";
    protected $guarded = [];
    public function transfers()
    {
        return $this->hasMany('App\Model\Transfer', 'ref_id');
    }
}
