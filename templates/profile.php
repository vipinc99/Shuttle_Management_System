<!DOCTYPE html>
<html lang="zxx">
<?php include('header.php'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {
        height: 610px
    }

    /* Set gray background color and 100% height */
    .sidenav {
        background-color: #fbfbfb;
        height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
        background-color: #555;
        color: white;
        padding: 15px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
        .sidenav {
            height: auto;
            padding: 15px;
        }

        .row.content {
            height: auto;
        }
    }
</style>
<!-- //Header -->

<body>
    <div class="main-top">
        <!-- Navbar -->
        <?php include('navbar.php'); ?>
        <!-- //Navbar -->
    </div>

    <!-- blog -->
    <br><br>
    <div class="container">
        <div class="row content">
            <div class="col-sm-3 sidenav">
                <h4>Hi <?php echo $user_data['name']; ?></h4>
                <hr>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?php echo WEB_URL . 'users/dashboard'; ?>">Dashboard</a></li>
                    <li><a href="<?php echo WEB_URL . 'users/profile'; ?>">Update Profile</a></li>
                    <li><a href="<?php echo WEB_URL . 'users/wallet'; ?>">Wallet</a></li>
                    <li><a href="<?php echo WEB_URL . 'users/shuttle'; ?>">Shuttle Availability</a></li>
                    <li><a href="<?php echo WEB_URL . 'login/logout'; ?>">Logout</a></li>
                </ul>

            </div>

            <div class="col-sm-9">
                <h4><small>Welcome</small></h4>
                <hr>
                <h2>Update Profile</h2>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-group">
                        <label for="email">Name:</label>
                        <input type="text" class="form-control" id="email" placeholder="Enter email" name="name" value="<?php echo $user_data['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email: <small>Username can't change.</small></label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" readonly tabindex="-1" value="<?php echo $user_data['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Phone:</label>
                        <input type="number" class="form-control" id="email" placeholder="Enter email" name="phone" value="<?php echo $user_data['phone']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Change Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                    </div>

                    <button type="submit" class="btn btn-default">Update Profile</button>
                </form>

                <p class="text-center fw-bold mx-3 mb-0">
                    <font color="red"><?php if ($this->session->flashdata('success-msg') != '') {
                                            echo $this->session->flashdata('success-msg');
                                        } ?></font>
                </p>
            </div>
        </div>
    </div>
    <!-- //blog -->
    <!-- copyright bottom -->
    <?php include('footer.php'); ?>
    <!-- //copyright bottom -->
</body>

</html>