<!DOCTYPE html>
<html lang="zxx">
<?php include('header.php'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyAZ6YyrIHnFZ-vpGlPT99dGmZWGkNzqcp4" type="text/javascript"></script>
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
                <h2>Shuttle Booking - Payment</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-group">
                        <label for="email">Shuttle:</label>
                        <input type="text" class="form-control" id="type" placeholder="Shuttle" name="type" required readonly value="<?php echo $shuttle_type['type']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Source:</label>
                        <input type="text" class="form-control" id="source" placeholder="Source" name="source" required readonly value="<?php echo $shuttle_type['source']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Destination:</label>
                        <input type="text" class="form-control" id="destination" placeholder="Destination" name="destination" required readonly value="<?php echo $shuttle_type['destination']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Amount:</label>
                        <input type="text" class="form-control" id="amount" placeholder="Amount" name="amount" required onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="15" readonly>
                    </div>
                    Available Amount in Wallet ₹<?php echo isset($user_wallet->amount) ? $user_wallet->amount : '0.00' ?><br><br>
                    <?php
                    if (isset($user_wallet->amount) && $user_wallet->amount > 15) { ?>
                        <button type="submit" class="btn btn-success">Pay ₹15</button>
                    <?php } else { ?>
                        <button type="submit" class="btn btn-danger" disabled>Pay ₹15</button>
                        <a href="<?php echo WEB_URL . 'users/wallet'; ?>" class="btn btn-primary">Top-Up Wallet</a>
                    <?php }    ?>

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