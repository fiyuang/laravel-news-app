<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
    public function createComment($data)
    {
        return Comment::create($data);
    }
}
