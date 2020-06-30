<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Question extends Model
{
    protected $fillable = ['title','body'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title']=$value;
        // to converting to slug type in database
        $this->attributes['slug']=str_slug($value);
    }
    
    public function getUrlAttribute()
    {
        return route("questions.show",$this->slug);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    //Creating a status Accessor

    public function getStatusAttribute()
    {
        if($this->answer >0){

            if($this->best_answer_id)
            {
                return "answer-accepted";
            }

            return "answered";
        }

        return "unanswerd";
    }


    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

}
