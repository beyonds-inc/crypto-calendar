<?php

namespace App\Repositories\Tag;

use App\Tag;
use App\User;

/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 09-Jan-18
 * Time: 10:13 PM
 */

class TagRepository implements TagRepositoryInterface
{
    /**
     * @var Tag
     */
    private $tag;


    /**
     * EloquentTag constructor.
     * @param Tag $tag
     */
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function getAll()
    {
        return $this->tag->get();
    }

}
