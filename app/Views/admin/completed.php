<?php echo view('admin/partials/head')?>
<?php echo view('admin/partials/header')?>
<?php echo view('admin/partials/themeSettings')?>
<?php echo view('admin/partials/navBar')?>
<?php echo view('admin/partials/intro')?>

<!-- validation messages -->
<?php echo view('validationMessages')?>
<!-- validation messages end-->

<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Completed Request</h5>
                        <div class="table-responsive">
                        <table class="mb-0 display request table table-bordered" id="datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Service</th>
                                <th>Details</th>
                                <th>Status</th>
                                <th>Date Of Request</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i=0;
                                foreach($totalCompleted as $row): $i++;
                                ?>       
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                </div>
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading"><?= $row->name ?></div>
                                                    <div class="widget-subheading opacity-7"><?= $row->location ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= $row->email  ?></td>
                                    <td><?= $row->phone  ?></td>
                                    <td><?= $row->type  ?></td>
                                    <td><?= $row->message  ?></td>
                                    <td><div class="badge badge-<?= $row->color_badge?>"><?= $row->status_name ?></div></td>
                                    <td><?= date('l d M Y h:i:s', strtotime($row->date )) ?></td>
                                    <!-- <td><a href="<?= base_url('admin/requests/deleteTotal/'.$row->id) ?>" class="test" id="<?= $row->id?>"><button class="mb-2 mr-2 btn btn-danger">Delete</button></a> -->
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <div class="d-block text-center card-footer">
                        <form action="<?= base_url('admin/export/completed')?>" method="post">
                           <input type="submit" class="btn-shadow dropdown-toggle btn btn-primary" value="Export">
                        </form>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</div>

<?php echo view('admin/partials/footer')?>
