<!DOCTYPE html>
<html lang="zxx">
<!-- Header -->
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
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Shuttle 1</h2>
                        <div class="panel panel-default">

                            <div class="panel-body" align="center" onclick="tripData('shuttle1');">SJT</div>


                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h2>Shuttle 2</h2>
                        <div class="panel panel-default">

                            <div class="panel-body" align="center" onclick="tripData('shuttle2');">TT</div>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h2>Shuttle 3</h2>
                        <div class="panel panel-default">

                            <div class="panel-body" align="center" onclick="tripData('shuttle3');">MGB</div>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h2>Shuttle 4</h2>
                        <div class="panel panel-default">

                            <div class="panel-body" align="center" onclick="tripData('shuttle4');">SMV</div>

                        </div>
                    </div>
                </div>

                <div id="map" style="width: 100%; height: 250px;"></div>

            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
    <script type="text/javascript">
        var locations = [
            ['SJT', 12.9712106, 79.1637036, 1],
            ['TT', 12.9709443, 79.1594224, 2],
            ['MGB', 12.9725590, 79.1675435, 3],
            ['PRP', 12.9722107, 79.1658514, 4],
            ['SMV', 12.9687354, 79.1576954, 5]
        ];

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: new google.maps.LatLng(12.9712106, 79.1637036),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }

        function tripData(val) {
            var url = "<?php echo WEB_URL . 'users/trip/' ?>" + val;
            location.href = url;
        }
    </script>
</body>

</html>