<?php echo view('auth/fragments/header'); ?>
<!-- style to make register responsive -->
<style>
    @media only screen and (min-width: 700px){
        .window{
            margin-top: 6%;
        }
    }
</style>

<div class="container window">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?= base_url() ?>" class="h1"><b>Zichiteff</b> Registration</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Zichiteff Account Registration</p>
            <!-- validation messages -->
                <?php echo view('validationMessages')?>
            <!-- validation messages end-->
            <form action="<?= base_url('auth/register') ?>" method="post">
                <h3>Personal Information</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Enter First Name" name="firstname" value="<?= set_value('firstname') ?>" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3" style="margin-top: -3%;">
                            <?php if (isset($validation)) : ?>
                                <?php if($validation->hasError('firstname')):  ?>
                                    <span class="text-danger"><?= $validation->getError('firstname') ?></span>
                                <?php endif ?>
                            <?php endif ?>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Enter Last Name" name="lastname" value="<?= set_value('lastname') ?>" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3" style="margin-top: -3%;">
                            <?php if (isset($validation)) : ?>
                                <?php if($validation->hasError('lastname')):  ?>
                                    <span class="text-danger"><?= $validation->getError('lastname') ?></span>
                                <?php endif ?>
                            <?php endif ?>
                        </div>

                       

                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Enter Email" name="email" value="<?= set_value('email') ?>" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3" style="margin-top: -3%;">
                            <?php if (isset($validation)) : ?>
                                <?php if($validation->hasError('email')):  ?>
                                    <span class="text-danger"><?= $validation->getError('email') ?></span>
                                <?php endif ?>
                            <?php endif ?>
                        </div>

                        <div class="input-group mb-3">
                            <input type="phone" class="form-control" placeholder="Enter Master Code" name="master_code" value="<?= set_value('master_code') ?>" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-flag"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3" style="margin-top: -3%;">
                            <?php if (isset($validation)) : ?>
                                <?php if($validation->hasError('master_code')):  ?>
                                    <span class="text-danger"><?= $validation->getError('master_code') ?></span>
                                <?php endif ?>
                            <?php endif ?>
                        </div>
                    </div>
                        
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input type="phone" class="form-control" placeholder="Enter Phone Number" name="phone" value="<?= set_value('phone') ?>" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3" style="margin-top: -3%;">
                            <?php if (isset($validation)) : ?>
                                <?php if($validation->hasError('phone')):  ?>
                                    <span class="text-danger"><?= $validation->getError('phone') ?></span>
                                <?php endif ?>
                            <?php endif ?>
                        </div>

                        <div class="input-group mb-3">
                            <select class="form-control" name="gender" id="gender" required>
                                <option value="" selected>-- Select Gender --</option>
                                <option value="male" <?php echo  set_select('gender', 'male'); ?>>Male</option>
                                <option value="female" <?php echo  set_select('gender', 'female'); ?>>Female</option>
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3" style="margin-top: -3%;">
                            <?php if (isset($validation)) : ?>
                                <?php if($validation->hasError('gender')):  ?>
                                    <span class="text-danger"><?= $validation->getError('gender') ?></span>
                                <?php endif ?>
                            <?php endif ?>
                        </div>

                        <div class="input-group mb-3">
                            <input type="hidden" name="{csrf_token}" value="{csrf_hash}">
                            <input type="password" class="form-control" placeholder="Enter Password" name="password" value="<?= set_value('password') ?>" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
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
                            <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_pass" value="<?= set_value('password') ?>" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-flag"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3" style="margin-top: -3%;">
                            <?php if (isset($validation)) : ?>
                                <?php if($validation->hasError('confirm_pass')):  ?>
                                    <span class="text-danger"><?= $validation->getError('confirm_pass') ?></span>
                                <?php endif ?>
                            <?php endif ?>
                        </div>
                    </div>
                    <!-- <div class="col-md-12">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Enter Address" name="address" value="<?= set_value('address') ?>" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-map-marker"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3" style="margin-top: -3%;">
                        <?php if (isset($validation)) : ?>
                            <?php if($validation->hasError('address')):  ?>
                                <span class="text-danger"><?= $validation->getError('address') ?></span>
                            <?php endif ?>
                        <?php endif ?>
                    </div> -->
                </div>
                
                <!-- /.col -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Click here to Register</button>
                </div>
                <!-- /.col -->
        </div>
        </form>
        <p class="mb-3 p-3" style="margin: -3% auto 0 auto;">
            <a href="<?= base_url('admin/home') ?>" class="text-center">Return to Dashbaord?</a>
        </p>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.login-box -->
<?php echo view('auth/fragments/footer'); ?>