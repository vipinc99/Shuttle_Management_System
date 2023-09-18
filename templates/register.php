<!DOCTYPE html>
<html lang="zxx">

<?php include('header.php'); ?>

<body>
    <div class="main-top">
        <?php include('navbar.php'); ?>
    </div>

    <div class="container">
        <br>
        <section class="vh-100" style="margin-top: 100px;">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="<?php echo STATIC_ASSETS; ?>images/draw2.webp" class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">
                                <font color="blue">New User Registration Form</font>
                            </p>
                        </div>
                        <p class="text-center fw-bold mx-3 mb-0"> <font color="red"><?php if( $this->session->flashdata('error-msg') != ''){
                                    echo $this->session->flashdata('error-msg');
                                }?></font></p>
                        <form action="<?php echo WEB_URL . 'login/register_exe'; ?>" method="POST">
                            <div class="form-outline mb-4">
                                <input type="text" id="form3Example3" class="form-control form-control-lg" placeholder="Full Name" name="name" required />
                                <label class="form-label" for="form3Example3">Full Name</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="email" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a valid email address" name="email" required />
                                <label class="form-label" for="form3Example3">Email address</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a valid 10 digit number" name="phone" required />
                                <label class="form-label" for="form3Example3">Phone Number</label>
                            </div>

                            <div class="form-outline mb-3">
                                <input type="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" name="password" required />
                                <label class="form-label" for="form3Example4">Password</label>
                            </div>
                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Already registered? <a href="<?php echo WEB_URL . 'login'; ?>" class="link-danger">Login here </a></p>                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>