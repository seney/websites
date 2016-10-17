<?php
/**
 * User: Seney SEAN
 * Date: 10/10/2016
 * Time: 7:56 PM
 */

namespace app\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Post;

class PagesController extends Controller
{
    public function getIndex(){
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.index')->withPosts($posts);
    }

    public function getAbout(){
        $first = 'Seney';
        $last = 'SEAN';
        $fullname = $first.' '.$last;
        $email = 'seney.sean@hqgtrading.com';
//        return view('pages.about')->with('fullname', $full);
//        return view('pages.about')->withFullname($fullname)->withEmail($email);
        $data=[];
        $data['fullname'] = $fullname;
        $data['email'] = $email;
//        return view('pages.about')->withData($data);
        return view('pages.about', $data);
    }

    public function getContact(){
        return view('pages.contact');
    }
}