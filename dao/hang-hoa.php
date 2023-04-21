<?php
//truy vấn ds đã nhập
//mới lên trước
require_once 'pdo.php';

function hang_hoa_selectall(){
    $sql="select * from hanghoa order by ten_hh DESC";
    return pdo_query($sql);
}

//thêm mới 
function hang_hoa_insert($ma_hh,$ten_hh,$don_gia,$img_id,$ngay_nhap,$mo_ta,$dac_biet,$so_luot_xem,$so_luong_nhap,$id_dm_sp){
    $sql="insert into hanghoa(ma_hh,ten_hh,don_gia,img_id,ngay_nhap,mo_ta,dac_biet,so_luot_xem,so_luong_nhap,id_dm_sp) values (?,?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql,$ma_hh,$ten_hh,$don_gia,$img_id,$ngay_nhap,$mo_ta,$dac_biet,$so_luot_xem,$so_luong_nhap,$id_dm_sp);
}

//xóa
function hang_hoa_delete($ma_hh){
    $sql="delete from hanghoa where ma_hh=?";
    pdo_execute($sql,$ma_hh);
}

//lấy thông tin 1 mã 
function hang_hoa_getinfo($ma_hh){
    $sql="select * from hanghoa where ma_hh=?";
    return pdo_query_one($sql,$ma_hh);
}

//cập nhật dữ liệu
function hang_hoa_update($ma_hh,$ten_hh,$don_gia,$img_id,$ngay_nhap,$mo_ta,$dac_biet,$so_luot_xem,$so_luong_nhap,$id_dm_sp){
    $sql="update hanghoa set ten_hh=?,don_gia=?,img_id=?,ngay_nhap=?,mo_ta=?,dac_biet=?,so_luot_xem=?,so_luong_nhap=?,id_dm_sp=? where ma_hh=?";
    pdo_execute($sql,$ten_hh,$don_gia,$img_id,$ngay_nhap,$mo_ta,$dac_biet,$so_luot_xem,$so_luong_nhap,$id_dm_sp,$ma_hh);
}
?>