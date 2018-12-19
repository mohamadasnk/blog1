<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use Illuminate\Http\Request;
use Session;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=> ['index','show']]);
    }


    public function index()
    {
        $post=Post::orderBy('created_at', 'asc')->paginate(2);


//           $post= Post::all();
        return view('posts.index')->with('post',$post);

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
        $this->validate($request,[
           'title'=>'required',
           'body'=>'required',
            'image'=>'image|nullable'
        ]);

        if ($request->hasFile('image')){

            $fullImage=$request->file('image')->getClientOriginalName();
            $filename=pathinfo($fullImage,PATHINFO_FILENAME);
            $ext=$request->file('image')->getClientOriginalExtension();
            $fileNameToStore= $filename. '_'. time(). '.'. $ext;
            $path=$request->file('image')->storeAs('public/images',$fileNameToStore);

        }else{

            $fileNameToStore= 'noimage.jpg';

        }

        $post=new Post();
        $post->title=$request->input('title');
        $post->body=$request->input('body');

        $post->user_id=\Auth::user()->id;
        $post->image=$fileNameToStore;
        $post->save();

        return redirect('/posts')->with('ok','Your Post is created');





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        return view('posts.edit')->with('post',$post);
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
        $this->validate($request,[
           'title'=>'required',
           'body'=>'required'


        ]);

        $post=Post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->update();

        return redirect('/posts/'. $post->id)->with('post',$post);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function destroy($id)
    {
        $post= Post::find($id);
        $post->delete();

        return redirect('/posts')->with('ok', 'Your post is deleted');
    }

    public function postlike($id){



        $like= new Like();
        $like->post_id=$id;
        $like->user_id = auth()->user()->id;

        $like->save();
        return redirect('posts/'.$id);


    }


}
