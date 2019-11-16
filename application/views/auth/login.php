<div class="container login-container">
    <div class="row">
        <div class="col-md-6 offset-md-3 login-form-2">
            <h3>Login Bang</h3>
            <p><?= $this->session->flashdata('pesan') ?></p>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Your Email *" value="<?= set_value('email') ?>" />
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Your Password *" value="" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="Login" />
                </div>
                <div class="form-group text-center">
                    <a href="#" class="ForgetPwd">Forget Password?</a><br />
                    <a href="<?= base_url('auth/register') ?>" class="ForgetPwd">Register New account</a>
                </div>
            </form>
        </div>
    </div>
</div>