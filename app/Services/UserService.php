<?php

namespace App\Services;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserService
{
    private const ADMIN = 'admin';
    public function isAdmin(): bool
    {
        return auth()->user() && auth()->user()?->role === self::ADMIN;
    }

    public function getSubscription(): ?Subscription
    {
        $subscriptionId = Auth::user()?->subscription_id;

        return Subscription::findOrFail($subscriptionId);
    }

    public function getPublishedArticlesCount(): ?int
    {
        return Auth::user()->articles()->count();
    }

    public function getDaysUntilSubscriptionExpires(): int
    {
        $user = Auth::user();
        if ($user->subscription && $user->subscription_activation_date) {
            $activationDate = Carbon::parse($user->subscription_activation_date);
            $expirationDate = $activationDate->addMonth();

            $today = Carbon::today();

            if ($today < $expirationDate) {
                return $today->diffInDays($expirationDate);
            }
        }

        return 0;
    }

    public function buySubscription(User $user, array $subscriptionId)
    {
        $subscription = Subscription::find(reset($subscriptionId));

        if ($subscription) {
            $data = [
                ...$subscriptionId,
                'subscription_activation_date' => Carbon::now(),
            ];
            $user->update($data);

            return true;
        }
        return false;
    }
}
