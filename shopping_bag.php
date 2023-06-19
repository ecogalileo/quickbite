<!-- Masthead-->
<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-center mb-4 page-title">
                <h1 class="text-white">Shopping Bag</h1>
                <hr class="divider my-4 bg-dark" />
            </div>

        </div>
    </div>
</header>

<!-- <section class="page-section">
    <div class="container" style=" white-space: wrap; text-overflow: ellipsis; overflow-wrap: break-word;">
        <?php echo html_entity_decode($_SESSION['setting_about_content']) ?>
    </div>
</section> -->

<section class="restaurants-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-12">
                <div class="bg-gray">
                    <div class="row">
                        <div class="table-responsive-lg">
                            <table class="table table-bordered table-hover mt-5" style="margin-bottom: 25vh; width: 100%;">
                                <thead style="background: #404040; color:white;">
                                    <tr>

                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    include 'admin/db_connect.php';
                                    $qry = $conn->query("SELECT * FROM orders ");
                                    while ($row = $qry->fetch_assoc()) :
                                        if ($_SESSION['login_first_name'] . ' ' . $_SESSION['login_last_name'] == $row['name']) {
                                    ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i++ ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['name'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['address'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['email'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['mobile'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['payment_method'] ?>
                                                </td>
                                                <?php if ($row['status'] == 1) : ?>
                                                    <td class="text-center"><span class="badge badge-success">Confirmed</span></td>
                                                <?php else : ?>
                                                    <td class="text-center"><span class="badge badge-secondary">Pending</span></td>
                                                <?php endif; ?>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-primary view_order" data-id="<?php echo $row['id'] ?>">View Order</button>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<script>
    $('.view_order').click(function() {
        uni_modal('Order', 'view_order.php?id=' + $(this).attr('data-id'))
    })
    $('table').dataTable();
</script>