<?php
include "../model/pdo.php";
include "../model/dichvu.php";
include "../view/header.php";

$dsdm = loadall_danhmuc();

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "listsp":
            if (isset($_POST['clickOK']) && ($_POST['clickOK'])) {
                $keyw = $_POST['keyw'];
                $iddm = $_POST['iddm'];
            } else {
                $keyw = "";
                $iddm = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            
            include "listdichvu.php";
            break;
        case "addsp":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                
                $tendv = $_POST['tendv'];
                $giadv = $_POST['giadv'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                //                    echo $hinh;
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                //                    echo $target_file;
                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                    //                        echo "Bạn đã upload ảnh thành công";
                } else {
                    //                        echo "Upload ảnh không thành công";
                }
                //                    echo $iddm;
                insert_dichvu($tendv,$giadv, $hinh, $mota);
                $thanhcong = "Thêm thành công";
            }

            $listdanhmuc = loadall_danhmuc();
            include "add.php";
            break;
        
            case "suasp":    
                
                include "update.php";
                break;

            
    }
} else {
    
}

include "footer.php";
