@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('/css/mypage.css')}}">
@endsection

@section('content')

    <div class="top">
    
    

        <div class="top_user">
        
            <img class="user_image" src="{{asset('/storage/'.$user->user_image)}}"></img>
            <div class="user_name">{{$user->name}}</div>
            <a class="user_edit" href="/mypage/profile">プロフィールを編集</a>
        
        </div>

        <div class="top_items">
            
            <div class="items_top">
                <div class="items_top_all">
                    出品した商品
                </div>
                <div class="items_top_mylist">
                    購入した商品
                </div>
            </div>

            
            <div class="items_list">

            
            @foreach($items as $item)
                <div class="items_list_box">
                
                    <img class="items_list_box_image"  src="{{asset('storage/'.$item->item_image)}}">
                    
                    </img>

                    <div class="items_list_box_name" >
                        <a href="" class=""  id="atag">{{$item->item_name}}</a>
                    </div>
                </div>
            @endforeach
            </div>
         
        </div>
    </div>
@endsection
</html>