<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    use \App\Traits\searchFilters;

    private function getValidators($model) {
        return [
            'title' => 'required|min:3|max:255',
            'slug' => [
                'required',
                'min:3',
                'max:100',
                Rule::unique('post')->ignore($model)
            ],
            'body' => 'required|min:3',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
            'tags' => 'required|exists:tags,id'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $postsQuery = $this->composeQuery($request);
        $posts = $postsQuery->paginate(20);

        return view('admin.posts.index', [
            'posts' => $posts,
            'categories' => Category::all(),
            'users' => User::all(),
            'request' => $request
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getValidators(null));

        $formData = $request->all() + ['user_id' => auth()->id()];
        $tags = explode(' ', $formData['tags']);

        $formData['tags'] = [];

        foreach ($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag, 'slug' => Str::slug($tag)]);
            $formData['tags'][] = $tag->id;
        }

        $post = Post::create($formData);
        $post->tags()->attach($formData['tags']);

        return redirect()->route('admin.posts.index', $post->slug)->with('status', 'Your post has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (auth()->id() !== $post->user_id) abort(403);

        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if(auth()->id() !== $post->user_id) abort(403);

        $request->validate($this->getValidators($post));

        $post->update($request->all());
        $post->tags()->sync($request->tags);

        return redirect()->route('admin.posts.edit', $post->slug)->with('status', 'Your post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(auth()->id() !== $post->user_id) {
            abort(403);
        }
        $previousUrl = url()->previous();

        if ($previousUrl === route('admin.posts.edit', $post->slug)) {
            $previousUrl = route('admin.posts.index');
        }

        $post->delete();

        return redirect($previousUrl)->with('status', 'Your post has been deleted');
    }

    public function myindex()
    {
        $posts = Post::where('user_id', auth()->id())->paginate(25);
        return view('admin.posts.index', compact('posts'));
    }
}
