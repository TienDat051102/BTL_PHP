<?php include '../admin/header.php'
?>
<div class="content-wrapper">

    <div class="row mt-3">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Báo Cáo Doanh Thu</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="form-group">
                                            <a href="danhmuchoadonbanhang.php?page=toanbo" class="btn btn-light btn-round px-5"><i class="icon-lock"></i>
                                                Toàn Bộ</a>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group">
                                            <a href="danhmuchoadonbanhang.php?page=theongay" class="btn btn-light btn-round px-5"><i class="icon-lock"></i>
                                                Báo Cáo theo ngày</a>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group">
                                            <a href="danhmuchoadonbanhang.php?page=theotuan" class="btn btn-light btn-round px-5"><i class="icon-lock"></i>
                                                Báo Cáo theo tuần</a>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group">
                                            <a href="danhmuchoadonbanhang.php?page=theothang" class="btn btn-light btn-round px-5"><i class="icon-lock"></i>
                                                Báo Cáo Theo Tháng</a>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <?php
                    if (isset($_GET["page"])) {
                        switch ($_GET["page"]) {
                            case 'toanbo':
                                include_once './quanlydoanhthutoanbo.php';
                                break;
                            case 'theongay':
                                include_once './quanlydoanhthutheongay.php';
                                break;
                            case 'theothang':
                                include_once './quanlydoanhthutheothang.php';
                                break;
                            case 'theotuan':
                                include_once './quanlydoanhthutheotuan.php';
                                break;
                            case 'chitiethoadon':
                                include_once './chitiethoadon.php';
                                break;
                            default:
                                break;
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include '../admin/footer.php' ?>