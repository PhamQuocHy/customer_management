<?php
//truy vấn ds đã nhập
//mới lên trước
require_once 'pdo.php';

function khach_hang_selectall(){
    $sql="select * from khachhang order by ho_ten DESC";
    return pdo_query($sql);
}

//thêm mới 
function khach_hang_insert($ma_kh,$mat_khau,$ho_ten,$dia_chi,$so_dt,$kich_hoat,$img_id,$email,$vai_tro){
    $sql="insert into khachhang(ma_kh,mat_khau,ho_ten,dia_chi,so_dt,kich_hoat,img_id,email,vai_tro) VALUES (?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql,$ma_kh,$mat_khau,$ho_ten,$dia_chi,$so_dt,$kich_hoat,$img_id,$email,$vai_tro);
}

//xóa
function khach_hang_delete($ma_kh){
    $sql="delete from khachhang where ma_kh=?";
    pdo_execute($sql,$ma_kh);
}

//lấy thông tin 1 mã 
function khach_hang_getinfo($ma_kh){
    $sql="select * from khachhang where ma_kh=?";
    return pdo_query_one($sql,$ma_kh);
}

//cập nhật dữ liệu
function khach_hang_update($ma_kh,$mat_khau,$ho_ten,$dia_chi,$so_dt,$kich_hoat,$img_id,$email,$vai_tro){
    $sql="update khachhang set mat_khau=?,ho_ten=?,dia_chi=?,so_dt=?,kich_hoat=?,img_id=?,email=?,vai_tro=? where ma_kh=?";
    pdo_execute($sql,$mat_khau,$ho_ten,$dia_chi,$so_dt,$kich_hoat,$img_id,$email,$vai_tro,$ma_kh);
}

function khach_hang_update_pass($ma_kh,$mat_khau){
    $sql="update khachhang set mat_khau=? where ma_kh=?";
    pdo_execute($sql,$mat_khau,$ma_kh);
}
?>
