<?php
include('navbar.php');
echo <<<_END
    <div class="container">
        <section class="py-5">
            <h2 class="h5 text-uppercase mb-4">Customer Order Details</h2>
            <div class="row">
                <!-- SHIPPING TABLE-->
                <div class="table-responsive mb-4">
                    <table class="table">
                        <thead class="bg-light">
                        <tr>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Name</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Address</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Status</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Tracking #</strong></th>
                            <th class="border-0" scope="col"> </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th class="pl-0 border-0" scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link">Jane Doe</a></strong></div>
                                </div>
                            </th>
                            <td class="align-middle border-0">
                                <p class="mb-0 small">123 S. Easy Street, Salt Lake City, UT 84111</p>
                            </td>
                            <td class="align-middle border-0">
                                <p class="mb-0 small">Order Received</p>
                            </td>
                            <td class="align-middle border-light">
                                <div class="mb-0 small">Pending</div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    </div>
</div>
</body>
_END;
