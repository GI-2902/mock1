<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Redirect;
use Illuminate\support\Arr;

class ItemController extends Controller
{

    public function index()
    {
        $items = Item::All();
        return view('index', ['items' => $items]);
    }

    public function search(Request $request)
    {
        //dd()で止めると500エラーが出る

        $items = Item::where('item_name', 'LIKE', "%{$request->name}%")->get();

        return response()->json($items);
    }

    public function register()
    {
        return view('sell');
    }

    public function store(Request $request)
    {

        unset($request['_token']);
        //all()メソッドでarray型に変換してからcreateに代入
        $form = $request->all();

        //画像データのstorageフォルダへの保存                                       
        $file_name = $request->file('item_image')->getClientOriginalName();

        $request->file('item_image')->storeAs('public', $file_name);

        unset($form['item_image']);
        //dd($form);

        $form = Arr::add($form, 'item_image', $file_name);
        //dd($form);
        Item::create($form);

        $items = Item::all();
        return redirect('/')->with(['items' => $items]);
    }

    public function mypage()
    {

        return view('mypage');
    }
}
