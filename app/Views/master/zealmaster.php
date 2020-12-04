<?php echo view('auth/fragments/header'); ?>
    <style>
        .errors li{
            list-style-type: none;
            width: 100%;
            text-align: center;
        }
        .errors ul{
            padding-bottom: 0;
            margin-bottom: 0;
        }
    </style>
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?= base_url() ?>" class="h1"><b>Zeal Technologies</b> Master</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Master Password</p>
            <!-- validation messages -->
            <!-- success message -->
            <?php if (session()->get('success')) : ?>
                <div class="alert alert-success text-center" role="alert">
                    <?= session()->get('success') ?>
                </div>
            <?php endif ?>
            <!-- success message ends -->
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif ?>
            <!-- success message ends -->
            <!-- validation messages end-->
            <form action="<?= base_url('zealmaster/update') ?>" method="post">
        
                <div class="input-group mb-3">
                    <input type="hidden" name="{csrf_token}" value="{csrf_hash}">
                    <input type="password" class="form-control" placeholder="Enter Password" name="password" value="<?= set_value('password') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
    
                <div class="row">
            
                    <!-- /.col -->
                    <div class="col-8">
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->
<?php echo view('auth/fragments/footer'); ?>