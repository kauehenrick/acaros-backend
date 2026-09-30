<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Genre;

class DashboardController extends Controller
{
    public function index()
    {
        $booksByGenre = Genre::query()
            ->withCount('books')
            ->orderByDesc('books_count')
            ->limit(5)
            ->get()
            ->map(fn($genre) => [
                'name' => $genre->name,
                'value' => $genre->books_count,
            ]);

        $topAuthors = Author::query()
            ->withCount('books')
            ->orderByDesc('books_count')
            ->limit(5)
            ->get()
            ->map(fn($author) => [
                'name' => $author->name,
                'books' => $author->books_count,
            ]);

        return response()->json([
            'booksByGenre' => $booksByGenre,
            'topAuthors' => $topAuthors,
        ]);
    }
}
