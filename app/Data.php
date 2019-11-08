<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    //
    protected $fillable = ['name', 'gender', 'dateFrom', 'dateTo'];

    public function skill(){
        return $this->belongsTo('App\Skill', 'dataid');
    }

    public function dokumen(){
        return $this->belongsTo('App\DataDokumen', 'dataid');
    }

    // public function cat(){
    //     return $this->belongsToMany('App\Category', 'cat_post', 'postid', 'catid')->withTimestamps();
    // }
}
