<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        if ($request->has('name'))
            return $this->storeFavorites($request);
        elseif ($request->has('poll')) {
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

        $request->validated([
            'name' => 'required|string|max:255'
            'category' => 
        ]);

        $array = explode(',', $request->coordinates);
        $favorite = new Favorite;
        $favorite->name = $request->name;
        $favorite->coordinates_x = $array[0];
        $favorite->coordinates_y  = $array[1];
        $favorite->category = $request->category;
        $favorite->user_id = Auth::id();

        if ($favorite->save()) {
            back()->with('success', 'Saved the favorite in the DB');
            $last = DB::table('favorites')->latest()->first();

            return  response()->json(['last' => $last]);
        } else
            return back()->with('error', 'Something wrong with the DB.');
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
