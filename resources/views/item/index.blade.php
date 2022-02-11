<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>商品管理</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}"/>
</head>
<body>
    <div id="main">
        <nav>
            <h4>メニュー</h4>
            <ul>
                <li id="itemsList" class="menuList"><p>商品一覧</p></li>
                <li id="createItem" class="menuList"><p>新規登録</p></li>
            </ul>
        </nav>
        <div id="itemsListArea" class="content">
            <h1>商品一覧</h1>
            <table>
                <thead>
                    <tr>
                        <th class="itemId">ID</th>
                        <th class="itemName">商品名</th>
                        <th class="itemPrice">価格</th>
                    </tr>
                </thead>
                <tbody id="listTable">
                    <tr>
                        <td>1</td>
                        <td>サンプル</td>
                        <td><span>0</span>円</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="createItemArea" class="content hasForm none">
            <h1>新規登録</h1>
            <div>
                <p>商品名：<input type="text"/></p>
                <p>価格(円)：<input type="number"/></p>
                <button class="btn btn-primary">新規登録</button>
            </div>
            <h2 id="result" class="none">登録結果</h2>
            <div id="resultItem"></div>
        </div>
        <dialog id="dialog">
            <form method="post">
                <h1 class="modalHead">新規登録</h1>
                <div>
                    <p><label>商品名: </label><input type="text"/></p>
                    <p><label>価格(円): </label><input type="number"/></p>
                </div>
                <menu>
                    <button id="confirmBtn" class="btn btn-primary" value="default">新規登録</button>
                    <button value="cancel">キャンセル</button>
                </menu>
            </form>
        </dialog>
    </div>
</body>
<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
<script src="{{ asset('js/modal.js') }}"></script>
<script src="{{ asset('js/index.js') }}"></script>
</html>