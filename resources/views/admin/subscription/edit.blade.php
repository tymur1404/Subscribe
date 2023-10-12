@extends('layouts.app')

@section('content')
    @php
        $currentYear = date('Y');
    @endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>{{ 'Subscription edit' }}</h4>
                </div>
                @if (session('success_subscription_update'))
                    <div class="alert alert-success">
                        {{ session('success_subscription_update') }}
                    </div>
                @endif

                <div class="row mb-3">
                    <div class="col-md-6">
                        <a class="btn btn-primary" href={{ route('subscription.index') }}> {{ __('Go to list of Subscription') }}</a>
                    </div>
                </div>
                <form action="{{ route('subscription.update', $subscription->id) }}" method="POST">
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
                                       value="{{ $subscription->name ?? old('name') }}"
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
                                       value="{{ $subscription->price ?? old('price') }}"
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
                                       value="{{ $subscription->available_publications ?? old('available_publications') }}"
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
                                       id="flexSwitchCheckDefault"

                                    {{ $subscription->active ? 'checked' : '' }}>
                                <input type="hidden" id="flexSwitchCheckDefaultHidden" name="active" value="{{$subscription->active ? 1 : 0 }}">
                            </div>

                            @error('active')
                            <div class="small text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-10 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                            <form method="POST" action="{{ route('subscription.destroy', $subscription->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{ 'Delete' }}</button>
                            </form>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


@endsection
