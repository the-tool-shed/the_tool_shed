<header class="navbar navbar-default navbar-fixed-top">
    <div>
        <div id='logo'>
            <a href='#'>The Tool Shed</a>
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
    </div>
</header>