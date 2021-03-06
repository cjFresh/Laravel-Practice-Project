<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; //app folder, post.php file
use App\Exports\PostsExport;
use Maatwebsite\Excel\Facades\Excel;
use DB; //import to use SQL instead of ELOQUENT

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        //'except' means pages where you can let guests without accounts
        //go to these pages
        //another alternative below
        //$this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* USING ELOQUENT FOR DB OPERATIONS */
        //Post is the post.php found in app folder
        //that is pertaining to the posts table from DB

        //fetch all data from posts table
        //$posts = Post::all(); 
        
        //we can also display the fetched data in a certain order
        //$posts = Post::orderBy('created_at', 'desc')->get();
        //orderBy('column to base the order', 'asc or desc')
        
        //we can limit the number of rows we display
        //$posts = Post::orderBy('created_at', 'desc')->take(1)->get();

        //we can also use where clause
        //$posts = Post::where('title', 'Post One')->get();
        
        //pagination
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);


        /* USING SQL STATEMENTS */
        //we can also use sql statements by importing DB (use DB; at the top)
        //$posts = DB::select('SELECT * FROM posts');

        return view('posts.index')->with('posts', $posts);
    }

    public function download() 
    {
        //return Excel::download(new PostExport, 'posts.xlsx');
        //$posts = Post::all();
        return Excel::download(new PostsExport, 'posts.xlsx');
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        //store post in database
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id; //gets the id of currently logged in user
        $post->save();

        return redirect('/posts')->with('success', 'Post Created!');
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
        return view('posts.show')->with('post', $post);
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
        //Check for correct user
        if(auth()->user()->id != $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        return view('posts.edit')->with('post', $post);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        //store post in database
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated!');
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
        //Check for correct user
        if(auth()->user()->id != $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        $post->delete(); //function that deletes the whole row in db
        return redirect('/posts')->with('success', 'Post Deleted');
    }
}
