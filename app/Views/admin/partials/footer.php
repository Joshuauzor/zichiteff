  
                        </div>
                        <div class="app-wrapper-footer">
                            <div class="app-footer">
                                <div class="app-footer__inner">
                                    <div class="app-footer-left">
                                        <ul class="nav">
                                            <li class="nav-item">
                                                <a href="https://web.facebook.com/Zealtechnologized/" class="nav-link">
                                                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> | All rights reserved 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="app-footer-right">
                                        <ul class="nav">
                                            <li class="nav-item">
                                                <a href="https://web.facebook.com/Zealtechnologized/" class="nav-link">
                                                   <i class="fa fa-nothing" aria-hidden="true"></i> Zichiteff Powered by Zeal Technologies
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
            </div>
        </div>
        <!-- profile script -->
        <script type="text/javascript" src="<?= base_url('public/admin/profile/profile.js')?>"></script>
        <!--  -->
        <script type="text/javascript" src="<?= base_url('public/admin/assets/scripts/main.js')?>"></script>
        <!-- ajax script for status action -->
        <script>
            $(document).ready(function(){
                // use datatable
                $('.request').DataTable();
                // end here

            // second function to change request status
            $('.status_act').on('change', function(){
                    var action = $(this).val();
                    var id = $(this).attr('extra-id');
            
                    var confirmAct = confirm("Are you sure you want to update request status?");
                    if(confirmAct){
                        $.ajax({
                            url:"<?= base_url()?>/admin/ajax/action",
                            type: "POST",
                            data: {
                                'action' : action,
                                'id' : id
                            },
                            dataType: 'json',
                            success: function(response){
                                if(response == 'success'){
                                    location.reload()
                                }
                                else{
                                    alert("Something went wrong");
                                }    
                            },
                            error : function(jqXHR, textStatus, errorThrown){ 
                                alert("Error: Status: "+textStatus+" Message: "+errorThrown);
                            }  
                        });
                    }  
                })
            })
        </script>
        <!-- ends here -->
        <!-- search script -->
        <script>
         
            let filter  = document.querySelector('#search')

            let tr = document.getElementsByTagName("tr")

            let all_tr_td_text = []

            function search(){

                //ignored the first row because that those are the labels, so i started the loop from one
                all_tr_td_text = []

                for(i = 1;i<tr.length;i++){
                    let td = tr[i].getElementsByTagName("td")
                    let curr_tr_text = ''
                    
                    for(j = 0;j<td.length;j++){
                        
                    curr_tr_text+=td[j].innerHTML
                    }

                    all_tr_td_text.push(curr_tr_text)
                        
                }

                for(let i = 0;i<all_tr_td_text.length;i++){
                    if(all_tr_td_text[i].toLowerCase().indexOf(filter.value.toLowerCase()) == -1){
                        tr[i+1].style.display = 'none'
                    }
                    else{
                        tr[i+1].style.display = ''
                    }
                }
            }


            // EVERY TIME A USER TYPES, THIS FUNCTION WILL BE FIRED.... :)
            filter.onkeyup =()=> search();

            // Set time for validation message to clear 
            $(document).ready(function(){
				setTimeout(function(){
					$('.hide').hide()
				}, 5000);
			})
        </script>
            <!-- trigger for profile page -->
            <script>
                $('#change').on('click', function(){
                    $('input[type=file]').click()
                })
            </script>
            <!-- ends here -->
       	   <!-- form submission ajax for profile pics -->
        <script>
            $(document).ready(function(){
                $('#pro_pics').on('change', function(){
                    // alert('hello')
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
                                location.reload();
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
	<!-- validation timeout -->
    </body>

    <!-- Edit Total Request -->
<?php 
    $i=0;
    foreach($totalRequest as $row): $i++;
    ?>
        <div class="modal fade" id="editTotal<?=$row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">REQUEST</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="" action="<?= base_url('admin/requests/editReq') ?>" method="POST">
                            <div class="position-relative form-group">
                                <input name="id" id="exampleEmail" value="<?= $row->id ?>"  type="hidden" class="form-control" required>
                            </div>
                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Name</label>
                                <input name="name" id="exampleEmail" value="<?= $row->name ?>" placeholder="Enter Client's name" type="text" class="form-control" required>
                            </div>
                            <div class="position-relative form-group">
                                <label for="examplePassword" class="">Email</label>
                                <input name="email" id="examplePassword" value="<?= $row->email ?>"  placeholder="Enter Client's Email" value="" type="email" class="form-control" required>
                            </div>
                            <div class="position-relative form-group">
                                <label for="examplePassword" class="">Phone</label>
                                <input name="phone" id="examplePassword" value="<?= $row->phone ?>"  placeholder="Enter Client's Phone" value="" type="number" class="form-control" required>
                            </div>
                            <div class="position-relative form-group">
                                <label for="examplePassword" class="">Location</label>
                                <input name="location" id="examplePassword" value="<?= $row->location ?>"  placeholder="Enter Client's Location" value="" type="text" class="form-control" required>
                            </div>
                            <!-- service -->
                            <div class="position-relative form-group">
                                <label for="exampleSelect" class="">Services</label>
                                <select name="service" id="exampleSelect" class="form-control" required>
                                    <option value="<?= $row->service_id?>" selected><?= $row->service_id ?></option>
                                    <option value="1">Test</option>
                                    <option value="10">Other</option>
                                </select>
                            </div>
                            <!-- service -->
                            <div class="position-relative form-group">
                                <label for="exampleText" class="">Details</label>
                                <textarea name="message" id="exampleText" class="form-control" placeholder="Enter Service details"><?= $row->message?></textarea>
                            </div>
                            <button class="mt-1 btn btn-secondary" type="reset">Reset</button>
                            <button class="mt-1 btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
<!--  Ends -->
</html>
