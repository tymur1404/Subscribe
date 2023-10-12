@extends('layouts.app')

@section('content')
    @php
        $currentYear = date('Y');
    @endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Author edit' }}</div>
                @if (session('success_author_update'))
                    <div class="alert alert-success">
                        {{ session('success_author_update') }}
                    </div>
                @endif

                <div class="row mb-3">
                    <div class="col-md-6">
                        <a class="btn btn-primary" href={{ route('book.index') }}> {{ __('Go to list of books') }}</a>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-primary" href={{ route('author.index') }}> {{ __('Go to list of authors') }}</a>
                    </div>
                </div>
                <form action="{{ route('author.update', $author->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                        <div class="col-md-6">
                            <label>
                                <input type="text"
                                       class="form-control
                                       @error('name') is-invalid @enderror"
                                       name="name"
                                       id="name"
                                       value="{{ $author->name ?? old('name') }}"
                                       required
                                       autofocus>
                            </label>
                            @error('name')
                                <div class="small text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-8 offset-md-10">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
