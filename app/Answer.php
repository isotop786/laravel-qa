<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    

    public function questions()
    {
        return $this->belongsTo(Question::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }

}
