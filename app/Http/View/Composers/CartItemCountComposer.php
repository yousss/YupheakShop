<?php

namespace App\Http\View\Composers;

use App\Cart_model;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CartItemCountComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $cart;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(Cart_model $cart)
    {
        // Dependencies automatically resolved by service container...
        $this->cart = $cart;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $sessionId = Session::get('session_id');
        $itemCount = $this->cart->where('session_id', $sessionId)->count();
        $itemCount = $itemCount ?? 0;
        $view->with('itemCount', $itemCount);
    }
}
