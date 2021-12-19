<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $favorites = Favorite::all();
        $api = new ApiController();
        $data = $api->index();
        $array = [$favorites, $data];

        return view('map', ['array' => $array]);
    }


    public function findAjaxFunction(Request $request)
    {
        if ($request->has('name')) {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required|max:255|string',
                    'category' => 'required',
                    'coordinates' => 'required'
                ],
                [
                    'name.required' => 'A name is mandatory!',
                    'category.required' => 'Choose a Category!',
                    'name.max' => 'The name cannot be longer than 255 signs',
                    'name.string' => 'A name must contain strings',
                    'coordinates.required' => 'Choose a favorite point on the map'
                ]
            );
            if ($validator->passes())
                return $this->storeFavorites($request);
            else {
                return response()->json(['error' => $validator->errors()->all()]);
            }
        } elseif ($request->has('poll')) {
            return $this->requestApiData($request);
        }
    }
    public function requestApiData($request)
    {
        $api = new ApiController();
        $apiData = $api->dataRequest($request->poll);
        return response()->json(['apiData' => $apiData]);
    }
    public function storeFavorites($request)
    {
        $array = explode(',', $request->coordinates);
        $favorite = new Favorite;
        $favorite->name = $request->name;
        $favorite->coordinates_x = $array[1];
        $favorite->coordinates_y  = $array[0];
        $favorite->category = $request->category;
        $favorite->user_id = Auth::id();

        if ($favorite->save()) {
            back()->with('success', 'Saved the favorite in the DB');
            $last = DB::table('favorites')->latest()->first();

            return  response()->json(['last' => $last]);
        } else
            return back()->with('error', 'Problem with DB');
    }

    public function destroy($id)
    {


        $result = Favorite::destroy($id);



        if ($result)
            return back()->with('success', 'Favorite was deleted from the DB');
        else
            return back()->with('error', 'Something wrong with the DB.');
    }
}
