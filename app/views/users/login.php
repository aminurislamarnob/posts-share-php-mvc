<?php require APP_ROOT.'/views/inc/header.php';?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3>User Login</h3>
                    <?php echo flash('register_success'); ?>
                    <form action="<?php echo URL_ROOT;?>/users/login" method="post">
                        <div class="form-group">
                            <label for="email">Email <span>*</span></label>
                            <input type="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Your email">
                            <div class="invalid-feedback"><?php echo $data['email_err']; ?></div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password <span>*</span></label>
                            <input type="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" name="password" id="password" placeholder="Your password">
                            <div class="invalid-feedback"><?php echo $data['password_err']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Login" class="btn btn-success">
                            </div>
                            <div class="col text-right">
                                <a href="<?php echo URL_ROOT;?>/users/register">No account? Register</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APP_ROOT.'/views/inc/footer.php';?>