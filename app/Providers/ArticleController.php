<?php

namespace App\Providers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller
{
    const COUNT_SUBSCRIPTION_ON_PAGE = 10;

    public function index(): View
    {
        $articles = Article::paginate(self::COUNT_SUBSCRIPTION_ON_PAGE);

        return view('article.index', compact('articles'));
    }

    public function create(): View
    {
        return view('article.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        Article::create($data);

        return to_route('article.index')->with('success_article_create', 'Article successfully created');
    }

    public function show(Article $article): View
    {
        return view('article.show', compact('article'));
    }

    public function edit(Article $article): View
    {
        return view('article.edit', compact('article'));
    }

    public function update(UpdateRequest $request, Article $article): RedirectResponse
    {
        $data = $request->validated();
        $article->update($data);

        return to_route('subscription.edit', $article->id)->with('success_article_update', 'Article successfully updated');
    }

    public function destroy(Article $article): RedirectResponse
    {
        if($article->delete())
        {
            return to_route('article.index')->with('success_article_delete', 'Article successfully deleted');
        }

        return to_route('article.show', $article->id)->with('error_article_delete', 'The subscription was not deleted');
    }
}
