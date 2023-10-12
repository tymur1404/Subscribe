@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Current Subscribe' }}</div>
                @if (session('success_article_create'))
                    <div class="alert alert-success">
                        {{ session('success_article_create') }}
                    </div>
                @endif

                @if (empty($subscription))
                    <h4> {{ 'You dont have any subscribe' }} </h4>
                @else
                <table id="userTable" class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">User ID</th>
                        <th scope="col">{{ auth()->user()->id }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Name</td>
                        <td>{{ $subscription->name }}</td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>{{ $subscription->price }}</td>
                    </tr>
                    <tr>
                        <td>Available publications</td>
                        <td>{{ $subscription->available_publications }}</td>
                    </tr>
                    <tr>
                        <td>Published publications</td>
                        <td>{{ UserFacade::getPublishedArticlesCount() }}</td>
                    </tr>
                    <tr>
                        <td>Activation Date</td>
                        <td>{{ auth()->user()->subscription_activation_date }}</td>
                    </tr>
                    <tr>
                        <td>Days left until subscription expires</td>
                        <td>{{ UserFacade::getDaysUntilSubscriptionExpires() }}</td>
                    </tr>

                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-success" href={{ route('user.change_subscription', auth()->user()->id) }}> {{ __('Change Subscription') }}</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
