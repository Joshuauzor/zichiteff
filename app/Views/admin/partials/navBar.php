                <div class="app-main">
                    <div class="app-sidebar sidebar-shadow">
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
                        <div class="scrollbar-sidebar">
                            <div class="app-sidebar__inner">
                                <ul class="vertical-nav-menu">
                                    <li>
                                        <a href="<?= base_url('admin/home') ?>" class="mm-active">
                                            <i class="metismenu-icon pe-7s-home"></i>
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="metismenu-icon pe-7s-menu"></i>
                                            Requests
                                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="<?= base_url('admin/requests/total') ?>">
                                                    <i class="metismenu-icon"></i>
                                                    Total
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('admin/requests/pending') ?>">
                                                    <i class="metismenu-icon">
                                                    </i>Pending
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('admin/requests/inProgress') ?>">
                                                    <i class="metismenu-icon">
                                                    </i>In Progress
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('admin/requests/onHold') ?>">
                                                    <i class="metismenu-icon">
                                                    </i>On Hold
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('admin/requests/completed') ?>">
                                                    <i class="metismenu-icon">
                                                    </i>Completed
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="">  
                                            <i class="metismenu-icon pe-7s-config"></i>
                                            Master
                                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="<?= base_url('admin/master') ?>">
                                                    <i class="metismenu-icon"></i>
                                                    Setup
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('admin/master/services') ?>">
                                                    <i class="metismenu-icon">
                                                    </i>Services
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="metismenu-icon pe-7s-user"></i>
                                            User Management
                                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="<?= base_url('auth/register') ?>">
                                                    <i class="metismenu-icon"></i>
                                                    Register User
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="<?= base_url('admin/user') ?>">
                                                    <i class="metismenu-icon">
                                                    </i>Management
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('admin/profile') ?>">
                                            <i class="metismenu-icon pe-7s-portfolio">
                                            </i>Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('admin/activity') ?>">
                                            <i class="metismenu-icon pe-7s-hourglass">
                                            </i>Activity
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="metismenu-icon pe-7s-settings">
                                            </i>Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('auth/logout')?>">
                                            <i class="metismenu-icon pe-7s-lock">
                                            </i>
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> 