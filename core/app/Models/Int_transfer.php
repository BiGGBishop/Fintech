<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Int_transfer extends Model {
    protected $table = "int_transfer";
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
