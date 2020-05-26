<?php

namespace App\Http\Controllers;

use App\User;
use App\VideoList;
use Illuminate\Http\Request;
use File;
use Pawlox\VideoThumbnail\Facade\VideoThumbnail;
use Session;
use Illuminate\Support\Facades\Auth;
use function Sodium\compare;

class VideoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        $total_uploads = VideoList::select('id')->count();
        $total_downloads = VideoList::select('downloaded_number')->sum('downloaded_number');
        $total_users = User::select('id')->count();
        $video_lists = VideoList::all();
//        only user data
        $user_downloads = VideoList::where('user_id', $user->id)->count();
        $user_videos = VideoList::where('user_id', $user->id)->get();
//        dd($user_downloads);
        if ($user->is_user()){
            return view('admin.downloaded', compact('user_downloads', 'user_videos'));
        }
        else {
            return view('admin.dashboard',compact('total_uploads','total_downloads', 'total_users', 'video_lists'));
        }
    }
    public function approve($id){
        VideoList::where('id','=',$id)->update(['video_approve'=>'approved']);
        return back();
    }
    public function showAddboard(){
        return view('admin.add');
    }
    public function addVideo(Request $request){
        $title = $request->input('video_name');
        $description = $request->input('video_description');
        $tag = $request->input('video_category');
//        $request->file('video_file');

//        $d=VideoThumbnail::createThumbnail(public_path('uploaded_video/oceans.mp4'), public_path('cover_images'),'movie.jpg', 2, 1920, 1080);
//dd($d);
//        if ($request->hasFile('video_cover')){
//            $cover_image = $request->file('video_cover')->getClientOriginalName();
//            $request->file('video_cover')->move(public_path('cover_images'), $cover_image);
//        }
        if ($request->hasFile('video_file')){
            $video_url = $request->file('video_file')->getClientOriginalName();
            $request->file('video_file')->move(public_path('uploaded_video'), $video_url);
        }
        $form_data=array(
            'video_title'=>$title,
            'video_description'=>$description,
            'video_category'=>$tag,
            'video_cover'=>"default.png",
            'video_url'=>$video_url,
            'video_approve'=>'pending',
            'user_id'=>Auth::user()->id,
            );
//        dd($form_data);
        VideoList::create($form_data);
        return back();
    }
    public function editShow(){
        $user = Auth::user();
        if (!$user->is_admin()){
            return back();
        }
        $video_data = VideoList::paginate(5);
        return view('admin.edit', compact('video_data'));
    }
    Public function editDelete($id){
        $user = Auth::user();
        if (!$user->is_admin()){
            return back();
        }
        $video = VideoList::where('id',$id)->get();
        $video_path = public_path().'/uploaded_video/'.$video[0]->video_url;
        $video_cover='default.png';
        if ($video[0]->video_cover != "default.png"){
            $video_cover = public_path().'/cover_images/'.$video[0]->video_cover;
        }
        if (File::exists($video_path)) {
            unlink($video_path);
            if ($video_cover!='default.png')unlink($video_cover);
        }
        VideoList::whereId($id)->delete();
        Session::flash('message','Successful Deleted!');
        return back();
    }

}
