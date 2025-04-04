@php
$version = $basicInfo->theme_version;
//echo"<pre>";print_r(session('redirectTo'));die;
@endphp
@extends("frontend.layouts.layout-dashboard-v$version")


@section('content')
<!-- Body main wrapper start -->
<main>
    
 
 
 <!-- app body content start -->
 <div class="app-content-wrapper">

            <div class="row">
                <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="card-wrapper">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-30">
                                <div class="card-icon">
                                    <span><i class="fa-sharp fa-light fa-receipt"></i></span>
                                </div>
                                <div class="card-title-wrap">
                                    <h6 class="card-subtitle mb-5">Total Invoice</h6>
                                    <div class="d-flex flex-wrap align-items-end gap-10">
                                        <h4 class="card-title">313</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="card-wrapper">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-30">
                                <div class="card-icon">
                                    <span><i class="fa-sharp fa-light fa-file-invoice-dollar"></i></span>
                                </div>
                                <div class="card-title-wrap">
                                    <h6 class="card-subtitle mb-5">Paid Invoice</h6>
                                    <div class="d-flex flex-wrap align-items-end gap-10">
                                        <h4 class="card-title">313</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="card-wrapper">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-30">
                                <div class="card-icon">
                                    <span><i class="fa-sharp fa-light fa-file-exclamation"></i></span>
                                </div>
                                <div class="card-title-wrap">
                                    <h6 class="card-subtitle mb-5">Unpaid Invoice</h6>
                                    <div class="d-flex flex-wrap align-items-end gap-10">
                                        <h4 class="card-title">313</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="card-wrapper">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-30">
                                <div class="card-icon">
                                    <span><i class="fa-sharp fa-light fa-file-xmark"></i></span>
                                </div>
                                <div class="card-title-wrap">
                                    <h6 class="card-subtitle mb-5">Cancelled Invoice</h6>
                                    <div class="d-flex flex-wrap align-items-end gap-10">
                                        <h4 class="card-title">313</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <div class="card-wrapper">
                        <div class="card-header d-flex align-items-center justify-content-between mb-30">
                            <div class="card-title-wrap">
                                <h6 class="card-subtitle">My Property Listing</h6>
                            </div>
                            <div class="card-dropdown">
                                <div class="dropdown">
                                    <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="property-table-wrapper">
                                <div class="table__wrapper table-responsive">
                                    <table class="table mb-20" id="dataTableDefualt">
                                        <thead>
                                            <tr class="table__title">
                                                <th>#ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Number</th>
                                                <th>Location</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table__body">
                                            <tr>
                                                <td>#RL-00114</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-10">
                                                        <div class="table-thumb"><img src="assets/images/agent/agent-02.png" alt="image"></div>
                                                        <span class="table__meta-name">Emma Phillips</span>
                                                    </div>
                                                </td>
                                                <td><a href="https://html.bdevs.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0d636c60684d7f686c6161627a236e6260">[email&#160;protected]</a></td>
                                                <td>+1(800) 642 7676</td>
                                                <td>Washington</td>
                                                <td>Jan 14 2024</td>
                                                <td>$1999.00</td>
                                                <td><span class="bd-badge success">Paid</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-center gap-10">
                                                        <a href="app-invoice-preview.html" class="action-button download">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="action-button delete">
                                                            <i class="fa-regular fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#RL-00115</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-10">
                                                        <div class="table-thumb"><img src="assets/images/agent/agent-02.png" alt="image"></div>
                                                        <span class="table__meta-name">Emma Stone</span>
                                                    </div>
                                                </td>
                                                <td><a href="https://html.bdevs.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a3cdc2cec6e3d1c6c2cfcfccd48dc0ccce">[email&#160;protected]</a></td>
                                                <td>+1(800) 642 7676</td>
                                                <td>Washington</td>
                                                <td>Dec 30 2024</td>
                                                <td>$1999.00</td>
                                                <td><span class="bd-badge warning">Unpaid</span>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-center gap-10">
                                                        <a href="app-invoice-preview.html" class="action-button download">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="action-button delete">
                                                            <i class="fa-regular fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#RL-00116</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-10">
                                                        <div class="table-thumb"><img src="assets/images/agent/agent-03.png" alt="image"></div>
                                                        <span class="table__meta-name">Jackson Perry</span>
                                                    </div>
                                                </td>
                                                <td><a href="https://html.bdevs.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="94faf5f9f1d4e6f1f5f8f8fbe3baf7fbf9">[email&#160;protected]</a></td>
                                                <td>+1(800) 642 7676</td>
                                                <td>New York</td>
                                                <td>Dec 28 2024</td>
                                                <td>$1999.00</td>
                                                <td><span class="bd-badge success">Paid</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-center gap-10">
                                                        <a href="app-invoice-preview.html" class="action-button download">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="action-button delete">
                                                            <i class="fa-regular fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#RL-00117</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-10">
                                                        <div class="table-thumb"><img src="assets/images/agent/agent-04.png" alt="image"></div>
                                                        <span class="table__meta-name">Chloe King</span>
                                                    </div>
                                                </td>
                                                <td><a href="https://html.bdevs.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="096768646c497b6c686565667e276a6664">[email&#160;protected]</a></td>
                                                <td>+1(800) 642 7676</td>
                                                <td>Florida</td>
                                                <td>Nov 28 2024</td>
                                                <td>$1999.00</td>
                                                <td><span class="bd-badge danger">Cancel</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-center gap-10">
                                                        <a href="app-invoice-preview.html" class="action-button download">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="action-button delete">
                                                            <i class="fa-regular fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#RL-00118</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-10">
                                                        <div class="table-thumb"><img src="assets/images/agent/agent-05.png" alt="image"></div>
                                                        <span class="table__meta-name">Logan Foster</span>
                                                    </div>
                                                </td>
                                                <td><a href="https://html.bdevs.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d0beb1bdb590a2b5b1bcbcbfa7feb3bfbd">[email&#160;protected]</a></td>
                                                <td>+1(800) 642 7676</td>
                                                <td>Virginia</td>
                                                <td>Oct 11 2024</td>
                                                <td>$1999.00</td>
                                                <td><span class="bd-badge warning">Unpaid</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-center gap-10">
                                                        <a href="app-invoice-preview.html" class="action-button download">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="action-button delete">
                                                            <i class="fa-regular fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#RL-00119</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-10">
                                                        <div class="table-thumb"><img src="assets/images/agent/agent-06.png" alt="image"></div>
                                                        <span class="table__meta-name">Ava Brooks</span>
                                                    </div>
                                                </td>
                                                <td><a href="https://html.bdevs.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c5aba4a8a085b7a0a4a9a9aab2eba6aaa8">[email&#160;protected]</a></td>
                                                <td>+1(800) 642 7676</td>
                                                <td>Washington</td>
                                                <td>Sep 14 2024</td>
                                                <td>$1999.00</td>
                                                <td><span class="bd-badge success">Paid</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-center gap-10">
                                                        <a href="app-invoice-preview.html" class="action-button download">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="action-button delete">
                                                            <i class="fa-regular fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#RL-00120</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-10">
                                                        <div class="table-thumb"><img src="assets/images/agent/agent-07.png" alt="image"></div>
                                                        <span class="table__meta-name">Lucas Anderson</span>
                                                    </div>
                                                </td>
                                                <td><a href="https://html.bdevs.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5b353a363e1b293e3a3737342c75383436">[email&#160;protected]</a></td>
                                                <td>+1(800) 642 7676</td>
                                                <td>Alaska</td>
                                                <td>Aug 11 2024</td>
                                                <td>$1999.00</td>
                                                <td><span class="bd-badge success">Paid</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-center gap-10">
                                                        <a href="app-invoice-preview.html" class="action-button download">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="action-button delete">
                                                            <i class="fa-regular fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#RL-00121</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-10">
                                                        <div class="table-thumb"><img src="assets/images/agent/agent-08.png" alt="image"></div>
                                                        <span class="table__meta-name">Sophia Miller</span>
                                                    </div>
                                                </td>
                                                <td><a href="https://html.bdevs.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="620c030f07221007030e0e0d154c010d0f">[email&#160;protected]</a></td>
                                                <td>+1(800) 642 7676</td>
                                                <td>Alabama</td>
                                                <td>Jul 14 2024</td>
                                                <td>$1999.00</td>
                                                <td><span class="bd-badge success">Paid</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-center gap-10">
                                                        <a href="app-invoice-preview.html" class="action-button download">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="action-button delete">
                                                            <i class="fa-regular fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#RL-00122</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-10">
                                                        <div class="table-thumb"><img src="assets/images/agent/agent-09.png" alt="image"></div>
                                                        <span class="table__meta-name">Olivia Bennett</span>
                                                    </div>
                                                </td>
                                                <td><a href="https://html.bdevs.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5f313e323a1f2d3a3e33333028713c3032">[email&#160;protected]</a></td>
                                                <td>+1(800) 642 7676</td>
                                                <td>New Mexico</td>
                                                <td>Jun 29 2024</td>
                                                <td>$1999.00</td>
                                                <td><span class="bd-badge danger">Cancel</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-center gap-10">
                                                        <a href="app-invoice-preview.html" class="action-button download">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="action-button delete">
                                                            <i class="fa-regular fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#RL-00123</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-10">
                                                        <div class="table-thumb"><img src="assets/images/agent/agent-10.png" alt="image"></div>
                                                        <span class="table__meta-name">Carter White</span>
                                                    </div>
                                                </td>
                                                <td><a href="https://html.bdevs.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="8ee0efe3ebcefcebefe2e2e1f9a0ede1e3">[email&#160;protected]</a></td>
                                                <td>+1(800) 642 7676</td>
                                                <td>Virginia</td>
                                                <td>May 16 2024</td>
                                                <td>$1999.00</td>
                                                <td><span class="bd-badge success">Paid</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-center gap-10">
                                                        <a href="app-invoice-preview.html" class="action-button download">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="action-button delete">
                                                            <i class="fa-regular fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="pagination__wrapper mt-30">
                                    <div class="basic-pagination">
                                        <nav>
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa-regular fa-arrow-left"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">1</a>
                                                </li>
                                                <li>
                                                    <a class="current" href="#">2</a>
                                                </li>
                                                <li>
                                                    <a href="#">3</a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa-regular fa-arrow-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- app body content end -->

        
</main>
<!-- Body main wrapper end -->
@endsection
