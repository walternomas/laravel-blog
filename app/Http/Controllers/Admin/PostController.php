<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
	public function index()
	{
		return view('admin.posts.index');
	}

	public function create()
	{
		$categories = Category::pluck('name', 'id');
		$tags = Tag::all();

		return view('admin.posts.create', compact('categories', 'tags'));
	}

  public function store(PostRequest $request)
  {
    $post = Post::create($request->all());

    if ($request->file('file')) {
      $url = Storage::put('posts', $request->file('file'));

      $post->image()->create([
        'url' => $url
      ]);
    }

    if($request->tags){
      $post->tags()->attach($request->tags);
    }

    return redirect()->route('admin.posts.edit', $post);
  }

	public function show(Post $post)
	{
		return view('admin.posts.show', compact('post'));
	}

	public function edit(Post $post)
  {
    $categories = Category::pluck('name', 'id');
		$tags = Tag::all();

		return view('admin.posts.edit', compact('post', 'categories', 'tags'));
  }
	public function update(PostRequest $request, Post $post)
  {
    $post->update($request->all());

    if($request->file('file')) {
      $url = Storage::put('posts', $request->file('file'));

      if($post->image) {
        Storage::delete($post->image->url);

        $post->image->update([
          'url' => $url
        ]);
      } else {
        $post->image()->create([
          'url' => $url
        ]);
      }
    }

    if($request->tags){
      $post->tags()->sync($request->tags);
    }

    return redirect()->route('admin.posts.edit', $post)->with('info', 'El post se scatulizó con éxito');
  }

	public function destroy(Post $post)
  {
    $post->delete();

    return redirect()->route('admin.posts.index')->with('info', 'El post se eliminó con éxito');
  }

}
