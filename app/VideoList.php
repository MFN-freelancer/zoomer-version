<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoList extends Model
{
    //
    protected $fillable = [
        'video_title','video_description', 'video_url', 'video_cover','video_category', 'video_time', 'downloaded_number', 'downloaded_date', 'ratings','like','dislike', 'comment','video_approve', 'user_id'
    ];

}
