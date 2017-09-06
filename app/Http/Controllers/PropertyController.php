<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Load search page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Get properties filtered by params
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function data(Request $request)
    {
        $properties = Property::query();

        if ($request->has('name') && mb_strlen($request->input('name')) > 1) {
            $properties->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('price_min') && $request->has('price_max')) {
            $properties->whereBetween('price', [$request->input('price_min'), $request->input('price_max')]);
        }

        foreach (['bedrooms', 'bathrooms', 'storeys', 'garages'] as $prop) {
            if ($request->has($prop)) {
                $properties->where($prop, $request->input($prop));
            }
        }

        return $properties->get();
    }
}
