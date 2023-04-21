<?php
session_start();
    $ROOT_URL = "/hlv";
    $CONTENT_URL = "$ROOT_URL/content";
    $ADMIN_URL = "$ROOT_URL/admin";
    $SITE_URL = "$ROOT_URL/site";
    $UPLOAD_URL = "../../uploaded";

    function exist_param($fieldname){
        return array_key_exists($fieldname, $_REQUEST);
    }

    /*
* lưu file upload vào thư mục
* @param string $fieldname là tên trường file
* @param string $target_dir là thư mục lưu file
* @return tên file upload
*/
function save_file($fieldname,$target_dir){
    $file_uploaded = $_FILES[$fieldname];
    $fiel_name = basename($file_uploaded["name"]);
    $target_path = $target_dir . $fieldname;
    move_uploaded_file($file_uploaded["tmp_name"], $target_path);
    return $fiel_name;
}
?>