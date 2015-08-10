<html>
<head>
    <title>Tool Shed</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <style type="text/css">
        #indexTitle {
            text-align: center;
            font-size: 4em;
            margin-top: 20%;
        }

        #mainForm {
            text-align: center;
            margin-top: 3%;
        }

        #mainForm > p {
            font-size: 1.3em;
        }

        #mainSearch {
            width: 25%;
            display: inline-block;
        }

        #mainFormLabel {
            font-size: 1em;
        }
        header div {
            display:inline-block;
            padding:5px;

        }
        footer div {
            display: inline-block;
        }
    </style>
</head>
<body>
    <header class="navbar navbar-default navbar-fixed-top">
        <div>
            <div id='logo'>
                <a href='#'>LOGO Goes Here</a>
            </div>
            <div id='right-side'>
                <div id='register'>
                    <a href='#'>Register</a>
                </div>
                <div id='login'>
                    <a href='#'>Login</a>
                </div>
            </div>
        </div>

    </header>
    
    <h1 id="indexTitle">Tool Shed</h1>
    <form id="mainForm">
            <p id="mainFormLabel">I want to learn...</p>
            <input id="mainSearch" type="text" name="search" placeholder="x" autofocus>
            <input id="searchSubmit" type="submit">
    </form>





    
    <footer class="navbar navbar-default navbar-fixed-bottom">
        <div class="container">
            <div><a href='#'>&copy The Tool Shed</a></div>
            <div><a href='#'>About</a></div>
            <div><a href='#'>Terms of Use</a></div>
            
            
        </div>
    </footer>
</body>
</html>