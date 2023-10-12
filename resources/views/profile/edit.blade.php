@extends('admin.layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            {{ 'Subscription' }}
                        </h4>
                    </div>
                    @if (session('success_subscription_create'))
                        <div class="alert alert-success">
                            {{ session('success_subscription_create') }}
                        </div>
                    @endif
                    <table id="userTable" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Available publication</th>
                            <th scope="col">Active</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subscriptions as $subscription)
                            <tr>
                                <td>{{ $subscription->name }}</td>
                                <td>{{ $subscription->price }}</td>
                                <td>{{ $subscription->available_publications }}</td>
                                <td>

                                    <div class="form-check form-switch">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               id="flexSwitchCheckDefault"
                                               disabled
                                            {{ $subscription->active ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-8 offset-md-4">
                                        <a class="btn btn-primary" href={{ route('subscription.edit', $subscription->id) }}> {{ __('Edit') }}</a>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-6 m-3">
                            <a class="btn btn-success" href={{ route('subscription.create') }}> {{ __('Create') }}</a>

                            <form action="{{ route('user.update', $author->id) }}" method="POST">
                            @csrf
                            @method('patch')

                                <div class="col-md-8 offset-md-10">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
