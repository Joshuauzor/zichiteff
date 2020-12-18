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
                    <div class="card-body"><h5 class="card-title">Login Activity</h5>
                        <table class="mb-0 table table-bordered" id="#">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Login Time</th>
                                <th>Logout Time</th>
                                <th>User Agent</th>
                                <th>IP Address</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i=0;
                                foreach($loginactivity as $row): $i++;
                                ?>
                                
                            <tr>
                                <th scope="row"><?= $i ?></th>   
                                <td><?= date('l dS M Y h:i:s a', strtotime($row->login_time)) ?></td>
                                <?php if($row->logout_time == '0000-00-00 00:00:00'): ?>
                                    <td> You are currently logged In</td>
                                <?php else: ?>
                                    <td><?= date('l d M Y h:i:s a', strtotime($row->logout_time)) ?></td>
                                <?php endif ?>
                                <td><?= $row->agent  ?></td>
                                <td><?= $row->ip  ?></td>
                            </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</div>

<?php echo view('admin/partials/footer')?>
