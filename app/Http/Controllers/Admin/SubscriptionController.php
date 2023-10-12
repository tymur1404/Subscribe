<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Subscription\StoreRequest;
use App\Http\Requests\Admin\Subscription\UpdateRequest;
use App\Models\Subscription;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SubscriptionController extends Controller
{
    const COUNT_SUBSCRIPTION_ON_PAGE = 10;

    public function index(): View
    {
        $subscriptions = Subscription::paginate(self::COUNT_SUBSCRIPTION_ON_PAGE);

        return view('admin.subscription.index', compact('subscriptions'));
    }

    public function create(): View
    {
        return view('admin.subscription.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        Subscription::create($data);

        return to_route('subscription.index')->with('success_subscription_create', 'Subscription successfully created');
    }

    public function show(Subscription $subscription): View
    {
        return view('admin.subscription.show', compact('subscription'));
    }

    public function edit(Subscription $subscription): View
    {
        return view('admin.subscription.edit', compact('subscription'));
    }

    public function update(UpdateRequest $request, Subscription $subscription): RedirectResponse
    {
        $data = $request->validated();
        $subscription->update($data);

        return to_route('subscription.edit', $subscription->id)->with('success_subscription_update', 'Subscription successfully updated');
    }

    public function destroy(Subscription $subscription): RedirectResponse
    {
        if($subscription->delete())
        {
            return to_route('subscription.index')->with('success_subscription_delete', 'Subscription successfully deleted');
        }

        return to_route('subscription.show', $subscription->id)->with('error_subscription_delete', 'The subscription was not deleted');
    }
}
