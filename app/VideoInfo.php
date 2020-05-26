<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoInfo extends Model
{
    //
    protected $fillable = [
       "comments", "views", "likes", "dislikes", "video_id"
    ];
}
