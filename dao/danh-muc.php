<?php
//truy vấn ds đã nhập
//mới lên trước
require_once 'pdo.php';

function danhmuc_selectall(){
    $sql="select * from danhmuc order by tieu_de DESC";
    return pdo_query($sql);
}

//thêm mới loại
function danhmuc_insert($id_dm_sp,$tieu_de,$noi_dung,$img_id){
    $sql="insert into danhmuc(id_dm_sp,tieu_de,noi_dung,img_id) values (?,?,?,?)";
    pdo_execute($sql,$id_dm_sp,$tieu_de,$noi_dung,$img_id);
}

//xóa
function danhmuc_delete($id_dm_sp){
    $sql="delete from danhmuc where id_dm_sp=?";
    pdo_execute($sql,$id_dm_sp);
}

//lấy thông tin 1 mã loại
function danhmuc_getinfo($id_dm_sp){
    $sql="select * from danhmuc where id_dm_sp=?";
    return pdo_query_one($sql,$id_dm_sp);
}

//cập nhật dữ liệu
function danhmuc_update($id_dm_sp,$tieu_de,$noi_dung,$img_id){
    $sql="update danhmuc set tieu_de=?,noi_dung=?,img_id=? where id_dm_sp=?";
    pdo_execute($sql,$tieu_de,$noi_dung,$img_id,$id_dm_sp);
}

?>
