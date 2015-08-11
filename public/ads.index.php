<!DOCTYPE html>
<html>
<head>
    <title>Tool Shed</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <style type="text/css">
        body {
            text-align: center;
        }

        header div {
            display:inline-block;
            padding:5px;
            height: 50px;

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
        footer div {
            display: inline-block;
            padding: 15px;
        }
        button {
            margin-left: 5px;
        }
        .container-fluid {
            margin-top: 50px;
        }
        .col-md-4 form {
            /*padding: 20px;*/

        }
        .col-md-4 input {
            margin-top: 30px;

        }
        .col-md-4 select {
            margin-top: 30px;

        }
        h3 {
            text-decoration: underline;
        }
        .col-md-4 button {
            margin-top: 30px;
        }
        


    </style>
</head>
<body>
    <div class='container'>
        <header class="navbar navbar-default navbar-fixed-top">
            <div>
                <div id='logo'>
                    <a href='#'>LOGO Goes Here</a>
                </div>
                <div id='center-search'>
                    <form>
                        <input type='text'>
                        <button>Search</button>
                    </form>
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

        <div class="container-fluid">
            <div class="col-md-4">
                <div class="span2">
                    <h3>FILTER</h3>
                    <form>
                        <input type='text' placeholder='Search by Subject'>
                        <br>
                        <input type='text' placeholder='Search by Username'>
                        <br>
                        <select name="cities">
                            <option value="San Antonio">San Antonio</option>
                            <option value="Houston">Houston</option> 
                            <option value="Dallas">Dallas</option>
                            <option value="Austin">Austin</option>
                        </select>
                        <br>
                        <button>Search</button>
                    </form>
                </div>
            </div>
            <div class='col-md-8'>
                <div class="span10">
                    <h3>TEACHERS</h3>
                    <div class="well">
                        <p>Here are all of the ads...</p>
                    </div>
                    <div class="well">
                        <p>Here are all of the ads...</p>
                    </div>
                    <div class="well">
                        <p>Here are all of the ads...</p>
                    </div>
                    <div class="well">
                        <p>Here are all of the ads...</p>
                    </div>
                    <div class="well">
                        <p>Here are all of the ads...</p>
                    </div>
                    <div class="well">
                        <p>Here are all of the ads...</p>
                    </div>
                    <div class="well">
                        <p>Here are all of the ads...</p>
                    </div>
                    <div class="well">
                        <p>Here are all of the ads...</p>
                    </div>
                    <div class="well">
                        <p>Here are all of the ads...</p>
                    </div>
                    <div class="well">
                        <p>Here are all of the ads...</p>
                    </div>
                    <div class="well">
                        <p>Here are all of the ads...</p>
                    </div>
                    <div class="well">
                        <p>Here are all of the ads...</p>
                    </div>
                    <div class="well">
                        <p>Here are all of the ads...</p>
                    </div>
                    <div class="well">
                        <p>Here are all of the ads...</p>
                    </div>
                    <div class="well">
                        <p>Here are all of the ads...</p>
                    </div>
                    <div class="well">
                        <p>Here are all of the ads...</p>
                    </div>
        
                </div>
            </div>
            </div>
        </div>
        
        <footer class="navbar navbar-default navbar-fixed-bottom">
            <div class="container">
                <div><a href='#'>About The Tool Shed</a></div>
                <div><a href='#'>Terms of Use</a></div>
                <div><a href='#'>&copy The Tool Shed. All Rights Reserved</a></div>
                
                
            </div>
        </footer>
    </div>
</body>
</html>