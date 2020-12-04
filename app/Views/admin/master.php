<?php echo view('admin/partials/head')?>
<?php echo view('admin/partials/header')?>
<?php echo view('admin/partials/themesettings')?>
<?php echo view('admin/partials/navbar')?>
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
            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#master">
                <span>Master</span>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#Services">
                <span>Services</span>
            </a>
        </li> -->
    </ul>
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="master" role="tabpanel">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Master Setup</h5>
                    <form class="" action="<?= base_url('admin/master') ?>" method="post">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="CompanyEmail" class="">Official Email</label><input name="email" id="exampleEmail11" value="<?= $masterInfo->com_email ?>" placeholder="Enter Company's Email Address" type="email" class="form-control" required></div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="examplePassword11" class="">Official Phone</label><input name="phone" value="<?= $masterInfo->com_phone ?>" id="examplePassword11" placeholder="Enter Company's Phone" type="text" class="form-control" required></div>
                            </div>
                        </div>
                        <div class="position-relative form-group"><label for="Address" class="">Official Address</label><input name="address" id="exampleAddress" value="<?= $masterInfo->com_address ?>" placeholder="Enter Company's Address" type="text" class="form-control" required></div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="exampleCity" class="">Project Completed</label><input name="project" value="<?= $masterInfo->project_completed ?>" placeholder="Enter Number of Project Completed" id="exampleCity" type="number" class="form-control" required></div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="exampleState" class="">Happy Client</label><input name="client" value="<?= $masterInfo->happy_clients ?>" placeholder="Enter Number of Happy Client" id="exampleState" type="number" class="form-control" required></div>
                            </div>
                        </div>
                        <!-- <div class="position-relative form-check"><input name="check" id="exampleCheck" type="checkbox" class="form-check-input"><label for="exampleCheck" class="form-check-label">Check me out</label></div> -->
                        <button class="mt-2 btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
            <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Social Link</h5>
                    <form class="" method="post" action="<?= base_url('admin/master/social')?>">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="exampleCity" class="">Facebook</label></div>
                                <div class="input-group mb-3" style="margin-top: -3%;">
                                    <input type="text" class="form-control" placeholder="Enter Facebook link" name="facebook" value="<?= $masterInfo->facebook ?>" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fa fa-facebook-official fa-lg"><i class="sr-only">Facebook</i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="exampleCity" class="">Twitter</label></div>
                                <div class="input-group mb-3" style="margin-top: -3%;">
                                    <input type="text" class="form-control" placeholder="Enter Twitter link" name="twitter" value="<?= $masterInfo->twitter ?>" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fa fa-twitter on fa-square-o fa-lg"><i class="sr-only">Twitter</i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="exampleCity" class="">Instagram</label></div>
                                <div class="input-group mb-3" style="margin-top: -3%;">
                                    <input type="text" class="form-control" placeholder="Enter Instagram link" name="instagram" value="<?= $masterInfo->instagram ?>" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fa fa-instagram on fa-square-o fa-lg"><i class="sr-only">Instagram</i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="exampleCity" class="">LinkedIn</label></div>
                                <div class="input-group mb-3" style="margin-top: -3%;">
                                    <input type="text" class="form-control" placeholder="Enter LinkedIn link" name="linkedin" value="<?= $masterInfo->linkedin ?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fa fa-linkedin-square fa-lg"><i class="sr-only">LinkedIn</i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="position-relative form-check"><input name="check" id="exampleCheck" type="checkbox" class="form-check-input"><label for="exampleCheck" class="form-check-label">Check me out</label></div> -->
                        <button class="mt-2 btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>


         <!-- tab 2 -->

        <!-- <div class="tab-pane tabs-animation fade" id="Services" role="tabpanel">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Add Service</h5>
                    <form class="">
                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Service</label>
                            <div class="col-sm-10"><input name="service" id="exampleEmail" value="<?= set_value('service') ?>" placeholder="Add a service" type="text" class="form-control"></div>
                        </div>
                        <div class="position-relative row form-group"><label for="exampleText" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10"><textarea name="description" value="<?= set_value('description') ?>" placeholder="Add Service Description"  id="exampleText" class="form-control"></textarea></div>
                        </div>
                        <div class="position-relative row form-check">
                            <div class="col-sm-10 offset-sm-2">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Add Service</h5>
                    <form class="" method="post" action="<?= base_url('admin/master/services') ?>">
                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Service</label>
                            <div class="col-sm-10">
                                <select name="service" id="" class="form-control" required>
                                    <option value="" selected disabled>Select a Service to Delete</option>
                                    <?php foreach($totalService as $row): ?>
                                        <option value="<?= $row->type ?>" <?= set_select('service', $row->type ); ?>><?= $row->type ?></option>
                                    <?php endforeach ?>
                                </select>                        
                            </div>
                        </div>
                        <div class="position-relative row form-check">
                            <div class="col-sm-10 offset-sm-2">
                                <button class="btn btn-primary">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
    </div>

<?php echo view('admin/partials/footer')?>
