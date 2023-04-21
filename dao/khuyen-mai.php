<?php

//truy vấn ds đã nhập
//mới lên trước
require_once 'pdo.php';

function khuyen_mai_selectall(){
    $sql="select * from khuyen_mai order by ma_km DESC";
    return pdo_query($sql);
}
//thêm mới 
function khuyen_mai_insert($ma_km,$hinh_thuc,$ngay_ap_dung,$ngay_ket_thuc,$id_km){
    $sql="insert into khuyen_mai(ma_km,hinh_thuc,ngay_ap_dung,ngay_ket_thuc,id_km) VALUES (?,?,?,?,?)";
    pdo_execute($sql,$ma_km,$hinh_thuc,$ngay_ap_dung,$ngay_ket_thuc,$id_km);
}

//xóa
function khuyen_mai_delete($ma_km){
    $sql="delete from khuyen_mai where ma_km=?";
    pdo_execute($sql,$ma_km);
}

//lấy thông tin 1 mã 
function khuyen_mai_getinfo($ma_km){
    $sql="select * from khuyen_mai where ma_km=?";
    return pdo_query_one($sql,$ma_km);
}

//cập nhật dữ liệu
function khuyen_mai_update($ma_km,$hinh_thuc,$ngay_ap_dung,$ngay_ket_thuc,$id_km){
    $sql="update khuyen_mai set hinh_thuc=?,ngay_ap_dung=?,ngay_ket_thuc=?,id_km=? where ma_km=?";
    pdo_execute($sql,$hinh_thuc,$ngay_ap_dung,$ngay_ket_thuc,$id_km,$ma_km);
}
?>