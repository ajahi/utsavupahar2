<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['Admin', 'Super Admin', 'Vendor', 'Delivery']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Order $order): bool
    {
        if ($user->hasAnyRole(['Admin', 'Super Admin', 'Vendor', 'Delivery'])) {
            return true;
        } else if ($user->hasAnyRole('Customer')) {
            return $order->user_id === $user->id;
        }
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['Admin', 'Super Admin', 'Customer']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Order $order): bool
    {
        if ($user->hasAnyRole(['Admin', 'Super Admin', 'Vendor', 'Delivery'])) {
            return true;
        } else if ($user->hasAnyRole('Customer')) {
            return $order->user_id === $user->id;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Order $order): bool
    {
        if ($user->hasAnyRole(['Admin', 'Super Admin', 'Vendor'])) {
            return true;
        } else if ($user->hasAnyRole('Customer')) {
            return $order->user_id === $user->id;
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Order $order): bool
    {
        if ($user->hasAnyRole(['Admin', 'Super Admin', 'Vendor'])) {
            return true;
        } else if ($user->hasAnyRole('Customer')) {
            return $order->user_id === $user->id;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Order $order): bool
    {
        if ($user->hasAnyRole(['Admin', 'Super Admin', 'Vendor'])) {
            return true;
        } else if ($user->hasAnyRole('Customer')) {
            return $order->user_id === $user->id;
        }
    }
}
