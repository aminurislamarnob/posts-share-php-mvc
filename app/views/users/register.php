<?php require APP_ROOT.'/views/inc/header.php';?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3>User Register</h3>
                    <form action="<?php echo URL_ROOT;?>/users/register" method="POST">
                        <div class="form-group">
                            <label for="name">Name <span>*</span></label>
                            <input type="text" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" name="name" id="name_err" placeholder="Your name" value="<?php echo $data['name']; ?>">
                            <div class="invalid-feedback"><?php echo $data['name_err']; ?></div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span>*</span></label>
                            <input type="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" name="email" id="email" placeholder="Your email" value="<?php echo $data['email']; ?>">
                            <div class="invalid-feedback"><?php echo $data['email_err']; ?></div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password <span>*</span></label>
                            <input type="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" name="password" id="password" placeholder="Your password" value="<?php echo $data['password']; ?>">
                            <div class="invalid-feedback"><?php echo $data['password_err']; ?></div>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password <span>*</span></label>
                            <input type="password" class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" name="confirm_password" id="confirm_password" placeholder="Your confirm password" value="<?php echo $data['confirm_password']; ?>">
                            <div class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Register" class="btn btn-success">
                            </div>
                            <div class="col text-right">
                                <a href="<?php echo URL_ROOT;?>/users/login">Have an account? Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APP_ROOT.'/views/inc/footer.php';?>