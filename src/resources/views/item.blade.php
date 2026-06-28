@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('/css/item.css')}}">
@endsection

@section('content')

    <div class="item">
    
        <div class="item_pic">
            <img src="{{asset('storage/'.$item->item_image)}}" alt="" class="item_pic_img">
        </div>
        <div class="item_one">
            <div class="item_one_intro">
                <p class="item_one_intro_name">{{$item->item_name}}</p>
                <p class="item_one_intro_brand">{{$item->brand}}</p>
                <p class="item_one_intro_price">￥{{$item->price}}</p>
                <div class="item_one_intro_button">
                    <div class="item_one_intro_button_like">
                        <a href="/item/{{$item->id}}/like"  class="item_one_intro_button_like_heart">{{ $item->likes->contains('user_id',Auth::id()) ? '❤': '♡' }}</a>
                        <span class="item_one_intro_button_like_count">{{$item->likes->count()}}</span>
                    </div>
                    <div class="item_one_intro_button_comment">
                        💭
                    </div>
                </div>
            </div>
            <div class="item_one_buy">
                <button type="submit" class="item_one_buy_button">購入手続きへ</button>
            </div>
            <div class="item_one_descri">
                <div class="item_one_descri_title">
                    商品説明
                </div>
                <div class="item_one_descri_text">
                    <textarea name="description" id="1" class="item_one_descri_text_content" readonly>{{$item->description}}</textarea>
                </div>
            </div>
            <div class="item_one_info">
                <div class="item_one_info_title">商品の情報</div>
                <div class="item_one_info_category" id="0">
                    <p class="item_one_info_category_title">カテゴリー</p>
                    <script>
                        var cate = document.getElementById('0');
                        var category = '{{$item->category}}';
                        var list = category.split(',');
                        console.log(list);
                        
                        for(var i=0;i<14;i++){
                            console.log(list[i]);
                            if( list[i] == 'ファッション' ){
                                var element = document.createElement('div');
                                element.textContent = 'ファッション';
                                element.classList.add('item_one_info_category_list');
                                cate.appendChild(element);
                            }else if(list[i] == '家電'){
                                var element = document.createElement('div');
                                element.textContent = '家電';
                                element.classList.add('item_one_info_category_list');
                                cate.appendChild(element);
                            }else if(list[i] == 'インテリア'){
                                var element = document.createElement('div');
                                element.textContent = 'インテリア';
                                element.classList.add('item_one_info_category_list');
                                cate.appendChild(element);
                            }else if(list[i] == 'レディース'){
                                var element = document.createElement('div');
                                element.textContent = 'レディース';
                                element.classList.add('item_one_info_category_list');
                                cate.appendChild(element);
                            }else if(list[i] == 'メンズ'){
                                var element = document.createElement('div');
                                element.textContent = 'メンズ';
                                element.classList.add('item_one_info_category_list');
                                cate.appendChild(element);
                            }else if(list[i] == 'コスメ'){
                                var element = document.createElement('div');
                                element.textContent = 'コスメ';
                                element.classList.add('item_one_info_category_list');
                                cate.appendChild(element);
                            }else if(list[i] == '本'){
                                var element = document.createElement('div');
                                element.textContent = '本';
                                element.classList.add('item_one_info_category_list');
                                cate.appendChild(element);
                            }else if(list[i] == 'ゲーム'){
                                var element = document.createElement('div');
                                element.textContent = 'ゲーム';
                                element.classList.add('item_one_info_category_list');
                                cate.appendChild(element);
                            }else if(list[i] == 'スポーツ'){
                                var element = document.createElement('div');
                                element.textContent = 'スポーツ';
                                element.classList.add('item_one_info_category_list');
                                cate.appendChild(element);
                            }else if(list[i] == 'キッチン'){
                                var element = document.createElement('div');
                                element.textContent = 'キッチン';
                                element.classList.add('item_one_info_category_list');
                                cate.appendChild(element);
                            }else if(list[i] == 'ハンドメイド'){
                                var element = document.createElement('div');
                                element.textContent = 'ハンドメイド';
                                element.classList.add('item_one_info_category_list');
                                cate.appendChild(element);
                            }else if(list[i] == 'アクセサリ'){
                                var element = document.createElement('div');
                                element.textContent = 'アクセサリ';
                                element.classList.add('item_one_info_category_list');
                                cate.appendChild(element);
                            }else if(list[i] == 'おもちゃ'){
                                var element = document.createElement('div');
                                element.textContent = 'おもちゃ';
                                element.classList.add('item_one_info_category_list');
                                cate.appendChild(element);
                            }else if(list[i] == 'ベビー・キッズ'){
                                var element = document.createElement('div');
                                element.textContent = 'ベビー・キッズ';
                                element.classList.add('item_one_info_category_list');
                                cate.appendChild(element);
                            };
                        };
                    </script>
                </div>
                <div class="item_one_info_status">
                    <div class="item_one_info_status_title">商品の状態</div>
                    <div class="item_one_info_status_status">{{$item->status}}</div>
                </div>
            </div>
            <div class="item_one_comment"></div>
        </div>
    
    </div>


@endsection