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
                    <li class="active"><a href="<?php echo WEB_URL . 'report/dashboard'; ?>">Dashboard</a></li>
                    <li><a href="<?php echo WEB_URL . 'admin/logout'; ?>">Logout</a></li>
                </ul>

            </div>

            <div class="col-sm-9">
                <h4><small>Welcome Admin</small></h4>
                <hr>
                <h2>Shuttle Booking Reports</h2>
                <?php if (isset($order_data)) { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Booking #</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Shuttle</th>
                                <th>Source</th>
                                <th>Destination</th>
                                <th>Amount</th>
                                <th>Transaction ID</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($order_data as $row) { ?>
                                <tr>
                                    <td><?php echo $row->id; ?></td>
                                    <td><?php echo $row->name; ?></td>
                                    <td><?php echo $row->phone; ?></td>
                                    <td><?php echo strtoupper($row->type); ?></td>
                                    <td><?php echo $row->source; ?></td>
                                    <td><?php echo $row->destination; ?></td>
                                    <td><?php echo $row->amount; ?></td>
                                    <td><?php echo $row->transaction_id; ?></td>
                                    <td><?php echo $row->created_date; ?></td>
                                </tr>
                            <?php } ?>
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
</body>
</html>