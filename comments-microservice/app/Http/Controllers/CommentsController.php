<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentsController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $entityType = $request->query('entityType');
        $entityId = $request->query('entityId');

        if (! $entityType || ! $entityId) {
            return new JsonResponse(
                [
                    'error' => 'Entity should be specified!'
                ],
                Response::HTTP_BAD_REQUEST
            );
        }

        $comments = Comment::query()
            ->where('entity_type', $entityType)
            ->where('entity_id', $entityId)
            ->get();

        return new JsonResponse($comments);
    }

    public function show(string $id): JsonResponse
    {
        return new JsonResponse(
            Comment::query()->findOrFail($id)
        );
    }

    public function store(Request $request): JsonResponse
    {
        $comment = Comment::query()->create($request->all());

        return new JsonResponse($comment, Response::HTTP_CREATED);
    }

    public function update(string $id, Request $request): JsonResponse
    {
        $comment = Comment::query()->findOrFail($id);
        $comment->update($request->all());

        return new JsonResponse($comment, Response::HTTP_OK);
    }

    public function destroy(string $id): JsonResponse
    {
        Comment::query()->findOrFail($id)->delete();

        return new JsonResponse(
            [
                'error' => 'Deleted Successfully'
            ],
            Response::HTTP_NO_CONTENT
        );
    }
}
