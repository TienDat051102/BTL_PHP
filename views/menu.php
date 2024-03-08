<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">
                Food Menu
            </h5>
            <h1 class="mb-5">Danh mục món ăn</h1>
        </div>
        <?php

        ?>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                <?php
                include_once '../models/ketnoi.php';
                $sql = "SELECT * FROM loaisp";
                $query = mysqli_query($conn, $sql);
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo
                        '<li class=' . '"nav-item"' . '>
                    <a class=' . '"d-flex align-items-center text-start mx-3 ms-0 pb-3"' . ' data-bs-toggle=' . '"pill"' . '
                        href=' . '"#tab-' . $row["LoaiSP"] . '"' . '>
                        <i class=' . '"fa fa-coffee fa-2x text-primary"' . '></i>
                        <div class=' . '"ps-3"' . '>
                            <h6 class=' . '"mt-n1 mb-0"' . '>' . $row["TenLoai"] . '</h6>
                        </div>
                    </a>
                </li>';
                    }
                }
                ?>
            </ul>
            <div class="tab-content">
                <?php
                $sql = "SELECT * FROM loaisp";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                echo
                '<div id=' . '"tab-1" class=' . '"tab-pane fade show p-0 active show"' . '>
                    <div class="row g-4">';
                $sql1 = "SELECT * FROM danhmucsp WHERE MaLoai=1";
                $result1 = $conn->query($sql1);
                if ($result1->num_rows > 0) {
                    while ($row1 = $result1->fetch_assoc()) {
                        echo
                        '<div class=' . '"col-lg-6"' . '>
                            <div class=' . '"d-flex align-items-center"' . '>
                                <img class=' . '"flex-shrink-0 img-fluid rounded"' . ' src=' . '"../views/img/' . $row1["Anh"] . '"' . ' alt=' . '""' . '
                                    style=' . '"width: 80px"' . ' />
                                <div class=' . '"w-100 d-flex flex-column text-start ps-4"' . '>
                                    <h5 class=' . '"d-flex justify-content-between border-bottom pb-2"' . '>
                                        <span>' . $row1["TenSP"] . '</span>
                                        <span class=' . '"text-primary"' . '>' . $row1["GiaBan"] . '</span>
                                    </h5>
                                    <small class=' . '"fst-italic"' . '>Ipsum ipsum clita erat amet dolor justo
                                        diam</small>
                                </div>
                                <a href="../views/cart/themhang.php?MaSP=' . $row1["MaSP"] . '"><button type="button" class="btn btn-success" style="margin-left: 15px">+</button></a>
                            </div>
                        </div>';
                    }
                }
                echo '</div>
                 </div>';
                ////////////////////////////////////////////////////////////////
                echo
                '<div id=' . '"tab-2" class=' . '"tab-pane fade show p-0"' . '>
                    <div class="row g-4">';
                $sql2 = "SELECT * FROM danhmucsp WHERE MaLoai=2";
                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_assoc()) {
                        echo
                        '<div class=' . '"col-lg-6"' . '>
                            <div class=' . '"d-flex align-items-center"' . '>
                                <img class=' . '"flex-shrink-0 img-fluid rounded"' . ' src=' . '"../views/img/' . $row2["Anh"] . '"' . ' alt=' . '""' . '
                                    style=' . '"width: 80px"' . ' />
                                <div class=' . '"w-100 d-flex flex-column text-start ps-4"' . '>
                                    <h5 class=' . '"d-flex justify-content-between border-bottom pb-2"' . '>
                                        <span>' . $row2["TenSP"] . '</span>
                                        <span class=' . '"text-primary"' . '>' . $row2["GiaBan"] . '</span>
                                    </h5>
                                    <small class=' . '"fst-italic"' . '>Ipsum ipsum clita erat amet dolor justo
                                        diam</small>
                                </div>
                                <a href="../views/cart/themhang.php?MaSP=' . $row2["MaSP"] . '"><button type="button" class="btn btn-success" style="margin-left: 15px">+</button></a>
                            </div>
                        </div>';
                    }
                }
                echo '</div>
                </div>';
                ////////////////////////////////////////////
                echo
                '<div id=' . '"tab-3" class=' . '"tab-pane fade show p-0"' . '>
                    <div class="row g-4">';
                $sql3 = "SELECT * FROM danhmucsp WHERE MaLoai=3";
                $result3 = $conn->query($sql3);
                if ($result3->num_rows > 0) {
                    while ($row3 = $result3->fetch_assoc()) {
                        echo
                        '<div class=' . '"col-lg-6"' . '>
                            <div class=' . '"d-flex align-items-center"' . '>
                                <img class=' . '"flex-shrink-0 img-fluid rounded"' . ' src=' . '"../views/img/' . $row3["Anh"] . '"' . ' alt=' . '""' . '
                                    style=' . '"width: 80px"' . ' />
                                <div class=' . '"w-100 d-flex flex-column text-start ps-4"' . '>
                                    <h5 class=' . '"d-flex justify-content-between border-bottom pb-2"' . '>
                                        <span>' . $row3["TenSP"] . '</span>
                                        <span class=' . '"text-primary"' . '>' . $row3["GiaBan"] . '</span>
                                    </h5>
                                    <small class=' . '"fst-italic"' . '>Ipsum ipsum clita erat amet dolor justo
                                        diam</small>
                                </div>
                                <a href="../views/cart/themhang.php?MaSP=' . $row3["MaSP"] . '"><button type="button" class="btn btn-success" style="margin-left: 15px">+</button></a>
                            </div>
                        </div>';
                    }
                }
                echo '</div>
                </div>';
                /////////////////////////////////////////
                echo
                '<div id=' . '"tab-4" class=' . '"tab-pane fade show p-0"' . '>
                    <div class="row g-4">';
                $sql4 = "SELECT * FROM danhmucsp WHERE MaLoai=4";
                $result4 = $conn->query($sql4);
                if ($result4->num_rows > 0) {
                    while ($row4 = $result4->fetch_assoc()) {
                        echo
                        '<div class=' . '"col-lg-6"' . '>
                            <div class=' . '"d-flex align-items-center"' . '>
                                <img class=' . '"flex-shrink-0 img-fluid rounded"' . ' src=' . '"../views/img/' . $row4["Anh"] . '"' . ' alt=' . '""' . '
                                    style=' . '"width: 80px"' . ' />
                                <div class=' . '"w-100 d-flex flex-column text-start ps-4"' . '>
                                    <h5 class=' . '"d-flex justify-content-between border-bottom pb-2"' . '>
                                        <span>' . $row4["TenSP"] . '</span>
                                        <span class=' . '"text-primary"' . '>' . $row4["GiaBan"] . '</span>
                                    </h5>
                                    <small class=' . '"fst-italic"' . '>Ipsum ipsum clita erat amet dolor justo
                                        diam</small>
                                </div>
                                <a href="../views/cart/themhang.php?MaSP=' . $row4["MaSP"] . '"><button type="button" class="btn btn-success" style="margin-left: 15px">+</button></a>
                            </div>
                        </div>';
                    }
                }
                echo '</div>
                </div>';
                //////////////////////////
                echo
                '<div id=' . '"tab-5" class=' . '"tab-pane fade show p-0"' . '>
                    <div class="row g-4">';
                $sql5 = "SELECT * FROM danhmucsp WHERE MaLoai=5";
                $result5 = $conn->query($sql5);
                if ($result5->num_rows > 0) {
                    while ($row5 = $result5->fetch_assoc()) {
                        echo
                        '<div class=' . '"col-lg-6"' . '>
                            <div class=' . '"d-flex align-items-center"' . '>
                                <img class=' . '"flex-shrink-0 img-fluid rounded"' . ' src=' . '"../views/img/' . $row5["Anh"] . '"' . ' alt=' . '""' . '
                                    style=' . '"width: 80px"' . ' />
                                <div class=' . '"w-100 d-flex flex-column text-start ps-4"' . '>
                                    <h5 class=' . '"d-flex justify-content-between border-bottom pb-2"' . '>
                                        <span>' . $row5["TenSP"] . '</span>
                                        <span class=' . '"text-primary"' . '>' . $row5["GiaBan"] . '</span>
                                    </h5>
                                    <small class=' . '"fst-italic"' . '>Ipsum ipsum clita erat amet dolor justo
                                        diam</small>
                                </div>
                                <a href="../views/cart/themhang.php?MaSP=' . $row5["MaSP"] . '"><button type="button" class="btn btn-success" style="margin-left: 15px">+</button></a>
                            </div>
                        </div>';
                    }
                }
                echo '</div>
                </div>';
                ?>
            </div>
        </div>
    </div>
</div>