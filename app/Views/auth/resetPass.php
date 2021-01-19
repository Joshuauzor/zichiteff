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
            <p class="login-box-msg">Reset your password</p>
            <!-- validation messages -->
            <?php if(isset($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
                <p class="mb-1">
                <a href="<?= base_url('auth/login') ?>">Click here to Login</a>
            </p>
            <?php else: ?>
                <!-- validation messages end-->
                <?= form_open() ?>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Enter Password" name="password" value="<?= set_value('password') ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3" style="margin-top: -3%;">
                        <?php if (isset($validation)) : ?>
                            <?php if($validation->hasError('password')):  ?>
                                <span class="text-danger"><?= $validation->getError('password') ?></span>
                            <?php endif ?>
                        <?php endif ?>
                    </div>
                    <div class="input-group mb-3">
                        <input type="hidden" name="{csrf_token}" value="{csrf_hash}">
                        <input type="password" class="form-control" placeholder="Confirm Password" name="confirmPass" value="<?= set_value('confirm_pass') ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3" style="margin-top: -3%;">
                        <?php if (isset($validation)) : ?>
                            <?php if($validation->hasError('confirmPass')):  ?>
                                <span class="text-danger"><?= $validation->getError('confirmPass') ?></span>
                            <?php endif ?>
                        <?php endif ?>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-8">
                            <button type="submit" class="btn btn-primary btn-block">Click here to Reset</button>
                        </div>
                        <!-- /.col -->
                    </div>
                <?= form_close() ?>
            <?php endif ?>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

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