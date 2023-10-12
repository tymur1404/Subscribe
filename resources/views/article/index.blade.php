@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Authors' }}</div>
                @if (session('success_$article_create'))
                    <div class="alert alert-success">
                        {{ session('success_article_create') }}
                    </div>
                @endif
                <div class="row mb-3">

                    <div class="col-md-6">
                        <a class="btn btn-primary" href={{ route('article.index') }}> {{ __('Go to List of Books') }}</a>
                    </div>
                </div>
                <table id="userTable" class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->content }}</td>
                            <td>
                                <div class="col-md-8 ">
                                    <a class="btn btn-primary" href={{ route('article.edit', $article->id) }}> {{ __('Edit') }}</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-6">
                        {{$articles->withQueryString()->links()}}
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-success" href={{ route('article.create') }}> {{ __('Create') }}</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
