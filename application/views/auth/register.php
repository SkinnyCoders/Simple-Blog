<div class="container login-container">
    <div class="row">
        <div class="col-md-6 offset-md-3 login-form-2">
            <h3>Registrasi</h3>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Your Full Name *" value="<?= set_value('name') ?>" />
                    <small class="text-danger"><?= form_error('name') ?></small>
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Your Email *" value="<?= set_value('email') ?>" />
                    <small class="text-danger"><?= form_error('email') ?></small>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" name="password1" class="form-control" placeholder="Your Password *" value="" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" name="password2" class="form-control" placeholder="Confirm Password *" value="" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="Login" />
                </div>
                <div class="form-group">
                    <a href="#" class="ForgetPwd">Forget Password?</a>
                </div>
            </form>
        </div>
    </div>
</div>