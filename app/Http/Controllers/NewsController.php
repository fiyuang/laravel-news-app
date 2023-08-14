<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
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

    public function index()
    {
        $news = News::with('user')->paginate(5);

        return NewsResource::collection($news);
    }

    public function show($id)
    {
        $news = News::with('user')->where("uuid", $id)->first();

        return new NewsResource($news);
    }

    public function store(NewsRequest $request)
    {
        $this->authorize('create', News::class);

        $data = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store("news_images", 'public');
        }

        $data['uuid'] = Str::uuid()->toString();
        $data['image'] = $imagePath ?? null;
        $data['created_by'] = Auth::id();

        $news = $this->newsRepository->create($data);

        return new NewsResource($news);
    }

    public function update(NewsRequest $request, $id)
    {
        $this->authorize('update', News::class);

        $data = $request->validated();

        $news = News::where("uuid", $id)->first();

        if ($request->hasFile('image')) {
            if ($news->image_path) {
                Storage::disk('public')->delete($news->image_path);
            }

            $imagePath = $request->file('image')->store("news_images", 'public');
            $data['image_path'] = $imagePath;
        }

        $news->update($data);

        return response([ 
            'data' => new NewsResource($news), 
            'message' => 'News updated successfully'
        ], 200);
    }

    public function destroy($id)
    {
        $this->authorize('delete', News::class);

        $news = News::where("uuid", $id)->first();

        // Delete the associated image if it exists
        if ($news->image_path) {
            Storage::disk('public')->delete($news->image_path);
        }

        $news->delete();

        return response()->json(['message' => 'News deleted successfully']);
    }
}
