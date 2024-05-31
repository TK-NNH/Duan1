<?php
function loadall_danhmuc(){
    $sql="select * from dichvu order by MaDichVu , mota , img ";
    $listdanhmuc=pdo_query($sql);
    return  $listdanhmuc;
}
function load_ten_dm($iddm){
    if($iddm>0){
        $sql="select * from dichvu where MaDichVu=".$iddm;  // Sửa thành bảng danhmuc thay vì sanpham
        $dm = pdo_query_one($sql);

        if ($dm) {
            return array(
                'MaDichVu'=> $dm['MaDichVu'],
                'name' => $dm['name'],
                'MoTa' => $dm['MoTa'],
                'Gia' => $dm['Gia'],
                'img' => $dm['img'],
                'trangthai'=> $dm['trangthai']
            );
        } else {
            return "";
        }
    } else {
        return "";
    }
}

function insert_dichvu($tendv,$giadv, $hinh, $mota){
    $sql = "INSERT INTO `dichvu`(`name`, `Gia`, `img`, `MoTa`) VALUES ('$tendv', '$giadv', '$hinh', '$mota')";
    pdo_execute($sql);
}

