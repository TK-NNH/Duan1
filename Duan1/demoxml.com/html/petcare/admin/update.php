<?php

if (isset($_GET['iddv']) && is_numeric($_GET['iddv'])) {
    $id = $_GET['iddv'];
    $dichvu = load_ten_dm($id);
    if ($dichvu) {
        $tendv = $dichvu['name'];
        $giadv = $dichvu['Gia'];
        $hinh = $dichvu['img'];
        $mota = $dichvu['MoTa'];
    } else {
    }
}

$hinhpath = "../upload/" . $hinh;
if (is_file($hinhpath)) {
    $hinhpath = "<img src='" . $hinhpath . "' width='100px' height='100px'>";
} else {
    $hinhpath = "No file img!";
}

if (isset($_POST['capnhat'])) {
    // Lấy thông tin từ biểu mẫu
    $id = $_POST['id'];
    $tendv = $_POST['tendv'];
    $giadv = $_POST['giadv'];
    $mota = $_POST['mota'];

    // Kiểm tra xem có tệp hình ảnh mới được tải lên không
    if (!empty($_FILES['hinh']['name'])) {
        $hinh_tmp = $_FILES['hinh']['tmp_name'];
        $hinh = $_FILES['hinh']['name'];
        move_uploaded_file($hinh_tmp, "../upload/" . $hinh);
    }

    
    $sql = "UPDATE `dichvu` SET `name`='$tendv', `Gia`='$giadv', `MoTa`='$mota'";
    if (!empty($hinh)) {
        $sql .= ", `img`='$hinh'";
    }
    $sql .= " WHERE `MaDichVu`='$id'";
    pdo_execute($sql);
    $thongbao = "cập nhật thành công!";

    
   
}
?>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="row2 mb10">
        <label>Tên sản phẩm:</label><br>
        <input type="text" name="tendv" value="<?= $tendv ?>">
    </div>
    <div class="row2 mb10">
        <label>Giá:</label><br>
        <input type="text" name="giadv" value="<?= $giadv ?>">
    </div>
    <div class="row2 mb10">
        <label>Hình ảnh:</label><br>
        <input type="file" name="hinh"><br>
        <?php echo $hinhpath ?>
    </div>
    <div class="row2 mb10">
        <label>Mô tả:</label><br>
        <textarea name="mota" id="" cols="30" rows="10"><?= $mota ?></textarea>
    </div>
    </div>

    <div class="row mb10 ">

        <input type="hidden" name="id" value="<?= $id ?>">
        <input class="mr20" name="capnhat" type="submit" value="Cập Nhật">
        <input class="mr20" type="reset" value="NHẬP LẠI">

        <a href="index.php?act=listsp"> <input class="mr20" type="button" value="DANH SÁCH"></a>


    </div>
    <?php
    if (isset($thongbao) && ($thongbao != "")) {
        echo $thongbao;
    }
    ?>
</form>