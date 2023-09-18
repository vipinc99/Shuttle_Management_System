<!DOCTYPE html>
<html lang="zxx">
<?php include('header.php'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyAZ6YyrIHnFZ-vpGlPT99dGmZWGkNzqcp4&callback=initMap" type="text/javascript"></script>
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
                <h2>Current Booking Details</h2>
                <?php if (isset($order_data['order_id'])) { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Booking #</th>
                                <th>Shuttle</th>
                                <th>Source</th>
                                <th>Destination</th>
                                <th>Amount</th>
                                <th>Transaction ID</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $order_data['order_id']; ?></td>
                                <td><?php echo strtoupper($order_data['trip']['type']); ?></td>
                                <td><?php echo $order_data['trip']['source']; ?></td>
                                <td><?php echo $order_data['trip']['destination']; ?></td>
                                <td>₹15.00</td>
                                <td>#<?php echo $order_data['transaction_id']; ?></td>
                                <td><?php echo $order_data['date']; ?></td>
                            </tr>

                        </tbody>
                    </table>
                    <div id="map" style="width: 100%; height: 380px; float: left;"></div>
                <?php } else {
                    echo "Data not available..";
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    $source_latlang = explode("-", $order_data['trip']['source']);
    $source = explode(",", $source_latlang[1]);
    $des_latlang = explode("-", $order_data['trip']['destination']);
    $destination = explode(",", $des_latlang[1]);
    ?>
    <?php include('footer.php'); ?>
    <script type="text/javascript">
        var lat = '<?php echo $source[0] ?>';
        var lang = '<?php echo $source[1] ?>';
        var dlat = '<?php echo $destination[0] ?>';
        var dlang = '<?php echo $destination[1] ?>';

        var directionsService = new google.maps.DirectionsService();
        var directionsDisplay = new google.maps.DirectionsRenderer();
        var trafficLayer = new google.maps.TrafficLayer();
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 7,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        directionsDisplay.setMap(map);
        trafficLayer.setMap(map);
        directionsDisplay.setPanel(document.getElementById('panel'));
        var request = {
            origin: new google.maps.LatLng(lat, lang),
            destination: new google.maps.LatLng(dlat, dlang),
            travelMode: google.maps.TravelMode.DRIVING
        };
        directionsService.route(request, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            }
        });
        trafficLayer.route(request, function(response, status) {
            trafficLayer.setDirections(response);
        });
    </script>
</body>
</html>