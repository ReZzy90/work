<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file contains all the routes for managing articles using session.
| No database or JSON files required.
|
*/

// --- Session-based article helper functions ---
function getArticles()
{
    if (!session()->has('articles')) {
        session([
            'articles' => [
                [
                    'id' => 0,
                    'title' => 'First article',
                    'content' => 'This is the first article',
                    'category' => 'news',
                ],
                [
                    'id' => 1,
                    'title' => 'Second article',
                    'content' => 'This is the second article',
                    'category' => 'tech',
                ]
            ]
        ]);
    }

    return session('articles');
}

function saveArticles($articles)
{
    session(['articles' => $articles]);
}

// --- Routes ---

Route::get('/', fn() => redirect()->route('articles'))->name('home');

Route::get('/articles', function () {
    return view('articles.index', ['data' => getArticles()]);
})->name('articles');

Route::get('/articles/add', function () {
    return view('articles.add');
})->name('article.add');

Route::post('/articles/add', function (Request $request) {
    $articles = getArticles();
    $id = count($articles);

    $articles[] = [
        'id' => $id,
        'title' => $request->title,
        'content' => $request->content,
        'category' => $request->category,
    ];

    saveArticles($articles);
    return redirect()->route('articles');
})->name('article.store');

Route::get('/articles/edit/{id}', function ($id) {
    $articles = getArticles();

    if (!isset($articles[$id])) {
        abort(404);
    }

    return view('articles.edit', ['data' => $articles[$id]]);
})->name('article.edit');

Route::post('/articles/edit/{id}', function (Request $request, $id) {
    $articles = getArticles();

    if (!isset($articles[$id])) {
        abort(404);
    }

    $articles[$id]['title'] = $request->title;
    $articles[$id]['content'] = $request->content;
    $articles[$id]['category'] = $request->category;

    saveArticles($articles);
    return redirect()->route('articles');
})->name('article.update');

Route::get('/articles/delete/{id}', function ($id) {
    $articles = getArticles();

    if (!isset($articles[$id])) {
        abort(404);
    }

    unset($articles[$id]);
    $articles = array_values($articles); // Reindex to avoid gaps in array keys

    saveArticles($articles);
    return redirect()->route('articles');
})->name('article.delete');

Route::get('/articles/{id}', function ($id) {
    $articles = getArticles();

    if (!isset($articles[$id])) {
        abort(404);
    }

    return view('articles.article', ['data' => $articles[$id]]);
})->name('article');
