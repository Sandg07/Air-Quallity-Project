<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Dotenv\Validator;

class AccountController extends Controller
{
    public function findPostMethod(Request $request)
    {
        if ($request->userId == 1) {
            return $this->deleteUser();
        } elseif ($request->has('first_name')) {
            return $this->update($request);
        }
    }

    public function update($request)
    {
        if (!empty($request->city)) {
            $request->validate([
                'city' => ['string', 'max:255'], [
                    'city.string' => 'City cannot contain numbers or signs',
                    'city.max' => 'City cannot be longer than 255 characters'
                ]
            ]);
        }
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],

            [
                'first_name.required' => 'First Name is mandatory',
                'first_name.string' => 'First Name has to be a string',
                'first_name.max' => 'First Name cannot be longer than 255 characters',
                'last_name.required' => 'Last Name is mandatory',
                'last_name.string' => 'Last Name has to be a string',
                'last_name.max' => 'Last Name cannot be longer than 255 characters',

            ]
        ]);
        $user = User::find(Auth::id());
        if ($request->has('myFile')) {
            $request->validate([
                'myFile' => 'mimes:jpeg,png'
            ], ['myFile.mimes' => 'The image has to be of type jpeg or png']);
            $fileName = time() . '.' . $request->myFile->extension();
            $publicPath = public_path('uploads');
            $request->myFile->move($publicPath, $fileName);
            $user->image = $fileName;
        }


        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        if (!empty($request->city))
            $user->city = $request->city;
        if (!empty($request->myFile)) {
        }
        if ($user->save())
            return back()->with('success', 'Updated in the DB');
        else
            return back()->with('error', 'Something wrong with the DB');
    }


    public function deleteUser()
    {
        $user = User::find(Auth::id());
        Auth::logout();
        if ($user->delete()) {
            return view('homepage')->with('global', 'Your account has been deleted!');
        }
    }
}
