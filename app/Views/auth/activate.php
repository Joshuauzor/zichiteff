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
            <a href="<?= base_url() ?>" class="h1"><b>Zichiteff</b> Activate Account</a>
        </div>
        <div class="card-body">
 
            <!-- validation messages -->
            <!-- success message -->
            <?php if (session()->get('success')) : ?>
                <div class="alert alert-success text-center" role="alert">
                    <?= session()->get('success') ?>
                </div>
            <?php endif ?>
            <!--  -->
            <?php if(isset($error)): ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?= $error ?>
                </div>
            <?php endif ?>
            <!-- success message ends -->
            <!-- validation messages end-->
          


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