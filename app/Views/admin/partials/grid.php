                            <div class="row">
                                <div class="col-md-6 col-xl-4">
                                    <div class="card mb-3 widget-content">
                                        <div class="widget-content-wrapper text-white">
                                            <div class="widget-content-left">
                                                <div class="widget-heading text-dark">Total Request</div>
                                                <div class="widget-subheading text-dark">Total Client Request</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-warning"><span><?= count($totalRequest) ?></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="card mb-3 widget-content bg-warning">
                                        <div class="widget-content-wrapper text-white">
                                            <div class="widget-content-left">
                                                <div class="widget-heading text-dark">Pending Request</div>
                                                <div class="widget-subheading text-dark">Pending Client Request</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-white"><span><?= count($getPending) ?></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="card mb-3 widget-content bg-danger">
                                        <div class="widget-content-wrapper text-white">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Request In Progress</div>
                                                <div class="widget-subheading">Service in progress</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-white"><span><?= count($getInProgress) ?></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                                    <div class="card mb-3 widget-content bg-premium-dark">
                                        <div class="widget-content-wrapper text-white">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">On Hold</div>
                                                <div class="widget-subheading">Revenue streams</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-warning"><span>$14M</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>

                            <!-- grid 2 -->
                            
                            <div class="row">
                                <div class="col-md-6 col-xl-4">
                                    <div class="card mb-3 widget-content bg-arielle-smile">
                                        <div class="widget-content-wrapper text-white">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Request On Hold</div>
                                                <div class="widget-subheading">Service on Hold</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-white"><span><?= count($getOnhold) ?></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="card mb-3 widget-content bg-happy-green">
                                        <div class="widget-content-wrapper text-white">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Request Completed</div>
                                                <div class="widget-subheading">Total Completed Services</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-dark"><span><?= count($getCompleted) ?></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="card mb-3 widget-content">
                                        <div class="widget-content-wrapper text-white">
                                            <div class="widget-content-left">
                                                <div class="widget-heading text-dark">Total Users</div>
                                                <div class="widget-subheading text-dark">People Interested</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-danger"><span><?= count($totalUsers) ?></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                                    <div class="card mb-3 widget-content bg-premium-dark">
                                        <div class="widget-content-wrapper text-white">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">On Hold</div>
                                                <div class="widget-subheading">Revenue streams</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-warning"><span>$14M</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>

                       

                            <!-- grid 3 -->

                            <!-- <div class="row">
                                <div class="col-md-6 col-lg-3">
                                    <div class="card-shadow-danger mb-3 widget-chart widget-chart2 text-left card">
                                        <div class="widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left pr-2 fsize-1">
                                                        <div class="widget-numbers mt-0 fsize-3 text-danger">71%</div>
                                                    </div>
                                                    <div class="widget-content-right w-100">
                                                        <div class="progress-bar-xs progress">
                                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: 71%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-left fsize-1">
                                                    <div class="text-muted opacity-6">Income Target</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="card-shadow-success mb-3 widget-chart widget-chart2 text-left card">
                                        <div class="widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left pr-2 fsize-1">
                                                        <div class="widget-numbers mt-0 fsize-3 text-success">54%</div>
                                                    </div>
                                                    <div class="widget-content-right w-100">
                                                        <div class="progress-bar-xs progress">
                                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-left fsize-1">
                                                    <div class="text-muted opacity-6">Expenses Target</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="card-shadow-warning mb-3 widget-chart widget-chart2 text-left card">
                                        <div class="widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left pr-2 fsize-1">
                                                        <div class="widget-numbers mt-0 fsize-3 text-warning">32%</div>
                                                    </div>
                                                    <div class="widget-content-right w-100">
                                                        <div class="progress-bar-xs progress">
                                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width: 32%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-left fsize-1">
                                                    <div class="text-muted opacity-6">Spendings Target</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="card-shadow-info mb-3 widget-chart widget-chart2 text-left card">
                                        <div class="widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left pr-2 fsize-1">
                                                        <div class="widget-numbers mt-0 fsize-3 text-info">89%</div>
                                                    </div>
                                                    <div class="widget-content-right w-100">
                                                        <div class="progress-bar-xs progress">
                                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-left fsize-1">
                                                    <div class="text-muted opacity-6">Totals Target</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->