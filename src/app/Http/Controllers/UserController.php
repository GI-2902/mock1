<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = User::where('id', Auth::id())->first();

        //storageに画像保存
        if ($request->file('user_image') == null) {
            $user->update([
                'name' => $request->name,
                'postcode' => $request->postcode,
                'address' => $request->address,
                'building' => $request->building,
            ]);
        } else {

            $file_name = $request->file('user_image')->getClientOriginalName();

            $user->update([
                'name' => $request->name,
                'user_image' => $file_name,
                'postcode' => $request->postcode,
                'address' => $request->address,
                'building' => $request->building,
            ]);

            $request->file('user_image')->storeAs('public', $file_name);
        }

        //dd($user->user_image);
        $items = Item::All();
        return view('index', ['items' => $items]);
    }

    public function index()
    {
        $user = Auth::user();
        //dd($user);
        return view('profile-edit', ['user' => $user]);
    }
}
