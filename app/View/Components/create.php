<?php

namespace App\View\Components;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\View\Component;

class create extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $category = Category::select('*')->get();
        $brand = Brand::select('*')->get();
        return view('components.create', ['category'=>$category , 'brand'=>$brand]);
    }
}
