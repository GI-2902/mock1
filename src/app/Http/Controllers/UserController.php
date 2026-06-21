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

        $user->update([
            'name' => $request->name,
            'user_image' => $request->user_image,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building' => $request->building,
        ]);
        //storageに画像保存
        $file_name = $request->file('user_image')->getClientOriginalName();

        $request->file('user_image')->storeAs('public', $file_name);

        //dd($user);
        $items = Item::All();
        return view('index', ['items' => $items]);
    }
}
