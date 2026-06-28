<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function  like($item_id)
    {


        $item = Item::find($item_id);

        if (!(Like::where('user_id', Auth::id())->exists())) {
            Like::create([
                'item_id' => $item->id,
                'user_id' => Auth::id(),
            ]);
        } else {

            Like::where('user_id', Auth::id())->delete();
        }

        return back();
    }
}
