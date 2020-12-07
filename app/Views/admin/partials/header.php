<body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
            <div class="app-header header-shadow">
                <!-- logo -->
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>    
                <div class="app-header__content">
                    <div class="app-header-left">
                        <div class="search-wrapper">
                            <div class="input-holder">
                                <input type="text" class="search-input" id="search" placeholder="Type to search">
                                <button class="search-icon"><span></span></button>
                            </div>
                            <button class="close"></button>
                        </div>
                        <ul class="header-menu nav">
                            
                            <li class="dropdown nav-item">
                                <a href="<?= base_url('auth/logout')?>" class="nav-link">
                                    <i class="nav-link-icon fa fa-lock"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>        
                    </div>
                    <div class="app-header-right">
                        <div class="header-btn-lg pr-0">
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="btn-group">
                                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                                <?php if($loggedInUser->profile_pics != ''):?>
                                                    <!-- <img src="<?= $loggedInUser->profile_pics ?>"> -->
                                                    <img width="35" class="rounded-circle" src="<?= $loggedInUser->profile_pics ?>" alt="pro_pics">
                                                <?php else:?>
                                                    <img width="42" class="rounded-circle" src="<?= base_url('public/profile/icon-avatar.png')?>" alt="pro_pics">
                                                <?php endif ?>
                                                <i class="fa ml-2 opacity-8"></i>
                                            </a>
                                        
                                        </div>
                                    </div>
                                    <div class="widget-content-left  ml-3 header-user-info">
                                        <div class="widget-heading">
                                            <?= session()->get('firstname').' '.session()->get('lastname') ?>
                                        </div>
                                        <div class="widget-subheading">
                                            <?= session()->get('position') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>        
                    </div>
                </div>
            </div> 