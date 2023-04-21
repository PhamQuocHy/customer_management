<?php

//truy vấn ds đã nhập
//mới lên trước
require_once 'pdo.php';

function img_selectall(){
    $sql="select * from imgs order by img_id DESC";
    return pdo_query($sql);
}
//thêm mới loại
function img_insert($img_id,$link_img,$id_new,$ma_hh,$username){
    $sql="insert into imgs(img_id,link_img,id_new,ma_hh,username) values (?,?,?,?,?)";
    pdo_execute($sql,$img_id,$link_img,$id_new,$ma_hh,$username);
}

//xóa
function img_delete($img_id){
    $sql="delete from imgs where img_id=?";
    pdo_execute($sql,$img_id);
}

//lấy thông tin 1 mã loại
function img_getinfo($img_id){
    $sql="select * from imgs where img_id=?";
    return pdo_query_one($sql,$img_id);
}

//cập nhật dữ liệu
function img_update($img_id,$link_img,$id_new,$ma_hh,$username){
    $sql="update imgs set link_img=?,id_new=?,ma_hh=?,username=? where img_id=?";
    pdo_execute($sql,$link_img,$id_new,$ma_hh,$username,$img_id);
}

function anh_kh($ma_kh){
    $sql="SELECT b.link_img FROM khachhang a INNER JOIN imgs b on a.img_id = b.img_id WHERE a.ma_kh = ?";
    return pdo_query($sql,$ma_kh);
}

function anh_hh($ma_hh){
    $sql="SELECT b.link_img FROM hanghoa a INNER JOIN imgs b on a.ma_hh = b.ma_hh WHERE a.ma_hh = ?";
    return pdo_query($sql,$ma_hh);
}
?>
