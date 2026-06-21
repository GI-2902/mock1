@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('/css/mypage.css')}}">
@endsection

<body>
    @section('content')
        <div class="items">
            
            <div class="items_top">
                <div class="items_top_all">
                    おすすめ
                </div>
                <div class="items_top_mylist">
                    マイリスト
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
    @endsection
</body>
</html>