                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-header">Recent Requests
                                            <div class="btn-actions-pane-right">
                                                <div role="group" class="btn-group-sm btn-group">
                                                    <button class="active btn btn-focus">Last Week</button>
                                                    <button class="btn btn-focus">All Month</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="align-middle table  mb-0 table table-borderless table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>Name</th>
                                                        <th class="text-center">Email</th>
                                                        <th class="text-center">Phone</th>
                                                        <th class="text-center">Service</th>
                                                        <th class="text-center">Date Of Request</th>
                                                        <th class="text-center">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=0; foreach($getRecentReq as $row): $i++ ?>
                                                <tr>
                                                    <td class="text-center text-muted"><?= $i ?></td>
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
                                                    <td class="text-center"><?= $row->email ?></td>
                                                    <td class="text-center"><?= $row->phone ?></td>
                                                    <td class="text-center"><?= $row->type ?></td>
                                                    <td class="text-center"><?= date('l d M Y h:i:s a', strtotime($row->date )) ?></td>
                                                    <td class="text-center">
                                                        <div class="badge badge-<?= $row->color_badge?>"><?= $row->status_name ?></div>
                                                    </td>
                                                </tr>
                                                    <?php endforeach ?>
                                                <!-- <tr>
                                                    <td class="text-center text-muted">#347</td>
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <div class="widget-content-left">
                                                                        <img width="40" class="rounded-circle" src="assets/images/avatars/3.jpg" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">Ruben Tillman</div>
                                                                    <div class="widget-subheading opacity-7">Etiam sit amet orci eget</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">Berlin</td>
                                                    <td class="text-center">
                                                        <div class="badge badge-success">Completed</div>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" id="PopoverCustomT-2" class="btn btn-primary btn-sm">Details</button>
                                                    </td>
                                                </tr> -->
                                                <!-- <tr>
                                                    <td class="text-center text-muted">#321</td>
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <div class="widget-content-left">
                                                                        <img width="40" class="rounded-circle" src="assets/images/avatars/2.jpg" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">Elliot Huber</div>
                                                                    <div class="widget-subheading opacity-7">Lorem ipsum dolor sic</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">London</td>
                                                    <td class="text-center">
                                                        <div class="badge badge-danger">In Progress</div>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" id="PopoverCustomT-3" class="btn btn-primary btn-sm">Details</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center text-muted">#55</td>
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <div class="widget-content-left">
                                                                        <img width="40" class="rounded-circle" src="assets/images/avatars/1.jpg" alt=""></div>
                                                                </div>
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">Vinnie Wagstaff</div>
                                                                    <div class="widget-subheading opacity-7">UI Designer</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">Amsterdam</td>
                                                    <td class="text-center">
                                                        <div class="badge badge-info">On Hold</div>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" id="PopoverCustomT-4" class="btn btn-primary btn-sm">Details</button>
                                                    </td>
                                                </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-block text-center card-footer">
                                            <!-- <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button> -->
                                            <form action="javascript:void(0)" method="post">
                                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-primary">
                                                    <span class="btn-icon-wrapper pr-2 opacity-7">
                                                        <i class="fa fa-business-time fa-w-20"></i>
                                                    </span>
                                                    Export
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>