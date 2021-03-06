
            <div class="leftpanel" style="position: fixed; padding-top: 50px">
                <div class="media profile-left">
                    <a class="pull-left profile-thumb" href="profile.html">
                        <img class="img-circle" src="images/photos-profile.png" alt=""></a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $this->session->userdata('username');?></h4>
                        <small class="text-muted"><?php echo $this->session->userdata('email');?></small>
                    </div>
                </div><!-- media -->

                <ul class="nav nav-pills nav-stacked">
                    <li id="dashboardMainMenu"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                    <li><a href="messages.html"><span class="pull-right badge">5</span><i class="fa fa-envelope-o"></i>
                            <span>Messages</span></a></li>
                    <li class="parent" id="profileMainMenu"><a href="chain.html"><i class="fa fa-suitcase"></i> <span>Profiles</span></a>
                        <ul class="children">
                            <li id="rolesMenu"><a href="<?php echo base_url('roles'); ?>">Roles</a></li>
                            <li id="userMenu"><a href="<?php echo base_url('users'); ?>">Users</a></li>
                            <li id="suppliersMenu"><a href="<?php echo base_url('suppliers'); ?>">Suppliers</a></li>
                            <li id="customersMenu"><a href="<?php echo base_url('customers'); ?>">Customers</a></li>
                            <li id="employeesMenu"><a href="extras.html">Employees</a></li>

                        </ul>
                    </li>
                    <li class="parent"><a href="chain.html"><i class="fa fa-edit"></i> <span>Stock</span></a>
                        <ul class="children">
                            <li><a href="code-editor.html">Code Editor</a></li>
                            <li><a href="general-forms.html">General Forms</a></li>
                            <li><a href="form-layouts.html">Layouts</a></li>
                            <li><a href="wysiwyg.html">Text Editor</a></li>
                            <li><a href="form-validation.html">Validation</a></li>
                            <li><a href="form-wizards.html">Wizards</a></li>
                        </ul>
                    </li>
                    <li class="parent" id="transactionMainMenu"><a href="chain.html"><i class="fa fa-bars"></i> <span>Transactions</span></a>
                        <ul class="children">
                            <li id="purchaseMenu"><a href="<?php echo base_url('purchase/history'); ?>">Purchase</a></li>
                            <li id="salesMenu"><a href="<?php echo base_url('sales/history'); ?>">Sales</a></li>
                        </ul>
                    </li>
                    <li class="parent"><a href="chain.html"><i class="fa fa-edit"></i> <span>Manufacturing</span></a>
                        <ul class="children">
                            <li><a href="code-editor.html">Code Editor</a></li>
                            <li><a href="general-forms.html">General Forms</a></li>
                            <li><a href="form-layouts.html">Layouts</a></li>
                            <li><a href="wysiwyg.html">Text Editor</a></li>
                            <li><a href="form-validation.html">Validation</a></li>
                            <li><a href="form-wizards.html">Wizards</a></li>
                        </ul>
                    </li>                    
                    <li class="parent"><a href="chain.html"><i class="fa fa-file-text"></i> <span>Maintanance</span></a>
                        <ul class="children">
                            <li><a href="notfound.html">404 Page</a></li>
                            <li><a href="blank.html">Blank Page</a></li>
                            <li><a href="calendar.html">Calendar</a></li>
                            <li><a href="invoice.html">Invoice</a></li>
                            <li><a href="locked.html">Locked Screen</a></li>
                            <li><a href="media-manager.html">Media Manager</a></li>
                            <li><a href="people-directory.html">People Directory</a></li>
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="search-results.html">Search Results</a></li>
                            <li><a href="signin.html">Sign In</a></li>
                            <li><a href="signup.html">Sign Up</a></li>
                        </ul>
                    </li>
                    <li class="parent"><a href="chain.html"><i class="fa fa-file-text"></i> <span>Reports</span></a>
                        <ul class="children">
                            <li><a href="notfound.html">404 Page</a></li>
                            <li><a href="blank.html">Blank Page</a></li>
                            <li><a href="calendar.html">Calendar</a></li>
                            <li><a href="invoice.html">Invoice</a></li>
                            <li><a href="locked.html">Locked Screen</a></li>
                   
                        </ul>
                    </li>

                </ul>
            </div><!-- leftpanel -->
