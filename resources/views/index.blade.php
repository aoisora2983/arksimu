<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
        <meta name="twitter:site" content="@bluesky177896" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:creator" content="@bluesky177896" />
        <meta name="twitter:title" content="アークナイツ公開求人シミュレータ" />
        <meta name="twitter:description" content="アークナイツの公開求人のシミュレータ。OR検索・AND検索対応。" />
        <meta name="twitter:url" content="//arksimu.aozora-blog.com/" />
        <meta name="twitter:image" content="//www.aozora-blog.com/wp-content/uploads/2020/03/arksimu.jpg" />
        <title>アークナイツ公開求人シミュレータ</title>
        <meta name="description" content="アークナイツの公開求人のシミュレータ。OR検索・AND検索対応。※必ず出ることを保証するものではないです。">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body>
        <div id="app">
            <simulator-component></simulator-component>
            <div class="container">
                <div class="alert alert-primary" role="alert">
                    <p>※<a href="//arknights.wikiru.jp/" rel="nofollow">wiki</a>の情報と画像をお借りしています。問題があった場合削除します。</p>
                    <p>※スクレイピングして加工したものを個人製作のロジックで絞っているので、情報や絞り込みが間違っている場合があります。<br>
                    また、上級エリート以外ではタグが外れる可能性もあるようです。<br>
                    このシミュレータで出たキャラが必ず当たるわけではないのでお気を付けください。</p>
                </div>
                <nav class="navbar navbar-light bg-light">
                    <a class="navbar-brand" href="//www.aozora-blog.com/2020/03/26/post-2476/">
                        <img src="//www.aozora-blog.com/wp-content/uploads/2018/07/logo.png" width="30" height="30" class="d-inline-block align-top" alt="blogアイコン" loading="lazy">
                        ブログで開発の日記を残してます。よろしければどうぞ。
                    </a>
                </nav>
                <nav class="navbar navbar-light bg-light">
                    <a class="navbar-brand" href="//github.com/aoisora2983/arksimu/" rel="nofollow">
                        <img src="//www.aozora-blog.com/wp-content/uploads/ark/logo.png" width="30" height="30" class="d-inline-block align-top" alt="blogアイコン" loading="lazy">
                        gitHub
                    </a>
                </nav>
            </div>
        </div>
    </body>
    <footer>
        <script src="{{ mix('/js/app.js') }}"></script>
    </footer>
</html>
