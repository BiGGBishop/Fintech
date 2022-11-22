<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model {
    protected $table = "loan";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }    
    
    public function bnk()
    {
        return $this->belongsTo('App\Models\Bank','user_id');
    }
}
