<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Illuminate\Support\Facades\Auth;
use App\VideoList;
use App\VideoInfo;
class FrontController extends Controller
{
    //
    public function index(){
        $videos = VideoList::where('video_approve','approved')->orderBy('created_at', 'DESC')->paginate('6');
        $cats = VideoList::where('video_approve','approved')->groupBy('video_category')->select('video_category')->get();
        $total_video = VideoList::where('video_approve','approved')->select('id')->count();
        $total_download = VideoList::where('video_approve','approved')->select('downloaded_number')->sum("downloaded_number");

        return view('home', compact('videos', 'cats', 'total_video', 'total_download'));
    }
    public function whatNew(){
        $new_videos = VideoList::where('video_approve','approved')->orderBy('created_at', 'DESC')->paginate(8);
        return view('whats-new', compact('new_videos'));
    }
    public function whatHot(){
        $hot_videos = VideoList::where('video_approve','approved')->orderBy('ratings', 'DESC')->paginate(10);
        return view('whats-hot', compact('hot_videos'));
    }
    Public function player($id){
//        $this->middleware('auth');
        $view = VideoList::where('id',$id)->select('video_view')->get();
        $views=$view[0]->video_time+1;
        VideoList::where('id','=',$id)->update(['video_view'=>$views]);
        $video = VideoList::where('id','=',$id)->get();
        $user = User::whereId($video[0]->user_id)->get();
        $comments = VideoInfo::where('video_id', $id)->get();
        return view('video-player', compact('video', 'user', 'views', 'comments'));
    }

    public function videoInfo($id){
        $download=VideoList::where('id',$id)->get();
        $downloads = $download[0]->downloaded_number+1;
        VideoList::where('id',$id)->update(['downloaded_number'=>$downloads]);
        echo $download[0]->video_url;
    }
    public function like(Request $request){
        $id = $request->input('id');
        $like = VideoList::where('id', $id)->select('likes')->get();
        $likes = $like[0]->likes+1;
        VideoList::where('id', $id)->update(['likes'=>$likes]);
//        echo $likes;
    }
    public function dislike(Request $request){
        $id = $request->input('id');
        $dislike = VideoList::where('id', $id)->select('dislikes')->get();
        $dislikes = $dislike[0]->dislikes+1;
        VideoList::where('id', $id)->update(['dislikes'=>$dislikes]);
//        echo $dislikes;
    }
    public function comment(Request $request){
        $videoId = $request->input('video_id');
        $comment = $request->input('comment');
        VideoInfo::insert(['comments'=>$comment, 'video_id'=>$videoId]);
        return back();
    }
}
