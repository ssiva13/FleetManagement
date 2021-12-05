 <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Main</li>

                        <li>
                            <a href="{{ route('home') }}" class="waves-effect">
                                <i class="mdi mdi-view-dashboard"></i><span class="badge badge-pill badge-primary float-right">2</span>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class=" mdi mdi-account-multiple-outline "></i>
                                <span>Memberships</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/admin/investors">Investors</a></li>
                                <li><a href="/admin/drivers">Drivers</a></li>
                                <li><a href="/admin/clients">Clients</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class=" ion ion-md-car "></i>
                                <span>Fleets</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('cars.index') }}">Cars</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class=" mdi mdi-calendar-blank-multiple "></i>
                                <span>Operations</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/admin/trips">Trips</a></li>
                                <li><a href="/admin/schedule">Schedule</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class=" mdi mdi-cash-multiple "></i>
                                <span>Finances</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/admin/pay_in">Payments In</a></li>
                                <li><a href="/admin/pay_out">Payments Out</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class=" mdi mdi-folder-multiple "></i>
                                <span>Resources</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/admin/car_images">Car Photos</a></li>
                                <li><a href="/admin/contracts">Contract Drafts</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class=" mdi mdi-cogs "></i>
                                <span>Configuration</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/admin/user_config">User Management</a></li>
                                <li><a href="/admin/api_config">API Keys</a></li>
                                <li><a href="{{ route('lookup-lists.index') }}">System Variables</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->