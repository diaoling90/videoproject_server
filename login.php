<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/15
 * Time: 22:07
 */
function connToUserDb(){
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "root";

// 创建连接
    $conn = mysqli_connect($servername, $dbUsername, $dbPassword,"videodb");
// 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }
    echo "连接成功";
    return $conn;
}
function saveInfo($username, $password)
{

    $conn = connToUserDb();
    $sql = "insert into persons values ('".$username."','".$password."','".time()."')";
    if ($conn->query($sql) === true){
        echo "插入成功";
    }else{
        echo $conn->error;
    }
    $conn->close();

}

function deleteInfo($username){
    $conn = connToUserDb();
    $sql = "delete from persons where username='".$username."'";
    if ($conn->query($sql) === true)
        echo "删除成功";
    else
        echo $conn->error;
    $conn->close();
}
