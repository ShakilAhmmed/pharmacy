
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{asset('admin_asset/images/logo23.png')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{asset('admin_asset/images/logo23.png')}}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="/admin"> <i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard </a>
                    </li>
                    <h3 class="menu-title">Medicine</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Medicine</a>
                        <ul class="sub-menu children dropdown-menu">
                          <li><i class="far fa-building"></i><a href="/company">Brand/Company</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="/catagory">Medicine Catagory</a></li>
                         <li><i class="fa fa-id-badge"></i><a href="/desk">Desk Management</a></li>
                            <li><i class="fa fa-bars"></i><a href="/medicine">Manage Medicine</a></li>
                        </ul>
                    </li>

                     <h3 class="menu-title">Purcase</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Purcase Medicine</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/purcase">Purcase</a></li>
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/purcase/create">Purcase Report</a></li>
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/rest_report">Due Report</a></li>
                        </ul>
                    </li>
                   <h3 class="menu-title">Stock</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Stock Report</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/whole_sale/create">Stock Priview</a></li>
                            @php
                             $medicine_data=DB::table('medicine')->get();
                            @endphp
                            @foreach($medicine_data as $medicine_data_value)
                             <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/stock_report/{{$medicine_data_value->medicine_code}}">{{$medicine_data_value->medicine_name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <h3 class="menu-title">Sales</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Sale</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="
                        /whole_sale">Whole Sale</a></li>
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/whole_sale_report">Whole Sale Report</a></li>
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/retail_sale">Retail Sale</a></li>
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/retail_sale/create">Retail Sale Report</a></li>

                        </ul>
                    </li>

                    <h3 class="menu-title">User</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>User</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/customer">Customer</a></li>
                        </ul>
                    </li>


                        <h3 class="menu-title">Expense</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Expense</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/expense_catagory">Expense Catagory</a></li>
                             <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/expense_for">Expense For</a></li>
                        </ul>
                    </li>

                     <h3 class="menu-title">Report</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Report</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/inventory_report">Inventory Report</a></li>
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/regular_transaction">Regular Transaction</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="/regular_transaction/create">Transaction Report</a></li>

                        </ul>
                    </li>

                    <h3 class="menu-title">Settings</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Settigs</a>
                        <ul class="sub-menu children dropdown-menu">
                           <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">General Settings</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Unit</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Currency</a></li>
                            <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Tax</a></li>
                             <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Expense Catagory</a></li>
                             <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">User Role</a></li>
                             <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
