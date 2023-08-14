<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\News;
use App\Http\Requests\NewsRequest;
use App\Http\Resources\NewsResource;
use App\Repositories\NewsRepository;

class NewsController extends Controller
{
    protected $newsRepository;

    public function __construct()
    {
        $this->newsRepository = new NewsRepository;
    }

    public function store(NewsRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store("news_images", 'public');
        }

        $data['image'] = $imagePath ?? null;
        $data['created_by'] = Auth::id();

        $news = $this->newsRepository->create($data);

        return new NewsResource($news);
    }
}
