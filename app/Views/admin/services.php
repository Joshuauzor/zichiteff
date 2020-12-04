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
            <a role="tab" class="nav-link active" id="tab-1" data-toggle="tab" href="#Services">
                <span>Services</span>
            </a>
        </li>
    </ul>
    <div class="tab-content">
         <!-- tab 2 -->

        <div class="tab-pane tabs-animation fade show active" id="Services" role="tabpanel">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Add Service</h5>
                    <form class="" method="post" action="<?= base_url('admin/master/services') ?>">
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
                <div class="card-body"><h5 class="card-title">Delete Service</h5>
                    <form class="" method="post" action="<?= base_url('admin/master/deleteService') ?>">
                        <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Service</label>
                            <div class="col-sm-10">
                                <select name="service" id="" class="form-control" required>
                                    <option value="" selected disabled>Select a Service to Delete</option>
                                    <?php foreach($totalService as $row): ?>
                                        <option value="<?= $row->services_id ?>" <?= set_select('service', $row->type ); ?>><?= $row->type ?></option>
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
        </div>
    </div>

<?php echo view('admin/partials/footer')?>
