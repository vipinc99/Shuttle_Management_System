<header>
    <div class="container-fluid">
        <h1 class="logo text-center">
            <img src="<?php echo STATIC_ASSETS; ?>images/vitlogo.jpg" alt="" height="60" width="60">
            <a href="<?php echo WEB_URL;?>">Shuttle</a>
        </h1>
        <!-- menu -->
        <div class="nav-menus">
            <ul id="menu">
                <li>
                    <input id="check02" type="checkbox" name="menu" />
                    <label for="check02"><span class="fa fa-bars" aria-hidden="true"></span></label>
                    <ul class="submenu">
                        <?php
                        if ($this->session->userdata('isUserLoggedIn') == TRUE) { ?>
                            <li><a href="<?php echo WEB_URL . 'users/dashboard'; ?>" class="active">Dashboard</a></li>
                            <li><a href="<?php echo WEB_URL . 'login/logout'; ?>">Logout</a></li>
                        <?php } else { ?>
                            <?php if ($this->session->userdata('adminUserId') != TRUE) { ?>
                                <li><a href="<?php echo WEB_URL; ?>" class="active">Home</a></li>
                                <li><a href="<?php echo WEB_URL . 'login'; ?>">Login</a></li>
                                <li><a href="<?php echo WEB_URL . 'login/register'; ?>">Register</a></li>
                                <!-- <li><a href="<?php echo WEB_URL . 'welcome/page/about'; ?>">About Us</a></li> -->
                            <?php } ?>

                            <!-- <li><a href="<?php //echo WEB_URL . 'welcome/page/blog'; 
                                                ?>">Blog</a></li>
                        <li><a href="<?php //echo WEB_URL . 'welcome/page/gallery'; 
                                        ?>">Gallery</a></li> -->
                            <!-- <li><a href="<?php //echo WEB_URL . 'welcome/page/contact'; 
                                                ?>">Contact Us</a></li> -->
                        <?php }
                        ?>

                    </ul>
                </li>
            </ul>
        </div>
        <!-- //menu -->
    </div>
</header>