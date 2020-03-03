<?php

namespace App\Gates;

class PostGates
{

    public function editPost($user, $post_id)
    {
        return $user->id === $post_id;
    }

    public function deletePost($user, $post_id)
    {
        return $user->id === $post_id;
    }
}
