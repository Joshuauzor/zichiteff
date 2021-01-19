<?php echo view('auth/fragments/header'); ?>
    <style>
        .login-box,
        .register-box {
            width: 500px;
        }
    </style>
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?= base_url() ?>" class="h1"><b>Zichiteff</b> Login</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <!-- validation messages -->
                <?php echo view('validationMessages')?>
            <!-- validation messages end-->
            <!-- validation messages end-->
            <form action="<?= base_url('auth') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Enter Email" name="email" value="<?= set_value('email') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <!-- error message-->
                <div class="input-group mb-3" style="margin-top: -3%;">
                    <?php if (isset($validation)) : ?>
                        <?php if($validation->hasError('email')):  ?>
                            <span class="text-danger"><?= $validation->getError('email') ?></span>
                        <?php endif ?>
                    <?php endif ?>
                </div>
                <!-- ends here -->
                <div class="input-group mb-3">
                    <input type="hidden" name="{csrf_token}" value="{csrf_hash}">
                    <input type="password" class="form-control" placeholder="Enter Password" name="password" value="<?= old('password') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <!-- error message-->
                <div class="input-group mb-3" style="margin-top: -3%;">
                    <?php if (isset($validation)) : ?>
                        <?php if($validation->hasError('password')):  ?>
                            <span class="text-danger"><?= $validation->getError('password') ?></span>
                        <?php endif ?>
                    <?php endif ?>
                </div>
                <!-- ends here -->
                <div class="row">
                    <div class="col-4">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-8">
                        <button type="submit" class="btn btn-primary btn-block">Click here to login</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="<?= base_url('auth/forgotPass') ?>"><b>Forgot Password?</b></a>
            </p>
            <!-- <p class="mb-0">
                <a href="<?= base_url('auth/register') ?>" class="text-center">Register a new membership</a>
            </p> -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- styles for making it responsive -->
<style>
@media(min-width:320px) and (max-width: 550px){
    .login-box{
        width: 380px;
    }
    .icheck-primary{
        font-size: small;
    }
}

</style>
<?php echo view('auth/fragments/footer'); ?>
