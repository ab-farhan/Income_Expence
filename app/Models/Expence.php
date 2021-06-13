<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expence extends Model
{
    use HasFactory;
    protected $primaryKey='expence_id';

    public function expCateRela(){
       return $this->belongsTo('App\Models\ExpenceCategory','expence_cretegory_id','expence_cretegory_id');
    }
    
}
