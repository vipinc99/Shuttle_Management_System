<!DOCTYPE html>
<html lang="zxx">
<?php include('header.php'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    .row.content {
        height: 610px
    }
    .sidenav {
        background-color: #fbfbfb;
        height: 100%;
    }
    footer {
        background-color: #555;
        color: white;
        padding: 15px;
    }
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
<body>
    <div class="main-top">
        <?php include('navbar.php'); ?>
    </div>
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
                <h2>Wallet balance: ₹<?php echo isset($user_wallet->amount) ? $user_wallet->amount : '0.00'; ?></h2>

                <hr>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-group">
                        <label for="email">Top up Wallet:</label>
                        <input type="number" class="form-control" id="amount" placeholder="Minimum ₹100" name="amount" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    </div>


                    <button type="submit" class="btn btn-default">Top-Up</button>
                </form>

                <p class="text-center fw-bold mx-3 mb-0">
                    <font color="red"><?php if ($this->session->flashdata('success-msg') != '') {
                                            echo $this->session->flashdata('success-msg');
                                        } ?></font>
                </p>
            </div>
        </div>
    </div>
</body>

</html>