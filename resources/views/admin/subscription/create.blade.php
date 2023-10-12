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
                        <a class="btn btn-primary" href={{ route('subscription.index') }}> {{ __('Back') }}</a>
                    </div>
                </div>
                <form action="{{ route('subscription.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

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

                    <div class="row mb-3 mt-3">
                        <label for="price" class="col-md-4 col-form-label text-md-end">Price</label>

                        <div class="col-md-6">
                            <label>
                                <input type="text"
                                       class="form-control
                                       @error('price') is-invalid @enderror"
                                       name="price"
                                       id="price"
                                       required
                                       autofocus>
                            </label>
                            @error('price')
                            <div class="small text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 mt-3">
                        <label for="available_publications" class="col-md-4 col-form-label text-md-end">Available Publications</label>

                        <div class="col-md-6">
                            <label>
                                <input type="text"
                                       class="form-control
                                       @error('available_publications') is-invalid @enderror"
                                       name="available_publications"
                                       id="available_publications"
                                       required
                                       autofocus>
                            </label>
                            @error('available_publications')
                            <div class="small text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 mt-3">
                        <label for="active" class="col-md-4 col-form-label text-md-end">Active</label>
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input"
                                       type="checkbox"
                                       id="flexSwitchCheckDefault">
                                <input type="hidden" id="flexSwitchCheckDefaultHidden" name="active" value="0">
                            </div>

                            @error('active')
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
