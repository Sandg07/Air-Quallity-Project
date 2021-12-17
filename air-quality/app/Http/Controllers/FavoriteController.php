<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;


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

        return view('favorites', ['array' => $array]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new-favorite');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validations
        // $request->validated();

        $array = explode(',', $request->coordinates);
        // dd($array);

        $favorite = new Favorite;
        $favorite->id = $request->id;
        $favorite->name = $request->name;
        $favorite->coordinates_x = $array[0];
        $favorite->coordinates_y  = $array[1];
        // dd($array[1]);
        $favorite->category = $request->category;
        $favorite->user_id = $request->user_id; // use the auth id
        // $favorite->user_id = $request->Auth::user()->id; // use the auth id
        // dd(Auth::user()->id);

        if ($favorite->save()) {
            back()->with('success', 'Saved the favorite in the DB');
            $last = DB::table('favorites')->latest()->first();

            return  response()->json(['last' => $last]);
        } else
            return back()->with('error', 'Something wrong with the DB.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Need to use favorite_id as a hidden field to use the edit/show/update method
        //             $favorite = Favorite::find($id);
        //     return view('favorites', ['favorite' => $favorite]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Need to use favorite_id as a hidden field to use the edit/show/update method
        // $favorite = Favorite::find($id);
        // return view('edit-favorite', ['favorite' => $favorite]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validations
        // $request->validated();
        $array = explode(',', $request->coordinates);
        // dd($array);

        $favorite = Favorite::find($id);

        $favorite->id = $request->id;
        $favorite->name = $request->name;
        $favorite->coordinates_x = $request->coordinates_x;
        $favorite->coordinates_y  =  $request->coordinates_y;
        $favorite->category = $request->category;
        $favorite->user_id = $request->user_id; // use the auth id
        // $favorite->user_id = $request->Auth::user()->id; // use the auth id

        if ($favorite->save())
            return back()->with('success', 'Updated in the DB');
        else
            return back()->with('error', 'Something wrong with the DB');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $result = Favorite::destroy($id);



        if ($result)
            return back()->with('success', 'Favorite was deleted from the DB');
        else
            return back()->with('error', 'Something wrong with the DB.');
    }
}
