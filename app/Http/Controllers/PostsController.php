<?php

namespace App\Http\Controllers;

use App\Exceptions\RequestException;
use App\Post;
use App\Tag;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Tag\TagRepositoryInterface;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{

    private $postRepository;
    private $tagRepository;

    public function __construct(PostRepositoryInterface $postRepository, TagRepositoryInterface $tagRepository)
    {
        $this->postRepository = $postRepository;
        $this->tagRepository = $tagRepository;
    }


    public function index()
    {
        //@todo 後でpaginationを追加する
        // $posts = $this->postRepository->getDateAllpaginate();
        $posts = $this->postRepository->getDateAllpaginate();
        $conPosts = $this->postRepository->getAllpaginate();
        $tags = $this->tagRepository->getAll();
        return view('posts.index',[ 'posts' => $posts, 'conPosts' => $conPosts, 'tags' => $tags]);
    }

    public function create()
    {
        $prefs = config('prefs');
        $tags = $this->tagRepository->getAll();
        return view('posts.create')->with(['prefs' => $prefs, 'tags' => $tags]);
    }

    public function show(Request $request)
    {
        $posts = $this->postRepository->getUserPosts($request->user());
        return view('posts.show',[ 'posts' => $posts]);
    }

    public function store(PostRequest $request)
    {
        $this->postRepository->createUserPost($request->user(), $request->all());
        return redirect('/posts');
    }

    public function destroy($id)
    {
        $this->postRepository->delete($id);
        return redirect('/posts');
    }

    public function edit($id)
    {
        $prefs = config('prefs');
        $tags = $this->tagRepository->getall();
        $post=$this->postRepository->getById($id);
        return view('posts.edit', with(['post' => $post,'prefs' => $prefs, 'tags' => $tags]));
    }

    public function update($id, PostRequest $request, Post $post)
    {
        $post = $this->postRepository->updateFromRequest($id, $request->all());
        return redirect('/posts');
    }

    public function search(Request $request)
    {
        $posts = $this->postRepository->SearchDateandPrefectures(
              $request->input('first_date'),
              $request->input('end_date'),
              $request->input('prefs')
        );
        return view('posts.search',[ 'posts' => $posts]);
    }

}
