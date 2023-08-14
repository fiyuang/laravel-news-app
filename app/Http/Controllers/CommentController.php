<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Repositories\CommentRepository;
use App\Jobs\ProcessComment;
use App\Models\Comment;
use App\Models\News;

class CommentController extends Controller
{
    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function store(CommentRequest $request, $newsId)
    {
        $this->authorize('create', Comment::class);

        $news = News::where("uuid", $newsId)->first();

        $commentData = $request->validated();
        $commentData['uuid'] = Str::uuid()->toString();
        $commentData['created_by'] = Auth::id();
        $commentData['news_id'] = $news->id;

        $comment = $this->commentRepository->createComment($commentData);

        // Queue comment creation process
        ProcessComment::dispatch($comment);

        return new CommentResource($comment);
    }
}
