@extends('layouts.app')

@section('content')
@php
    $currentYear = date('Y');
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Author create' }}</div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <a class="btn btn-primary" href={{ route('book.index') }}> {{ __('Back') }}</a>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-primary" href={{ route('author.index') }}> {{ __('Go to List of Authors') }}</a>
                    </div>
                </div>
                <form action="{{ route('author.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Title</label>

                        <div class="col-md-6">
                            <label>
                                <input type="text"
                                       class="form-control
                                       @error('name') is-invalid @enderror"
                                       name="name"
                                       id="name"
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
                            <button type="submit" class="btn btn-success">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
