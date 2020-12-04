<?php echo view('admin/partials/head')?>
<?php echo view('admin/partials/header')?>
<?php echo view('admin/partials/themesettings')?>
<?php echo view('admin/partials/navbar')?>
<?php echo view('admin/partials/intro')?>

<!-- validation messages -->
<?php echo view('validationMessages')?>
<!-- validation messages end-->

<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Total Request</h5>
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
                                <th>EDIT</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i=0;
                                foreach($totalRequest as $row): $i++;
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
                                    <td><button class="btn-shadow dropdown-toggle btn btn-success" data-toggle="modal" data-target="#editTotal<?=$row->id?>" aria-haspopup="true" aria-expanded="false">Edit</button></td>
                                    <!-- <td><a href="<?= base_url('admin/requests/deleteTotal/'.$row->id) ?>" class="test" id="<?= $row->id?>"><button class="mb-2 mr-2 btn btn-danger">Delete</button></a> -->
                                    <td>
                                        <select name="status_action" extra-id="<?= $row->id ?>" class="status_act " id="action">
                                            <option value="" selected disabled>Perform Action</option>
                                            <option value="1">Pending</option>
                                            <option value="2">In Progress</option>
                                            <option value="3">On Hold</option>
                                            <option value="4">Completed</option>
                                        </select>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <div class="d-block text-center card-footer">
                        <!-- <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button> -->
                        <form action="<?= base_url('admin/export/total')?>" method="post">
                           <input type="submit" class="btn-shadow dropdown-toggle btn btn-primary" value="Export">
                        </form>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</div>

<?php echo view('admin/partials/footer')?>
