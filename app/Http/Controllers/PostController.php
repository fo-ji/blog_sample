<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Read;
use App\Favorite;
use Auth;
use DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        $user_id = Auth::id();

        $favorites = DB::table('favorites')
                        ->join('posts', 'posts.id', '=', 'favorites.post_id')
                        ->join('users', 'users.id', '=', 'favorites.user_id')
                        ->where('favorites.user_id', '=', $user_id)
                        ->get();

        return view('posts.index', [
            'posts' => $posts,
            'favorites' => $favorites,
        ]);
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
    public function store(PostRequest $request)
    {
        $post = new Post;

        $post -> title = $request -> title;
        $post -> body = $request -> body;
        $post -> user_id = Auth::id();

        $post -> save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        $read = Read::where('post_id', $id)->where('user_id', Auth::id())->first();

        return view('posts.show', [
            'post' => $post,
            'read' => $read
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 既読機能
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function read($id)
    {
        $read = Read::where('post_id', $id)->where('user_id', Auth::id())->first();

        if (is_null($read)) {
            Read::create([
                'read' => true,
                'post_id' => $id,
                'user_id' => Auth::id(),
            ]);

            return redirect()->back();

        } else {
            $read->read = !$read->read;
            $read->save();

            return redirect()->back();
        }
    }

    /**
     * 引数のIDに紐づく投稿をお気に入りに登録する
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function favorite($id)
    {
        Favorite::create([
            'post_id' => $id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back();
    }

    /**
     * 引数のIDに紐づく投稿をお気に入りから解除する
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unfavorite($id)
    {
        $favorite = Favorite::where('post_id', $id)->where('user_id', Auth::id())->first();
        $favorite->delete();
        
        return redirect()->back();
    }
}
