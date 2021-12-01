<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF8" />
        <title>図書館貸し出しシステム</title>
        <style type="text/css">
            <!--
            body {
                margin:0px;
                padding:0px;
                font-size: 12px;
            }
            #navigation {
                margin:0px;
                padding:0px;
                width:147px;
            }
            #navigation a.head {
                cursor:pointer;
                background:url(images/main_34.gif) no-repeat scroll;
                display:block;
                font-weight:bold;
                margin:0px;
                padding:5px 0 5px;
                text-align:center;
                font-size:12px;
                text-decoration:none;
            }
            #navigation ul {
                border-width:0px;
                margin:0px;
                padding:0px;
                text-indent:0px;
            }
            #navigation li {
                list-style:none; display:inline;
            }
            #navigation li li a {
                display:block;
                font-size:12px;
                text-decoration: none;
                text-align:center;
                padding:3px;
            }
            #navigation li li a:hover {
                background:url(images/tab_bg.gif) repeat-x;
                border:solid 1px #adb9c2;
            }
            -->
        </style>
    </head>
    <body>
        <div  style="height:100%;">
            <ul id="navigation">
                <li> <a class="head">システム管理</a>
                    <ul>
                        <li><a href="ly_pwd.php" target="rightFrame">パスワード変更する</a></li>
                    </ul>
                </li>
                <li><a class="head">図書一覧</a>
                    <ul>
                        <li><a href="list.php" target="rightFrame">図書更新</a></li>
                        <li><a href="add.php" target="rightFrame">新しい本登録</a></li>
                    </ul>
                </li>
                <li><a class="head">図書検索</a>
                    <ul>
                        <li><a href="select.php" target="rightFrame">検索する</a></li>
                        <li><a href="count.php" target="rightFrame">タイプ一覧</a></li>
                        <li><a href="ninki.php" target="rightFrame">貸し出す図書一覧</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </body>
</html>