<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 09-Jan-18
 * Time: 10:07 PM
 */

 namespace App\Repositories\Post;

 use App\User;


interface PostRepositoryInterface
{

    //投稿順
    public function getAllpaginate();

    //日付順
    public function getDateAllpaginate();

    public function getUserPosts(User $user);

    public function getById($id);

    public function create(array $attributes);

    public function updateFromRequest($id, array $parameters);

    public function delete($id);

    public function createUserPost(User $user, array $parameters);

    public function SearchDateandPrefectures($first_date, $end_date, $prefectures);
}
