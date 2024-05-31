<style>
    th{
        padding: 20px;
        margin: 20px 20px;
    }
    td{
        margin: 20px 20px;
        padding: 20px 20px;
    }
</style>
<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH DỊCH VỤ</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
               <form action="index.php?act=listsp" method="post">
                
                   
               </form>
           <table>
           <?php
            if (!empty($thanhcong)) {
                echo '<p style="color:red;">' . $thanhcong . '</p>';
            }
            ?>
            <tr >
                <th></th>
                <th>MÃ DANH MỤC</th>
                <th>TÊN DỊCH VỤ</th>
                <th>GIÁ</th>
                <th>HÌNH</th>
                <th>MÔ TẢ</th>
                <th></th>
            </tr>

                <?php
                foreach ($dsdm as $dm){
                    extract($dm);
                    $hinhpath="../upload/".$img;
                    $suasp = "index.php?act=suasp&iddv=".$MaDichVu;
                    
                    $hard_delete = "index.php?act=hard_delete&idsp=".$MaDichVu;
                    $soft_delete = "index.php?act=soft_delete&idsp=".$MaDichVu;
                    if(is_file($hinhpath)){
                        $hinhpath="<img src= '".$hinhpath."' width='100px' height='100px'>";
                    }else{
                        $hinhpath="No file img!";
                    }
                    echo '<tr>
                    <td><input type="checkbox" name="" id=""></td>
                <td>'.$MaDichVu.'</td>
                <td>'.$name.'</td>
                <td>'.$Gia.'</td>
                <td>'.$hinhpath.'</td>
                <td>'.$MoTa.'</td>
                <td><a href="'.$suasp.'"><input type="button" value="Sửa"> </a>  
                <a href="'.$hard_delete.'"> <input type="button" value="Xóa " onclick="return confirm(\'bạn có muốn xóa  ko \')" ></a>
                <a href="'.$soft_delete.'"> <input type="button" value="Ẩn" onclick="return confirm(\'bạn có muốn ẩn ko \')" ></a>
            </tr>';
                }
                ?>
           </table>
           </div>
           <div class="row mb10 ">
         <input class="mr20" type="button" value="CHỌN TẤT CẢ">
         <input  class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
<a href="index.php?act=addsp"> <input  class="mr20" type="button" value="NHẬP THÊM"></a>
           </div>
          </form>
         </div>
        </div>

        

       
    </div>