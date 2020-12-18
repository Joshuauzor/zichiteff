<?php

use phpDocumentor\Reflection\PseudoTypes\True_;

echo view('admin/partials/head')?>
<?php echo view('admin/partials/header')?>
<?php echo view('admin/partials/themesettings')?>
<?php echo view('admin/partials/navbar')?>
<link href="<?= base_url('public/admin/profile/profile.css')?>" rel="stylesheet" type="text/css">
<!-- <body> -->
    <div class="container-fluid position-relative">
        <div class="col-12 bg-white pb-3">
            <div class="cover-div position-relative">
                <div class="cover-photo position-absolute"></div>
            </div>
        </div>
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
         <!-- image updated message -->
         <div class="alert alert-success text-center hide" id="showProSUC" role="alert" style="display: none;">  
            </div>
            <!-- ends -->
            <!-- failed -->
            <div class="alert alert-danger text-center hide" id="showProERR" role="alert" style="display: none;">
        </div>
        <!-- failed end -->
        <!-- ends -->

        <div class="container desktop-mode">
            <div class="row content">
                <div class="profile-div d-flex flex-wrap">
                    <div class="profile-pic col-md-4 d-flex">
                        <div class="profile-pic-img img-fluid position-relative">
                            <!-- profile pics -->
                            <!-- <img src="<?= base_url('public/profile/icon-avatar.png')?>" class="img-fluid rounded-circle img-thumbnail"> -->
                            <?php if($loggedInUser->profile_pics != ''):?>
                                <img src="<?= $loggedInUser->profile_pics ?>" class="img-fluid rounded-circle img-thumbnail">
                            <?php else:?>
                                <img src="<?= base_url('public/profile/icon-avatar.png')?>" class="img-fluid rounded-circle img-thumbnail">
                            <?php endif ?>
                            <!-- upload icon -->
                            <div id="change"></div>
                            <form id="fileinfo" enctype="multipart/form-data" method="post" name="fileinfo">
                                <input type="file" id="pro_pics" name="avatar" style="display: none;">
                            </form>
                        </div>
                    </div>

                    <div class="profile-eng col-md-8 d-flex flex-wrap">
                        <div class="profile-name p-3 col-md-6 col-sm-6 col-xs-12 font-weight-bold d-flex align-items-md-center justify-content-md-center">
                        <?= ucfirst($loggedInUser->firstname.' '.$loggedInUser->lastname )?>
                        </div>
                        <div class="profile-btn col-md-6 d-flex col-sm-6 col-xs-12 justify-content-end align-items-center">
                            <button class="btn btn-secondary btn-sm" onclick="profileForm.style.display='block'">EDIT PROFILE</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="about-section d-flex flex-wrap">
                    <div class="about-me p-4 col-md-6 col-sm-12">
                    <p><i class="fas fa-envelope"></i> <?= ucfirst($loggedInUser->email) ?></p>
                    <p><i class="fas fa-phone"></i> <?= $loggedInUser->phone ?></p>
                    <p><i class="fas fa-user"></i> <?= ucfirst($loggedInUser->gender)?></p>
                    <p><i class="fas fa-map-marker-alt"></i> Nigeria</p>
                    <p> <i class="fas fa-calendar-alt"></i> Joined <?= date('l d M Y', strtotime($loggedInUser->created_at))?></p>
                    </div>
                    <div class="about p-4 col-md-6 col-sm-12 bg-dark text-light">
                    <h2>About Me</h2>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Distinctio atque quod totam praesentium nobis illum voluptates saepe consequuntur amet 
                    nulla esse delenitiinventore ducimus, voluptatem quibusdam reprehenderit officiis quas officia?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit in, magnam voluptatibus exercitationem 
                    odio nulla, amet beatae officia consectetur,dignissimos harum qui unde architecto expedita quia praesentium doloribus ad hic!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Distinctio atque quod totam praesentium nobis illum voluptates saepe consequuntur amet 
                    nulla esse delenitiinventore ducimus, voluptatem quibusdam reprehenderit officiis quas officia?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit in, magnam voluptatibus exercitationem 
                    odio nulla, amet beatae officia consectetur,dignissimos harum qui unde architecto expedita quia praesentium doloribus ad hic!
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-form border col-md-12 p-4 position-absolute" id="profileForm">
            <div class="col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-xs-12">
                <form action="<?= base_url('admin/profile/updateProfile') ?>" method="post">
                    <div class="form-group">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" name="firstname" value="<?= $loggedInUser->firstname ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lastname" value="<?= $loggedInUser->lastname?>">
                    </div>
                    <div class="form-group">
                        <label for="Gender" class="form-label">Gender</label> :
                        <?php if($loggedInUser->gender == 'male'): ?>
                            <input type="radio" value="male" name="gender" <?= set_radio('gender', 'male', TRUE)?>> <label>Male</label>
                            <input type="radio" value="female" name="gender" <?= set_radio('gender', 'female')?>> <label>Female</label>
                        <?php else: ?>
                            <input type="radio" value="male" name="gender" <?= set_radio('gender', 'male')?>> <label>Male</label>
                            <input type="radio" value="female" name="gender" <?= set_radio('gender', 'female', TRUE)?>> <label>Female</label>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="<?= $loggedInUser->email?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="phone" value="<?= $loggedInUser->phone ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <div class="form-group" id="pass-val">
                    <ul>
                        <li>Password should be longer than six <i></i></li>
                        <li>Password should contain special characters <i></i></li>
                        <li>Password Should contain uppercase letters <i></i></li>
                    </ul>
                    <div class="form-group">
                        <button class="btn btn-outline-danger" onclick="profileForm.style.display='none'">CANCEL</button>
                        <button class="btn btn-outline-secondary float-right" type="submit">DONE</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <!-- <div class="design position-absolute bg-dark"></div>    -->
    </div>
<!-- profile script -->
  <script src="<?= base_url('public/admin/profile/profile.js')?>"></script>  
<!-- </body>

<?php echo view('admin/partials/footer')?>
