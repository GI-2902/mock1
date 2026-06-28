@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('/css/profile.css')}}">
@endsection

@section('content')

    <form action="/" method="post" class="regi-u" enctype="multipart/form-data">
        @csrf
        <div class="regi-u_body">
        
            <div class="regi-u_body_title">プロフィール設定</div>

            <div class="regi-u_body_image">
                
                <img class="regi-u_body_image_picture" id="0"></img>
                <label for="1" class="regi-u_body_image_label">画像を選択する
                    <input id="1" type="file" name="user_image" class="regi-u_body_image_input" value="{{old('user_image')}}"/>
                </label>
                <script>
                            var view = document.getElementById('0');
                            var pic = document.getElementById('1');                          
                            pic.addEventListener('change',(e)=>{
                                var file = e.target.files[0];

                                var fr = new FileReader();
                                //readAsDataURLでDataURL形式でファイルのURLの情報を読み込みオブジェクトのrederに代入する
                                fr.readAsDataURL(file);

                                //読み込みが完了したらsrcに代入する
                                fr.addEventListener('load',(e)=>{                                                                   
                                    view.src= e.srcElement.result;
                                })                       
                            })
                </script>
                
                
            </div>

            <div class="regi-u_body_user">
                <div class="regi-u_body_user_title">ユーザ名</div>
                <input type="text" name="name" class="regi-u_body_user_input" value="{{old('name')}}"/>
            </div>
            <div class="regi-u_body_postcode">
                <div class="regi-u_body_postcode_title">郵便番号</div>
                <input type="text" name="postcode" class="regi-u_body_postcode_input" value="{{old('postcode')}}"/>
            </div>
            <div class="regi-u_body_address">
                <div class="regi-u_body_address_title">住所</div>
                <input type="text" name="address" class="regi-u_body_address_input" value="{{old('address')}}"/>
            </div>
            <div class="regi-u_body_building">
                <div class="regi-u_body_building_title">建物</div>
                <input type="text" name="building" class="regi-u_body_building_input" value="{{old('building')}}"/>
            </div>
            <button type="submit"  class="regi-u_body_button">更新する</button> 
        </div>
    </form>

@endsection