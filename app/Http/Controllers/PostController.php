<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();

        return view('index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posts = new Post();
        $request->validate([
            'name'=>'required',
            'detail'=>'required',
            'author'=>'required'
        ]);
        Post::create([
            'name'=>$request->name,
            'detail'=>$request->detail,
            'author'=>$request->author
        ]);
        if($posts) {
            $red = redirect('posts')->with('success', 'success');
        }
        else {
            $red = redirect('posts')->with('fail', 'error');
        }

        return $red;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('edit',)->with('post', $post);
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
        $posts = Post::find($id);
        $request->validate([
            'name'=>'required',
            'detail'=>'required',
            'author'=>'required'
        ]);
        $posts->name = $request->name;
        $posts->detail = $request->detail;
        $posts->author = $request->author;
        $posts->save();
        if($posts) {
            $red = redirect('posts')->with('success', 'success');
        }
        else {
            $red = redirect('posts/edit/'.$id)->with('fail', 'error');
        }

        return $red;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();
        $red = redirect('posts');
        return $red;
    }
}
