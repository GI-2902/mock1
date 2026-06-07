<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>模擬案件1</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    @yield('css')

    
</head>
<body>
    <header class=head>
        <div class="head_logo"></div>
      
        <div class="head_search">
            @auth  
                <input type="text" id="name" class="head_search_input" placeholder="なにをお探しですか？"/>
                
                <script>
                var input = document.getElementById('name');

                $( function(){
                    $('#name').keydown(
                    function(event){

                            if(event.key === "Enter"){

                                var text = input.value;
                                
                                console.log(text);

                                $.ajax({
                                    url:'/',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                    },
                                    type:'POST',
                                    dataType:'json',
                                    data: { name : text},
                                    timeout:3000,
                                }).done(function(data){
                                    console.log(data);
                                    $('.items_list').empty();

                                    $.each(data,function(index,item){
                                        
                                        var name = item.item_name;

                                        html = `
                                                <div class="items_list_box">
                
                                                    <div class="items_list_box_image" >
                    
                                                    </div>

                                                    <div class="items_list_box_name" >
                                                        <a href="" class=""  id="atag">${name}</a>
                                                    </div>
                                                </div>
                                             `
                                        $('.items_list').append(html);
                                    })
                                                                    
                                }).fail(function(XMLHTTPRequest,textStatus,errorThrown){
                                    console.log('error');
                                })

                            };
                    });
                });                       
                </script>
            @endauth
        </div>
        <div class="head_button">
            @auth
            <form class="head_button_logout" action="/logout" method="post">
                @csrf
                <button type="submit" class="head_button_logout_button">ログアウト</button>
            </form>
            <a href="" class="head_button_mypage">マイページ</a>
            <a href="/sell" class="head_button_sell">出品</a>
            @endauth
        </div>
        
    </header>
    <main>
        @yield('content')
    </main>
    
</body>
</html>