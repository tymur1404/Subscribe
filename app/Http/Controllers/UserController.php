<?php

namespace App\Http\Controllers;

use App\Facades\UserFacade;
use App\Http\Requests\User\UpdateRequest;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{

    const COUNT_SUBSCRIPTION_ON_PAGE = 10;


    public function show(User $user): View
    {
        $subscription = $user->subscription;

        return view('profile.show', compact('subscription'));
    }

    public function update(UpdateRequest $request, User $user): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();

        if (UserFacade::buySubscription($user, $data)) {
            return redirect()->back()->with('success_subscription_update', 'The purchase was successful');
        }

        return redirect()->back()->with('error_subscription_update', 'Subscription not found');
    }

    public function change_subscription(User $user): View
    {
        $subscriptions = Subscription::paginate(self::COUNT_SUBSCRIPTION_ON_PAGE);

        return view('profile.change_subscription', compact('subscriptions', 'user'));
    }

}
