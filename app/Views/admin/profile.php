<?php echo view('admin/partials/head')?>
<?php echo view('admin/partials/header')?>
<?php echo view('admin/partials/themesettings')?>
<?php echo view('admin/partials/navbar')?>
    <div class="app-main__outer">
        <div class="app-main__inner">
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
    <div class="profile">
        <div class="cover-photo-div">
            <div class="cover-photo"></div>
        </div>
        <div class="content">
                <!-- image updated message -->
                    <div class="alert alert-success text-center hide" id="showProSUC" role="alert" style="display: none;">  
                    </div>
                    <!-- ends -->
                    <!-- failed -->
                    <div class="alert alert-danger text-center hide" id="showProERR" role="alert" style="display: none;">
                    </div>
                    <!-- failed end -->
                <!-- ends -->
            <div class="edit-butt-div">
                <button class="btn btn-primary">EDIT PROFILE</button>
            </div>
            <div class="profile-wrapper">
                <!-- avatar -->
                <div class="profile-pic">
                    <?php if($loggedInUser->profile_pics != ''):?>
                        <img src="<?= $loggedInUser->profile_pics ?>">
                    <?php else:?>
                        <img src="<?= base_url('public/profile/icon-avatar.png')?>">
                    <?php endif ?>
                    <div id="change">
                    <form id="fileinfo" enctype="multipart/form-data" method="post" name="fileinfo">
                            <input type="file" id="pro_pics" name="avatar" style="display:none">
                            <!-- <input type="submit" value="Upload" class="alert alert-danger"> -->
                        </form>
                    </div>
                </div>
                <!-- avatar -->
            </div>
            <div class="about-div">
                <div class="bio">
                    <h3><span id="p-firstname"><?= $loggedInUser->firstname ?></span> <span><?= $loggedInUser->lastname ?></span></h3>
                    <p><i class="pe-7s-mail"></i><span> <?= $loggedInUser->email ?></span></p>
                    <p><i class="pe-7s-call"></i><span> <?= $loggedInUser->phone ?></span></p>
                    <p><i class="pe-7s-signal"></i><span> Nigeria</span></p>
                    <p><i class="pe-7s-date"></i>Joined <?= date('l d M Y', strtotime($loggedInUser->created_at))?></p>
                </div>
                <div class="about-me">
                    <b>About Me</b>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>
        </div>

        <form class="profile-form" action="" method="post">
          <div>
            <label>First Name</label>
            <input type="text" name="firstname" required >
          </div>

          <div>
            <label>Last Name</label>
            <input type="text" name="lastname" required>
          </div>

          <div>
            <span>Gender : </span>
            <span>Male:</span> <input type="radio"name="gender">
            <span>Female:</span> <input type="radio"  name="gender">
          </div>

          <div>
            <label>Email</label>
            <input type="email" name="email" required>
          </div>

           <div>
            <label>Phone Number</label>
            <input type="number"  name="phone" required>
          </div>

           <div>
            <label>Password</label>
            <input type="password" name="password"  required>
               <span>Password Strength</span> : <span id="pass-status">Very Weak</span>
               <div class="loader-div">
                   <div class="loader"></div>
               </div>
          </div>

          <div>
            <button type="submit">DONE</button>
          </div>
      </form>
    </div>
    <!-- form submission ajax -->
    <script>
        $(document).ready(function(){
            $('#pro_pics').on('change', function(){
               
                var avatar = new FormData(document.getElementById("fileinfo"));
                
                $.ajax({
                    url:"<?= base_url()?>/admin/profile/upload",
                    type:"POST",
                    // add when dealing with a file
                    enctype: 'multipart/form-data',
                    cache: false,
                    contentType: false,
                    processData: false,
                    // end. 
                    data: avatar,
                    dataType: 'json',
                    success: function(response){
                        console.log(response)
                        if(response == 'success'){
                            // location.reload()
                            $('#showProSUC').css('display', 'block');
                            $('#showProSUC').html(response);
                            setTimeout(function(){
                                $('#showProSUC').hide();
                            }, 5000);
                        }
                        else{
                            if(response == 'error'){
                                $('#showProERR').css('display', 'block');
                                $('#showProERR').html(response);
                                setTimeout(function(){
                                    $('#showProERR').hide();
                                }, 5000);
                            }
                            else{
                                alert("Something went wrong");
                            }
                        }    
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        alert("Error: Status: "+textStatus+"Message: "+errorThrown);
                        // console.warn(jqxhr.responseText)
                    }
                })
            })
        })
    </script>
    <!-- ends here -->
    <script src="<?= base_url('public/profile/profile.js')?>"></script>
<?php echo view('admin/partials/footer')?>
