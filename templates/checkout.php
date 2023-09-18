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
                <h2>Shuttle Booking</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-group">
                        <label for="email">Source:</label>
                        <input type="hidden" class="form-control" id="type" placeholder="Type" name="type" value="<?php echo $shuttle_type; ?>" readonly>
                        <select name="source" id="source" class="form-control" style="
    height: 34px !important;
">
                            <option value="0">- select source -</option>
                            <option value="SJT-12.9712106,79.1637036">SJT</option>
                            <option value="TT-12.9709443,79.1594224">TT</option>
                            <option value="MGB-12.9725590,79.1675435">MGB</option>
                            <option value="SMW-12.9687354,79.1576954">SMW</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Destination:</label>
                        <select name="destination" id="destination" class="form-control" style="
    height: 34px !important;
">
                            <option value="0">- select destination -</option>
                            <option value="SJT-12.9712106,79.1637036">SJT</option>
                            <option value="TT-12.9709443,79.1594224">TT</option>
                            <option value="MGB-12.9725590,79.1675435">MGB</option>
                            <option value="SMW-12.9687354,79.1576954">SMW</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-default">Continue</button>
                </form>

                <p class="text-center fw-bold mx-3 mb-0">
                    <font color="red"><?php if ($this->session->flashdata('success-msg') != '') {
                                            echo $this->session->flashdata('success-msg');
                                        } ?></font>
                </p>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        function tripData(val) {
            var url = "<?php echo WEB_URL . 'users/trip/' ?>" + val;
            location.href = url;
        }
    </script>
</body>

</html>