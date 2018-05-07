<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/6
 * Time: 20:05
 */

// 允许上传的图片后缀
//$allowedExts = array("gif", "jpeg", "jpg", "png");
//$temp = explode(".", $_FILES["file"]["name"]);
//echo $_FILES["file"]["size"];
//$extension = end($temp);     // 获取文件后缀名
//if ((($_FILES["file"]["type"] == "image/gif")
//        || ($_FILES["file"]["type"] == "image/jpeg")
//        || ($_FILES["file"]["type"] == "image/jpg")
//        || ($_FILES["file"]["type"] == "image/pjpeg")
//        || ($_FILES["file"]["type"] == "image/x-png")
//        || ($_FILES["file"]["type"] == "image/png"))
//    && ($_FILES["file"]["size"] < 404800)   // 小于 200 kb
//    && in_array($extension, $allowedExts))
//{
    if ($_FILES["videoImgUrl"]["error"] > 0)
    {
        echo "错误：: " . $_FILES["videoImgUrl"]["error"] . "<br>";
    }
    else
    {
        echo "上传文件名: " . $_FILES["videoImgUrl"]["name"] . "<br>";
        echo "文件类型: " . $_FILES["videoImgUrl"]["type"] . "<br>";
        echo "文件大小: " . ($_FILES["videoImgUrl"]["size"] / 1024) . " kB<br>";
        echo "文件临时存储的位置: " . $_FILES["videoImgUrl"]["tmp_name"] . "<br>";

        // 判断当期目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
        if (file_exists("../video_assert/image/" . $_FILES["videoImgUrl"]["name"]))
        {
            echo $_FILES["videoImgUrl"]["name"] . " 文件已经存在。 ";
        }
        else
        {
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            move_uploaded_file($_FILES["videoImgUrl"]["tmp_name"], "../video_assert/image/" . $_FILES["videoImgUrl"]["name"]);
            echo "文件存储在: " . "/video_assert/image//" . $_FILES["videoImgUrl"]["name"];
        }
    }
//}
//else
//{
//    echo "非法的文件格式";
//}