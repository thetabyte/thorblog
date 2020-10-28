<header>
        <a href="<?php echo BASE_URL . '/index.php' ?>" class="logo">
            <h1 class="logo-text"><span>Bifrost</span>Daily</h1>
        </a>
         <i class="fa fa-bars menu-toggle"></i>   
        <ul class="nav">
            <li><a href="<?php echo BASE_URL . '/index.php' ?>">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <!--<li><a href="#"></a>Sign Up</li>
            <li><a href="#"></a>Login</li>-->
            
            <li>
                <a href="#">
                    <i class="fa fa-user"></i>
                    Ilsa Faust <!--Locked in user, above buttons commented out to focus on styling user item-->
                    <i class="fa fa-chevron-down" style="font-size: .8em;"></i> <!--styling ideally should be in style sheet target ul list and place styling-->
                </a> 
                <ul>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#" class="logout">Logout</a></li>
                </ul>
            </li> 
        </ul>
    </header>