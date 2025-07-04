<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Dictionary extends Model
{
    use HasFactory;

    protected $fillable = ['keyword','description'];



    public function scopeKeywordSearch($query, $keyword)
    {
        if(!empty($keyword)){
            $query->where(function($q) use ($keyword) {
                $q->where('keyword','like','%'.$keyword.'%')->orWhere('description','lile','%'.$keyword.'%');

            });
        }
    }

}
