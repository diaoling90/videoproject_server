<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/26
 * Time: 22:11
 */

function createDatabase()
{
    $servername = "localhost";
    $username = "root";
    $password = "root";

// 创建连接
    $conn = mysqli_connect($servername, $username, $password);
// 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }

// 创建数据库
    $sql = "CREATE DATABASE videodb";
    if ($conn->query($sql) === TRUE) {
        echo "数据库创建成功";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $conn->close();
}

//createDatabase();

function createUserTable()
{
    $con = mysqli_connect("localhost", "root", "root","videodb");
    if (!$con) {
        die('Could not connect: ' . mysql_error());
    }

    $sql = "CREATE TABLE Persons 
    (
    username varchar(15),
    password varchar(15),
    userId int not null ,
    id int not null primary key auto_increment
    )";
    $con->query($sql);
    $con->close();
}

function createVideoTable(){
    $con = mysqli_connect('localhost','root','root','videodb');
    if (!$con){
        die('Could not connect: ' . $con->error);
    }
    $sql = "create table videoInfo
    (
    id int not null primary key auto_increment,
    videoId long not null ,
    videoName varchar(50),
    videoDesc text,
    videoUrl varchar(200),
    videoImgUrl varchar(200),
    duration int,
    label varchar(100),
    type varchar(100)
    )";
    $con->query($sql);
    $con->close();
}

createVideoTable();