<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Save extends Model {
    protected $table = "savings";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
