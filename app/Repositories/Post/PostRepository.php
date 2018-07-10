<?php

namespace App\Repositories\Post;

use App\Post;
use App\User;

/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 09-Jan-18
 * Time: 10:13 PM
 */

class PostRepository implements PostRepositoryInterface
{
    /**
     * @var Post
     */
    private $post;


    /**
     * EloquentPost constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getAllpaginate(int $limit = 8)
    {
        return $this->post->where('date', '>', date("Y-m-d"))->orderBy('created_at', 'desc')->paginate($limit);
    }

    public function getDateAllpaginate(int $limit = 10)
    {
        return $this->post->where('date', '>', date("Y-m-d"))->orderBy('date', 'asc')->paginate($limit);
    }

    public function getById($id)
    {
        return $this->post->findOrFail($id);
    }

    public function getUserPosts(User $user)
    {
        return $this->post->where('user_id', $user->id)->orderBy('created_at', 'asc')->get();
    }

    public function create(array $attributes)
    {
        return $this->post->create($attributes);
    }

    public function updateFromRequest($id, array $parameters)
    {
        $post = $this->post->findOrFail($id);
        $post->update($parameters);
        $post->tags()->sync($parameters['tags']);
    }

    public function delete($id)
    {
        $this->getById($id)->delete();
        return true;
    }

    public function createUserPost(User $user, array $parameters)
    {
        $post = $user->posts()->create($parameters);
        $post->tags()->attach($parameters['tags']);
    }

    public function SearchDateandPrefectures($first_date, $end_date, $prefectures)
    {
        return $this->post->dateGreaterThan($first_date)->dateLessThan($end_date)->prefecturesEqual($prefectures)->orderBy('date', 'asc')->paginate(10);
    }

}
