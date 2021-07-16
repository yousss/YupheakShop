<?php

namespace App\Http\View\Composers;

use App\Category_model;
use Illuminate\View\View;

class CategoryComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $category;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(Category_model $category)
    {
        // Dependencies automatically resolved by service container...
        $this->category = $category;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $categories = $this->category->with('children')->where('parent_id', 0)->where('status', 1)->select('name', 'id')->get();
        $view->with('categories', $categories);
    }
}
