    <style type="text/css">
        header {
            text-align: center;
        }

        header div {
            display:inline-block;
            padding:5px;
            height: 50px;
            text-align: center;

        }
        #right-side {
            display:inline-block;
            padding:5px;
            float:right;
            margin-left: 385px;

        }
        #logo {
            padding:10px;
            margin-right: 385px;

        }
        #center-search {
            padding:0px;
            display: inline-block;
        }
        .search-input {
            height: 30px;
            font-size: 120%;
            color: #5a5854;
            background-color: #f2f2f2;
            border: 1px solid #bdbdbd;
            border-radius: 5px;
            padding: 2px 2px 2px 30px;
        }

    </style>
<div class='container'>
    <header class="navbar navbar-default navbar-fixed-top">
        <div>
            <div id='logo'>
                <a href='index.php'>The Tool Shed</a>
            </div>
            <div id='center-search'>
                <form>
                    <input type='text' class='search-input'>
                    <a href='ads.index.php'><button class="btn">Search</button></a>
                </form>
            </div>
            <div id='right-side'>
                <?php if(AUTH::check()): ?>
                    <div id='welcome'>
                        <a href ='users.show.php'><p>Welcome <?=$_SESSION['LOGGED_IN_USER']?>!</p></a>
                    </div>
                    <div id='logout'>
                        <a href='auth.logout.php'>Log Out</a>
                    </div>
                <?php else: ?>
                <div id='register'>
                    <a href='users.create.php'>Register</a>
                </div>
                <div id='login'>
                    <a href='auth.login.php'>Login</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </header>
<div>