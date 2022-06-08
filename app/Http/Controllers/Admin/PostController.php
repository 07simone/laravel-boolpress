<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(20);
        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $request->validate(
            [
                'Titolo' => 'required|min:5|max:255',
                'Autore' => 'required|min:5|max:255',
                'Descrizione' => 'required|min:5|max:255',
                'img' => 'required|min:5|max:255',
                'data' => 'required|min:5|max:255',

            ],
            [
                'required' => 'questo campo è obbligatorio',            // messaggio di errore
            ]
        );
        $data['user_id'] = Auth::user()->id;
        $newPost = new Post();
        $newPost->img = Storage::put('uploads', $data['img']);
        $newPost->Titolo = $data['Titolo'];
        $newPost->Autore = $data['Autore'];
        $newPost->Descrizione = $data['Descrizione'];
        $newPost->Data = $data['Data'];
        $newPost->save();

        $newPost->categories()->attach($data['category']);

        return redirect()->route('admin.posts.show', $newPost)->with('message', 'Post aggiunto con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $post->img = $data['img'];
        $post->Titolo = $data['Titolo'];
        $post->Autore = $data['Autore'];
        $post->Descrizione = $data['Descrizione'];
        $post->Data = $data['Data'];
        $post->categories()->sync($data['category']);
        $post->save();

        return redirect()->route('admin.posts.show', $post->id)->with('message', 'Post modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('deleted-message', 'Post eliminato');
    }
}
