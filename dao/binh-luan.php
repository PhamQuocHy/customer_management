<?php
//truy vấn ds đã nhập
//mới lên trước

require_once 'pdo.php';

function binh_luan_selectAll(){
    $sql="SELECT * FROM binhluan order by ngay_bl DESC";
    return pdo_query($sql);
}
function binh_luan_select_by_id($ma_bl){
    $sql="SELECT * FROM binhluan WHERE ma_bl=?";
    return pdo_query_one($sql,$ma_bl);
}
function binh_luan_select_by_id_hang_hoa($ma_hh){
    $sql="SELECT * FROM binhluan WHERE ma_hh=?";
    return pdo_query($sql,$ma_hh);
}
function binh_luan_select_by_hang_hoa($ma_hh){
    $sql="SELECT b.*,h.ten_hh FROM binhluan b JOIN hang_hoa h ON h.ma_hh=b.ma_hh where b.ma_hh=? ORDER BY ngay_bl DESC";
    return pdo_query($sql,$ma_hh);
}

//thêm mới 
function binh_luan_insert($noi_dung,$ma_hh,$ma_kh,$ngay_bl,$trang_thai){
    $sql="INSERT INTO binhluan(noi_dung,ma_hh,ma_kh,ngay_bl,trang_thai) 
    values (?,?,?,?,?)";
    pdo_execute($sql,$noi_dung,$ma_hh,$ma_kh,$ngay_bl,$trang_thai);
}

//xóa
function binh_luan_delete($ma_bl){
    $sql="DELETE FROM binhluan WHERE ma_bl=?";
    pdo_execute($sql,$ma_bl);
}

//lấy thông tin 1 mã 
function binh_luan_getinfo($ma_bl){
    $sql="SELECT * FROM binhluan WHERE ma_bl=?";
    return pdo_query_one($sql,$ma_bl);
}

//cập nhật dữ liệu
function binh_luan_update($noi_dung,$ma_hh,$ma_kh,$ma_hd,$ngay_bl,$trang_thai){
    $sql="UPDATE binhluan SET noi_dung=?,ma_hh=?,ma_kh=?,ma_hd=?,ngay_bl=?,trang_thai=? WHERE ma_bl=?";
    pdo_execute($sql,$noi_dung,$ma_hh,$ma_kh,$ma_hd,$ngay_bl,$trang_thai);
}
?>