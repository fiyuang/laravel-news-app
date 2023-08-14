<?php

namespace App\Repositories;

use App\Models\News;

class NewsRepository
{
    public function create($data)
    {
        return News::create($data);
    }
}
