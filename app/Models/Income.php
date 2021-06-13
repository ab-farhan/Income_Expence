<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model{
    use HasFactory;
    protected $primaryKey='income_id';

    public function inCateRela(){
        return $this->belongsTo('App\Models\inomeCategory','income_cate_id','income_cretegory_id');
    }

    
}
