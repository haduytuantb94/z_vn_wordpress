<?
include 'config.php';
if (isset($_COOKIE['acc_token']) && isset($_COOKIE['rf_token']) && isset($_COOKIE['role'])) {
    if ($_COOKIE['role'] == 1) {
        $com_id = $_SESSION['com_id'];
        $user_id = $_SESSION['com_id'];
        //phân trang
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        if (isset($_GET['curr']) && is_numeric($_GET['curr'])) {
            $curr = $_GET['curr'];
        } else {
            $curr = 4;
        }
        //lấy giá trị của biến trên URL sau khi ấn nút tìm kiếm (Nâng cao)
        isset($_GET['tim-kiem']) ? $tim_kiem = trim($_GET['tim-kiem']) : $tim_kiem = "";
        isset($_GET['search_nc']) ? $search_nc = trim($_GET['search_nc']) : $search_nc = "";
        isset($_GET['ho_va_ten']) ? $ho_va_ten = trim($_GET['ho_va_ten']) : $ho_va_ten = "";
        isset($_GET['ngay_sinh']) ? $ngay_sinh = $_GET['ngay_sinh'] : $ngay_sinh = "";
        isset($_GET['so_cmnd']) ? $so_cmnd = trim($_GET['so_cmnd']) : $so_cmnd = "";
        isset($_GET['que_quan']) ? $que_quan = trim($_GET['que_quan']) : $que_quan = "";
        isset($_GET['noi_thuong_tru']) ? $noi_thuong_tru = trim($_GET['noi_thuong_tru']) : $noi_thuong_tru = "";

        //truy vấn
        $query_cmnd = "SELECT COUNT(`so_hoa_tai_lieu`.`id`) AS num_cmnd FROM `so_hoa_tai_lieu` INNER JOIN `cmnd` ON  `so_hoa_tai_lieu`.`id` = `cmnd`.`id_so_hoa` WHERE `phan_loai` = 2 AND `so_hoa_tai_lieu`.`id_bieu_mau` = 2 AND `id_cong_ty` = $com_id AND `trang_thai` = 2 AND `phe_duyet`= 1 ";
        echo  $query_cmnd;
        $query = "SELECT * FROM `so_hoa_tai_lieu` INNER JOIN `cmnd` ON `so_hoa_tai_lieu`.`id` = `cmnd`.`id_so_hoa` WHERE `id_cong_ty` = $com_id AND `trang_thai` = 2 AND `phe_duyet`= 1 ";
        if ($tim_kiem != "") {
            $like = " AND `ten_tep_tin` LIKE '%" . $tim_kiem . "%' ";
            $query .= $like;
            $query_cmnd .= $like;
        }
        // điều kiện tìm kiếm nâng cao
        if ($ho_va_ten != "") {
            $like = " AND `ho_ten` LIKE '%" . $ho_va_ten . "%' ";
            $query .= $like;
            $query_cmnd .= $like;
            $url_ho_va_ten = '&ho_va_ten=' . $ho_va_ten;
        }
        if ($so_cmnd != "") {
            $like = " AND `so_cmnd` LIKE '%" . $so_cmnd . "%' ";
            $query .= $like;
            $query_cmnd .= $like;
            $url_so_cmnd = '&so_cmnd=' . $so_cmnd;
        }
        if ($ngay_sinh != "") {
            $like = " AND `ngay_sinh` LIKE '%" . strtotime($ngay_sinh) . "%' ";
            $query .= $like;
            $query_cmnd .= $like;
            $url_ngay_sinh = '&ngay_sinh=' . $ngay_sinh;
        }
        if ($que_quan != "") {
            $like = " AND `que_quan` LIKE '%" . $que_quan . "%' ";
            $query .= $like;
            $query_cmnd .= $like;
            $url_que_quan = '&que_quan=' . $que_quan;
        }
        if ($noi_thuong_tru != "") {
            $like = " AND `noi_thuong_tru` LIKE '%" . $noi_thuong_tru . "%' ";
            $query .= $like;
            $query_cmnd .= $like;
            $url_noi_thuong_tru = '&noi_thuong_tru=' . $noi_thuong_tru;
        }
        //đếm số lượng biểu mẫu đã scan:
        $result_qr = new db_query($query_cmnd);
        $count_cmnd = mysql_fetch_assoc($result_qr->result);
        //phân trang
        $total = $count_cmnd['num_cmnd'];

        //nếu $_GET['tim-kiem'] != ""
        $url = '/thong-ke-hop-dong.html?curr=' . $curr;
        if ($tim_kiem != "") {
            $url = '/thong-ke-chung-minh-nhan-dan.html?curr=' . $curr . '&tim-kiem=' . $tim_kiem;
        }
        // Nếu $_GET['search_nc'] != ""
        if ($search_nc == "true") {

            $url = '/thong-ke-chung-minh-nhan-dan.html?curr=' . $curr . $url_loai_van_ban . $url_ngay_ban_hanh . $url_so_hop_dong . $ben_mua . $ben_ban . '&search_nc=' . $search_nc;
        }

        $start = ($page - 1) * $curr;
        $start = abs($start);
        //tìm kiếm :
        $limit = "LIMIT $start,$curr";
        $query .= $limit;
        $list_q_cmd = new db_query($query);
    } else if ($_COOKIE['role'] == 2) {
        header('location: /tat-ca-tep-tin.html');
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex,nofollow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://timviec365.vn/favicon.ico" rel="shortcut icon" />
    <link rel="preload" href="../fonts/Roboto-Bold.woff2" as="font" type="font/woff2" crossorigin="anonymous" />
    <link rel="preload" href="../fonts/Roboto-Medium.woff2" as="font" type="font/woff2" crossorigin="anonymous" />
    <link rel="preload" href="../fonts/Roboto-Regular.woff2" as="font" type="font/woff2" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.style.css?ver=<?= $ver ?>">
    <link rel="stylesheet" media="all" href="../css/admin.style.css?ver=<?= $ver ?>" media="all" onload="if (media != 'all')media='all'">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Thống kê chứng minh nhân dân</title>
</head>

<body>
<div class="adm_container thongke_ctiet">
    <?php include "../includes/admin.sidebar.php"; ?>
    <div class="adm_content_col">
        <?php include "../includes/admin.header.php"; ?>
        <div class="adm_content">
            <div class="cnt_layout_2">
                <div class="page_contract">
                    <div class="breadcrumb_tk">
                        <a class="adm_box_title breadcrumb-color" href="thong-ke.html">Thống kê </a>
                        <span>&#10095;</span>
                        <span class="adm_box_title">CMND/CCCD</span>
                    </div>
                    <div class="contract_file">
                        <div class="cmnd_div_1">
                            <p class="font_dam">Tổng số tập tin</p>
                            <p><?= $count_cmnd['num_cmnd'] ?></p>
                        </div>
                        <div class="ct_div_2">
                            <form method="get">
                                <div class="ct_search_cont">
                                    <input type="text" class="tim-kiem" name="tim-kiem" placeholder="Nhập từ khoá" value="<?= (isset($tim_kiem)) ? $tim_kiem : "" ?>">
                                    <span class="show_advance_ct_search">
                                            <button class="search_btn" type="button" data-id="<?= $curr ?>">
                                                <img src="../images/admin_img/serch_icon_left.png" alt="tìm kiếm chứng minh nhân dân">
                                            </button>
                                            <button class="filter-btn ml_10" type="button">
                                                <img class="" src="../images/admin_img/search_hop_dong.svg" alt="hợp đồng search">
                                            </button>
                                        </span>
                                </div>
                            </form>
                            <div class="show_ct_search cmnd_search">
                                <div class="show_ct_search_cont">
                                    <div class="search-header-title">
                                        <p class="font_16 font_dam">Tìm kiếm nâng cao</p>
                                        <p class="box-delete">&#10006;</p>
                                    </div>
                                    <ul>
                                        <li>
                                            <label>Họ và tên</label>
                                            <input type="text" name="ho_va_ten" class="ho_va_ten_search" value="<?= $ho_va_ten ?>">
                                        </li>
                                        <li>
                                            <label>Số CMND/CCCD</label>
                                            <input type="text" name="so_cmnd" class="so_cmnd_search" value="<?= $so_cmnd ?>">
                                        </li>
                                        <li>
                                            <label>Ngày sinh</label>
                                            <input type="date" name="ngay_sinh" class="ngay_sinh_search" value="<?= $ngay_sinh ?>">
                                        </li>
                                        <li>
                                            <label>Quê quán</label>
                                            <input type="text" name="que_quan" class="que_quan_search" value="<?= $que_quan ?>">
                                        </li>
                                        <li>
                                            <label>Nơi thường trú</label>
                                            <input type="text" name="noi_thuong_tru" class="noi_thuong_tru_search" value="<?= $noi_thuong_tru ?>">
                                        </li>
                                    </ul>
                                    <div class="ct_search_submit">
                                        <button type="button" class="save_file_upload search-tk-ncao" data-id="<?= $curr ?>">Tìm kiếm</button>
                                        <button type="button" class="cancel_file_upload">Xoá lựa chọn</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ctn_table">
                        <table class="tb_file_contract tb_file_contract_cmnd arrange_alphab">
                            <tr>
                                <th class="w-15 cr_one font_three">Tên tập tin <i class="ic-arrow-down pl-10"></i></th>
                                <th class="w-15 cr_one font_three">Họ và tên <i class="ic-arrow-down pl-10"></i></th>
                                <th class="w-10 cr_one font_three">CCCD/CMND <i class="ic-arrow-down pl-10"></i></th>
                                <th class="w-10 cr_one font_three">Ngày sinh <i class="ic-arrow-down pl-10"></i></th>
                                <th class="w-20 cr_one font_three">Quê quán <i class="ic-arrow-down pl-10"></i></th>
                                <th class="w-20 cr_one font_three">Nơi thường trú <i class="ic-arrow-down pl-10"></i>
                                </th>
                                <th class="w-5 cr_one font_three"></th>
                            </tr>
                            <? while ($row_cmnd = mysql_fetch_assoc($list_q_cmd->result)) { ?>
                                <tr>
                                    <td>
                                        <div class="ten_dat">
                                            <span class="anh_tuongtr"><img src="../images/admin_img/hd_icon_1.svg" alt=""></span>
                                            <a class="cr_one font_three block_ellip ml_10 ten_chitiet"><?= $row_cmnd['ten_tep_tin'] ?></a>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="block_ellip cr_one font_three"><?= $row_cmnd['ho_ten'] ?></p>
                                    </td>
                                    <td>
                                        <p class="block_ellip cr_one font_three"><?= $row_cmnd['so_cmnd'] ?></p>
                                    </td>
                                    <td>
                                        <p class="block_ellip cr_one font_three"><?= date('d/m/Y', $row_cmnd['ngay_sinh']) ?></p>
                                    </td>
                                    <td>
                                        <p class="block_ellip cr_one font_three"><?= $row_cmnd['que_quan'] ?></p>
                                    </td>
                                    <td>
                                        <p class="block_ellip cr_one font_three"><?= $row_cmnd['noi_thuong_tru'] ?></p>
                                    </td>
                                    <td>
                                        <div class="more-view-container">
                                            <span class="more_detail"><img src="../images/admin_img/more_detail.png"></span>
                                            <a class="export_detail ml_10" href="../pictures/<?= $row_cmnd['ten_file'] ?>" target="_blank"><img src="../images/admin_img/export_detail.png"></a>
                                        </div>
                                        <div class="read_detail_table">
                                            <ul>
                                                <li class="chi_tiet_mau" data-id="<?= $row_cmnd['id_so_hoa']; ?>" data-com="<?= $com_id ?>">
                                                    <span class="avt_daidien"><img src="../images/admin_img/chi_tiet.png"></span>
                                                    <span class="chi_tiet cr_one font_three">Chi tiết</span>
                                                </li>
                                                <li class="di_chuyen" data-id="<?= $row_cmnd['id_so_hoa']; ?>" data-com="<?= $com_id ?>">
                                                    <span class="avt_daidien"><img src="../images/admin_img/di_chuyen.png"></span>
                                                    <span class="chi_tiet cr_one font_three">Di chuyển</span>
                                                </li>
                                                <li class="chia_se" data-id="<?= $row_cmnd['id_so_hoa']; ?>" data1="<?= $com_id ?>">
                                                    <span class="avt_daidien"><img src="../images/admin_img/chia_se.png"></span>
                                                    <span class="chi_tiet cr_one font_three">Chia sẻ</span>
                                                </li>
                                                <li class="thung_rac" data-id="<?= $row_cmnd['id_so_hoa']; ?>" data-com="<?= $com_id ?>">
                                                    <span class="avt_daidien"><img src="../images/admin_img/thung_rac.png"></span>
                                                    <span class="chi_tiet cr_one font_three">Thùng rác</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <? } ?>
                        </table>
                    </div>
                    <div class="contract_pagi_bar">
                        <div class="left_pagi_bar">
                            <span>Xem</span>
                            <select class="hien_thi" name="hien_thi">
                                <option value="1" <?= ($curr == 1) ? "selected" : "" ?>>1</option>
                                <option value="2" <?= ($curr == 2) ? "selected" : "" ?>>2</option>
                                <option value="3" <?= ($curr == 3) ? "selected" : "" ?>>3</option>
                                <option value="4" <?= ($curr == 4) ? "selected" : "" ?>>4</option>
                            </select>
                            <span>trên 1 trang</span>
                        </div>
                        <div class="right_pagi_bar">
                            <p class="tt_hienthi">Hiển thị <?= $start + 1 ?> đến <?= ($curr > $total) ? ($total) : (($start + $curr) - ((($page * $curr) - $total > 0) ? (($page * $curr) - $total) : 0)) ?> của <?= $total ?> tệp </p>
                            <ul class="pagination-page">
                                <?= generatePageBar3('', $page, $curr, $total, $url, '&', '', 'active', 'preview', '<', 'next', '>', '', '<<<', '', '>>>'); ?>
                            </ul>
                        </div>
                    </div>
                    <!------------------------------->
                    <div class="modal2 text-center modal_detail_cmnd pu_detail_width" id="">
                        <div class="m-content">
                            <div class="chi_tiet_form" id="form_cmnd">
                                <div class="form_dt_container">
                                    <div class="dt_title">
                                        <span class="font_dam">Thông tin chi tiết</span>
                                        <span class="box-delete">&#10006;</span>
                                    </div>
                                    <div class="cnt_form cnt_form_cmnd">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<? include('../modal/xoa-file-chi-tiet-thong-ke.php') ?>
<? include('../modal/di_chuyen_tep_tin.php') ?>
<? include('../modal/chia_se_tep_tin.php') ?>
<? include('../modal/dang_xuat.php')  ?>
</body>
<script type="text/javascript" src="../js/jquery3.6.js"></script>
<script src="../js/select2.min.js"></script>
<script type="text/javascript" src="../js/admin.main.js"></script>
<script type="text/javascript" src="../js/app.js"></script>
<script type="text/javascript" src="../js/style.js"></script>
<script type="text/javascript">
    $('th').click(function() {
        var table = $(this).parents('table').eq(0)
        var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
        this.asc = !this.asc
        $('.ic-arrow-down').toggleClass('active');

        if (!this.asc) {
            rows = rows.reverse();
        }
        for (var i = 0; i < rows.length; i++) {
            table.append(rows[i])
        }
    })

    function comparer(index) {
        return function(a, b) {
            var valA = getCellValue(a, index),
                valB = getCellValue(b, index)
            return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
        }
    }

    function getCellValue(row, index) {
        return $(row).children('td').eq(index).text()
    }

    // ajax thông tin chi tiết
    $('.chi_tiet_mau').click(function() {
        var id_so_hoa = $(this).attr('data-id');
        var com_id = $(this).attr('data-com');
        var id_phan_loai = 2;
        $.ajax({
            url: '../ajax/thong_tin_chi_tiet.php',
            type: 'POST',
            data: {
                id_so_hoa: id_so_hoa,
                com_id: com_id,
                id_phan_loai: id_phan_loai
            },
            success: function(data) {
                $('.modal_detail_cmnd .m-content .cnt_form').html(data);
            }
        })
    })
    //jquery phân trang
    $('.hien_thi').on('change', function() {
        var curr = $(this).val();
        var page = 1;
        if ($('.tim-kiem').val() != "") {
            var search = $('.tim-kiem').val();
            window.location.href = '/thong-ke-chung-minh-nhan-dan.html?curr=' + curr + '&page=' + page + '&tim-kiem=' + search;
        } else {
            var ho_va_ten = (($('.ho_va_ten_search').val()) != "") ? ('&ho_va_ten=' + $('.ho_va_ten_search').val()) : "";
            var ngay_sinh = (($('.ngay_sinh_search').val()) != "") ? ('&ngay_sinh=' + $('.ngay_sinh_search').val()) : "";
            var so_cmnd = (($('.so_cmnd_search').val()) != "") ? ('&so_cmnd=' + $('.so_cmnd_search').val()) : "";
            var que_quan = (($('.que_quan_search').val()) != "") ? ('&que_quan=' + $('.que_quan_search').val()) : "";
            var noi_thuong_tru = (($('.noi_thuong_tru_search').val()) != "") ? ('&noi_thuong_tru=' + $('.noi_thuong_tru_search').val()) : "";
            var search_nc = "true";
            window.location.href = '/thong-ke-chung-minh-nhan-dan.html?curr=' + curr + '&page=' + page + '&search_nc=' + search_nc + ho_va_ten + ngay_sinh + so_cmnd + que_quan + noi_thuong_tru;
        }
    });
    //tìm kiếm thường
    $('.search_btn').on('click', function() {
        var value_search = $('.tim-kiem').val();
        var curr = $(this).attr('data-id');
        window.location.href = '/thong-ke-chung-minh-nhan-dan.html?tim-kiem=' + value_search + '&curr=' + curr;
    });

    //tìm kiếm nâng cao
    $('.search-tk-ncao').on('click', function() {
        var curr = $(this).attr('data-id');
        var ho_va_ten = (($('.ho_va_ten_search').val()) != "") ? ('&ho_va_ten=' + $('.ho_va_ten_search').val()) : "";
        var ngay_sinh = (($('.ngay_sinh_search').val()) != "") ? ('&ngay_sinh=' + $('.ngay_sinh_search').val()) : "";
        var so_cmnd = (($('.so_cmnd_search').val()) != "") ? ('&so_cmnd=' + $('.so_cmnd_search').val()) : "";
        var que_quan = (($('.que_quan_search').val()) != "") ? ('&que_quan=' + $('.que_quan_search').val()) : "";
        var noi_thuong_tru = (($('.noi_thuong_tru_search').val()) != "") ? ('&noi_thuong_tru=' + $('.noi_thuong_tru_search').val()) : "";
        var search_nc = "true";
        window.location.href = '/thong-ke-chung-minh-nhan-dan.html?&search_nc=' + search_nc + ho_va_ten + ngay_sinh + so_cmnd + que_quan + noi_thuong_tru + '&curr=' + curr;
    });

    $('.tim-kiem').on('click', function() {
        $('.show_ct_search_cont').hide();
    })
    $('.filter-btn').on('click', function() {
        $('.tim-kiem').val("");
    })
    //ajax xoá file
    $('.thung_rac').on('click', function() {
        var id = $(this).attr('data-id');
        $('.xoa-file').attr('data-id', id);
    })

    $('.xoa-file').on('click', function() {
        var id_so_hoa = $(this).attr('data-id');
        var com_id = $(this).attr('data-com');
        $.ajax({
            url: '../ajax/du_lieu_da_xoa.php',
            type: 'POST',
            data: {
                id_so_hoa: id_so_hoa,
                com_id: com_id
            },
            success: function(data) {
                if (data == "") {
                    window.location.reload();
                } else if (data != "") {
                    alert(data);
                }
            }
        })
    })
</script>

</html>
