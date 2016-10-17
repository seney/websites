<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Illuminate\Support\Facades\Redirect;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param null $per_page
     * @return \Illuminate\Http\Response
     * @internal param null $perPage
     */
    public function index($perPage = null)
    {
        if($perPage == null)
            $perPage = 5;
        //create a variable and store all the blog posts
        $posts = Post::orderBy('id', 'desc')->paginate($perPage);

        //return view with above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'body' => 'required'
        ));

        //store in db
        $post = new Post;
        $post->title=$request->title;
        $post->body=$request->body;
        $post->save();

        Session::flash('success', 'The blog post was successfully saved!');

        //redirect to other page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find data by id store in a var
        $post = Post::find($id);
        //give to view to display
        return view('posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'body' => 'required'
        ));

        //Save the data to database
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        //Set flash with success message
        Session::flash('success', 'This post was successfully changed!');

        //redirect with the flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        //Set flash with success message
        Session::flash('success', 'This post was successfully deleted!');

        return redirect()->route('posts.index');
    }
}
