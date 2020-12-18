<?php echo view('admin/partials/head')?>
<?php echo view('admin/partials/header')?>
<?php echo view('admin/partials/themeSettings')?>
<?php echo view('admin/partials/navBar')?>
<?php echo view('admin/partials/intro')?>

<!-- validation messages -->
<?php echo view('validationMessages')?>
<!-- validation messages end-->
<!-- validation message -->
<?php if (isset($validation)) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $validation->listErrors() ?>
    </div>
<?php endif ?>
<!-- ends here -->   
    
    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                <span>Security</span>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                <span>User Profile</span>
            </a>
        </li> -->
    </ul>

    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Reset User Password</h5>
                    <form class="" method="post" action="<?= base_url('admin/user') ?>">
                        <div class="position-relative form-group"><label for="email" class="">Email</label>
                            <select name="email" id="" class="form-control" required>
                                <option value="" selected disabled>Select a User</option>
                                <?php foreach($AllUsers as $row): ?>
                                    <option value="<?= $row->email ?>" <?= set_select('email', $row->email ); ?>><?= $row->email ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="password" class="">New Password</label><input name="password" id="password" value="<?= set_value('password') ?>" placeholder="Enter New Password" type="password" class="form-control" required></div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="confirmPass" class="">Confirm Password</label><input name="confirmPass" id="confirmPass" value="<?= set_value('confirmPass') ?>" placeholder="Confirm Password" type="password" class="form-control" required></div>
                            </div>
                        </div>
                        <button class="mt-2 btn btn-primary">Change</button>
                    </form>
                </div>
            </div>
            <!-----------------------------------------------------------------------  -->
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">User Status</h5>
                    <div>
                        <form class="form-inline" method="post" action="<?= base_url('admin/user/status') ?>">
                            <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group"><label for="exampleEmail22" class="mr-sm-2">Email</label>
                                <select name="email" id="" class="form-control" required>
                                    <option value="" selected disabled>Select a User</option>
                                    <?php foreach($AllUsers as $row): ?>
                                        <option value="<?= $row->email ?>" <?= set_select('email', $row->email ); ?>><?= $row->email ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group"><label for="examplePassword22" class="mr-sm-2">Status</label>
                                <select name="status" id="" class="form-control" >
                                    <option value="" selected disabled>Select Status</option>
                                    <option value="inactive" <?= set_select('status', 'inactive'); ?>>Deactivate</option>
                                    <option value="active" <?= set_select('status', 'active'); ?>>Activate</option>          
                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="password" class="mr-2">Enter Password:</label>
                                    <input name="password" id="password" value="<?= set_value('password') ?>" placeholder="Enter Your Password" type="password" class="form-control" required>
                                </div>
                            </div>
                            <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-----------------------------------------------------------------------  -->
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">User Right</h5>
                    <div>
                        <form class="form-inline" method="post" action="<?= base_url('admin/user/right') ?>">
                            <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group"><label for="exampleEmail22" class="mr-sm-2">Email</label>
                                <select name="email" id="" class="form-control" required>
                                    <option value="" selected disabled>Select User</option>
                                    <?php foreach($AllUsers as $row): ?>
                                        <option value="<?= $row->email ?>" <?= set_select('email', $row->email ); ?>><?= $row->email ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group"><label for="exampleEmail22" class="mr-sm-2">Email</label>
                                <select name="right" id="" class="form-control" required>
                                    <option value="" selected disabled>Select Right</option>
                                        <option value="all" <?= set_select('right', 'all'); ?>>All</option>
                                        <option value="view" <?= set_select('right', 'view'); ?>>View</option>
                                        <option value="edit" <?= set_select('right', 'edit'); ?>>Edit</option>
                                        <option value="delete" <?= set_select('right', 'delete'); ?>>Delete</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="password" class="mr-2">Enter Password:</label>
                                    <input name="password" id="password" value="<?= set_value('password') ?>" placeholder="Enter Your Password" type="password" class="form-control" required>
                                </div>
                            </div>
                            <button class="btn btn-primary">Submit</button>
                        </form>
                        <div class="divider"></div>
                        <!--  -->
                    </div>
                </div>
            </div>
        </div>

        
         <!-- tab 2 -->

        <!-- <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Edit User Profile</h5>
                    <form class="">
                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10"><input name="email" id="exampleEmail" placeholder="with a placeholder" type="email" class="form-control"></div>
                        </div>
                        <div class="position-relative row form-group"><label for="examplePassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10"><input name="password" id="examplePassword" placeholder="password placeholder" type="password" class="form-control"></div>
                        </div>
                        <div class="position-relative row form-group"><label for="exampleSelect" class="col-sm-2 col-form-label">Select</label>
                            <div class="col-sm-10"><select name="select" id="exampleSelect" class="form-control"></select></div>
                        </div>
                        <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Select Multiple</label>
                            <div class="col-sm-10"><select multiple="" name="selectMulti" id="exampleSelectMulti" class="form-control"></select></div>
                        </div>
                        <div class="position-relative row form-group"><label for="exampleText" class="col-sm-2 col-form-label">Text Area</label>
                            <div class="col-sm-10"><textarea name="text" id="exampleText" class="form-control"></textarea></div>
                        </div>
                        <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">File</label>
                            <div class="col-sm-10"><input name="file" id="exampleFile" type="file" class="form-control-file">
                                <small class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                            </div>
                        </div>
                        <fieldset class="position-relative row form-group">
                            <legend class="col-form-label col-sm-2">Radio Buttons</legend>
                            <div class="col-sm-10">
                                <div class="position-relative form-check"><label class="form-check-label"><input name="radio2" type="radio" class="form-check-input"> Option one is this and that—be sure to include why it's great</label></div>
                                <div class="position-relative form-check"><label class="form-check-label"><input name="radio2" type="radio" class="form-check-input"> Option two can be something else and selecting it will deselect option
                                    one</label></div>
                                <div class="position-relative form-check disabled"><label class="form-check-label"><input name="radio2" disabled="" type="radio" class="form-check-input"> Option three is disabled</label></div>
                            </div>
                        </fieldset>
                        <div class="position-relative row form-group"><label for="checkbox2" class="col-sm-2 col-form-label">Checkbox</label>
                            <div class="col-sm-10">
                                <div class="position-relative form-check"><label class="form-check-label"><input id="checkbox2" type="checkbox" class="form-check-input"> Check me out</label></div>
                            </div>
                        </div>
                        <div class="position-relative row form-check">
                            <div class="col-sm-10 offset-sm-2">
                                <button class="btn btn-secondary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
    </div>


  

<?php echo view('admin/partials/footer')?>
