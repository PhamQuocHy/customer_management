<?php
//Kết nối pdo
$host = 'localhost';
$dbname = 'ameweb_admin';
$username = 'root';
$password = '';

// $host = 'localhost';
// $dbname = 'ameweb_admin';
// $username = 'ameweb_admin';
// $password = 'AnhmeemDigital@190920';

// Khởi tạo đối tượng PDO và thiết lập các thuộc tính
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

function pdo_get_connection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ameweb_admin";
    try{
        $conn = new PDO(
            "mysql:host=$servername;
            $dbname", 
            $username, 
            $password
        );
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed" . $e->getMessage();
    }
}
    // Thực thi câu lệnh INSERT, UPDATE, DELETE
    function pdo_execute($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt -> execute($sql_args);
        }
        catch(PDOException $e){
            throw $e;
        }
        finally{
            unset($conn);
        }
    }
       //array_slice(func_get_args(), 1) 

       //truy vấn nhiều dữ liệu
    function pdo_query($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            $rows = $stmt->fetchAll();
            return $rows;
        }
        catch(PDOException $e){
            throw $e;
        }
        finally{
            unset($conn);
        }
    }
        //$stmt->fetchAll()

    // Truy vấn 1 dữ liệu
    function pdo_query_one($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
        }
        catch(PDOException $e){
        throw $e;
        }
        finally{
        unset($conn);
        }
       }
    //$stmt->fetch(PDO::FETCH_ASSOC)

    // Truy vấn 1 giá trị
    function pdo_query_value($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
        }
        catch(PDOException $e){
        throw $e;
        }
        finally{
        unset($conn);
        }
       }
    //array_values($row)[0]

?>

