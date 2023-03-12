<?php

namespace App\Http\Controllers;



use App\Models\Book;
use App\Services\CommentsApiClient;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BooksController extends Controller
{
    public function __construct(
        private readonly CommentsApiClient $commentsApiClient = new CommentsApiClient()
    ) {
    }

    public function index(): JsonResponse
    {
        return new JsonResponse(Book::all());
    }

    /**
     * @throws GuzzleException
     */
    public function show(string $id): JsonResponse
    {
        $book = Book::query()->findOrFail($id);

        $book->comments = $this->commentsApiClient->get(
            $book->getMorphClass(), $book->id
        );

        return new JsonResponse($book);
    }

    public function store(Request $request): JsonResponse
    {
        $book = Book::query()->create($request->all());

        return new JsonResponse($book, Response::HTTP_CREATED);
    }

    public function update(string $id, Request $request): JsonResponse
    {
        $book = Book::query()->findOrFail($id);
        $book->update($request->all());

        return new JsonResponse($book, Response::HTTP_OK);
    }

    public function destroy(string $id): JsonResponse
    {
        Book::query()->findOrFail($id)->delete();

        return new JsonResponse(
            [
                'error' => 'Deleted Successfully'
            ],
            Response::HTTP_NO_CONTENT
        );
    }
}
