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
            <a href="<?= base_url() ?>" class="h1"><b>Zichiteff</b> Forgot Password</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Enter Email to Reset Password</p>
            <!-- validation messages -->
                <?php echo view('validationMessages')?>
            <!-- validation messages end-->
            <!-- success message ends -->
            <!-- validation messages end-->
            <form action="<?= base_url('auth/forgotPass') ?>" method="post">
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
              <!-- ends -->
                <div class="row">
                    <!-- /.col -->
                    <div class="col-8">
                        <button type="submit" class="btn btn-primary btn-block">Click here to Reset</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="<?= base_url('auth') ?>"><b>Back to Login?</b></a>
            </p>
        
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->
<?php echo view('auth/fragments/footer'); ?>