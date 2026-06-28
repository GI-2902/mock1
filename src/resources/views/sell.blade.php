@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('/css/sell.css')}}">
@endsection
    
@section('content')
        <div class="items">

            <form action="/sell" class="items_form" method="post" onSubmit="return false" id="fm" enctype="multipart/form-data">
                @csrf
            
               <div class="items_form_title">商品の出品</div>
                <div class="items_form_image">
                    <div class="items_form_image_title">商品画像</div>
                    <div class="items_form_image_form">
                        <input name="item_image" type="file" class="items_form_image_form_picture" accept=".jpg,.png,.jpeg" id="01" required />
                        <label for="01" class="items_form_image_form_upload">画像を選択する</label>
                        <img class="items_form_image_form_view" id="00"/>
                        <script>
                            var view = document.getElementById('00');
                            var pic = document.getElementById('01');                          
                            pic.addEventListener('change',(e)=>{
                                var file = e.target.files[0];
                                //console.log(file);

                                var fr = new FileReader();
                                //readAsDataURLでDataURL形式でファイルのURLの情報を読み込みオブジェクトのrederに代入する
                                fr.readAsDataURL(file);

                                //読み込みが完了したらsrcに代入する
                                fr.addEventListener('load',(e)=>{
                                    //console.log(e);                                                                   
                                    view.src= e.srcElement.result;
                                })                       
                            })
                        </script>
                    </div>             
                </div>
                <div class="items_form_select">
                    <div class="items_form_select_title">商品の詳細</div>
                    <div class="items_form_select_category">
                        <div class="items_form_select_category_title">カテゴリー</div>
                        <div class="items_form_select_category_list">
                            
                            <p id="0" onclick="getOn('0')">ファッション</p>
                            <p id="1" onclick="getOn('1')">家電</p>
                            <p id="2" onclick="getOn('2')">インテリア</p>
                            <p id="3" onclick="getOn('3')">レディース</p>
                            <p id="4" onclick="getOn('4')">メンズ</p>
                            <p id="5" onclick="getOn('5')">コスメ</br></p>
                            <p id="6" onclick="getOn('6')">本</p>
                            <p id="7" onclick="getOn('7')">ゲーム</p>
                            <p id="8" onclick="getOn('8')">スポーツ</p>
                            <p id="9" onclick="getOn('9')">キッチン</p>
                            <p id="10" onclick="getOn('10')">ハンドメイド</p>
                            <p id="11" onclick="getOn('11')">アクセサリ</p>
                            <p id="12" onclick="getOn('12')">おもちゃ</p>
                            <p id="13" onclick="getOn('13')">ベビー・キッズ</p>
                        </div>
                    </div>
                    <div class="items_form_select_status">
                        <div class="items_form_select_status_title">商品の状態</div>
                        <select name="status" id="" class="items_form_select_status_select">
                            <option value="良好">良好</option>
                            <option value="目立った傷や汚れなし">目立った傷や汚れなし</option>
                            <option value="やや傷や汚れあり">やや傷や汚れあり</option>
                            <option value="状態が悪い">状態が悪い</option>
                        </select>
                    </div>
                </div>
                <div class="items_form_text">商品名と説明</div>
                <div class="items_form_name">
                    <div class="items_form_name_title">商品名</div>
                    <input type="text" class="items_form_name_input" name="item_name">
                </div>
                <div class="items_form_brand">
                    <div class="items_form_brand_title">ブランド名</div>
                    <input type="text" class="items_form_brand_input" name="brand">
                </div>
                <div class="items_form_dsc">
                    <div class="items_form_dsc_title">商品の説明</div>
                    <textarea  class="items_form_dsc_input"  rows="8"></textarea>
                </div>
                <div class="items_form_price">
                    <div class="items_form_price_title">￥販売価格</div>
                    <input type="text" class="items_form_price_input" name="price">
                </div>
                
                <button type="submit" class="items_form_button" id="btn">出品する</button>
            </form>
        </div>
    
    <script>
        var num;
        var count = [0,0,0,0,0,0,0,0,0,0,0,0,0,0];                                                               
        function getOn(num){
            var text = document.getElementById(num);
                                   
            if(count[num] != 1){
                text.style.backgroundColor = "#FF5655";
                text.style.color = "#FFFFFF";
                count[num] = 1;
                console.log('count',count);
                                    
                }else{
                text.style.backgroundColor = "#FFFFFF";
                text.style.color = "#FF5655";
                count[num] = 0;
                console.log('count',count);
                }
        }

        btn.addEventListener('click',function(e){
             
            var description = document.querySelector('textarea').value; 

            var i;
            var cate=[];
            for(i=0;i<14;i++){
                if(count[i] == 1){
                    cate[i]=document.getElementById(i).textContent;
                    
                }
            }
            //cate[]のnullを削除
            var category = cate.filter(Boolean);

            // form を動的に生成
            var form = document.getElementById('fm');

            console.log('form',form);

            form.addEventListener('formdata',function(e){

                //formdataイベントはキャンセル不可
                //e.preventDefault();
                var fd = e.formData;
                fd.set('category', category); 
                fd.set('description', description);
                //new FormData()を見るにはArray.from()が必要
                //console.log('form_data',Array.from(fd));               
            });

            form.submit();
            
        });


/*
            form.addEventListener('formdata', (e) => {

                 console.log('e',e);

                //eのformDataを基にformを作成している
                var fd = e.formData;
                
                fd.append('category', category); 
                fd.append('description', description);


                console.log('fd',fd);

               // e.preventDefault();
           });

            //fdの中身を送信前に確認
            
            //e.preventDefault();
            //form.submit();*/
    
    </script>
@endsection
