<?php

//truy vấn ds đã nhập
//mới lên trước
require_once 'pdo.php';

function hoa_don_selectall(){
    $sql="select * from hoadon order by ma_hd DESC";
    return pdo_query($sql);
}
function hoa_don_delete($ma_hd){
    $sql="delete from hoadon where ma_hd=?";
    return pdo_query($sql,$ma_hd);
}
function hoa_don_getinfo($ma_hd){
    $sql="select * from hoadon where ma_hd=?";
    return pdo_query_one($sql,$ma_hd);
}
function hoa_don_update($ma_hd,$trang_thai){
    $sql="update hoadon set trang_thai=? where ma_hd=?";
    pdo_execute($sql,$trang_thai,$ma_hd);
}
function hoadon_insert($ma_hd,$ma_kh,$ho_ten,$tong_tien,$dia_chi_giao_hang,$sdt,$email,$ngay_dat,$trang_thai){
    $sql="insert into hoadon(ma_hd,ma_kh,ho_ten,tong_tien,dia_chi_giao_hang,sdt,email,ngay_dat,trang_thai) values (?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql,$ma_hd,$ma_kh,$ho_ten,$tong_tien,$dia_chi_giao_hang,$sdt,$email,$ngay_dat,$trang_thai);
}

function hoadonchitiet_insert($ma_hd,$ma_hh,$ten_hh,$so_luong,$ma_km,$don_gia,$gia_sau_km){
    $sql="insert into hoadonchitiet(ma_hd,ma_hh,ten_hh,so_luong,ma_km,don_gia,gia_sau_km) values (?,?,?,?,?,?,?)";
    pdo_execute($sql,$ma_hd,$ma_hh,$ten_hh,$so_luong,$ma_km,$don_gia,$gia_sau_km);
}
function hoadonchitiet_getinfo($ma_hd){
    $sql="select * from hoadonchitiet where ma_hd=?";
    return pdo_query($sql,$ma_hd);
}
function hoadonchitiet_delete($ma_hd){
    $sql="delete from hoadonchitiet where ma_hd=?";
    return pdo_query($sql,$ma_hd);
}
?>