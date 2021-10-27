<!DOCTYPE html>

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tinh dien tich HCN</title>

    <style type="text/css">

        body 
        {  
            background-color: rgb(255,233,4);
        }

        table
        {
            background: rgb(22,123,12);
            margin-left: 35%;
            border: 0 solid blue;
        }

        thead
        {
            background: rgb(123,221,32);    
        }

        td 
        {
            color: rgb(12,23,43);
        }

        h3
        {
            font-family: verdana;
            text-align: center;
            text-anchor: middle;
            color: rgb(225,1,1);
            font-size: medium;
        }

    </style>

</head>

<body>

    <?php 
        if(isset($_POST['chieudai']))  $a=trim($_POST['chieudai']); 
        else $a=0;
        if(isset($_POST['chieurong']))  $b=trim($_POST['chieurong']); 
        else $b=0;
        if(isset($_POST['tinh']))
            if (is_numeric($a) && is_numeric($b))   $s=$a * $b;
            else 
            {
                echo "Vui lòng nhập vào số!"; 
                $s="";
            }
        else $s=0;
    ?>  

    <form align='left' action="" method="post">

    <table>

        <thead>
            <th colspan="4" align="center"><h2>DIỆN TÍCH HÌNH CHỮ NHẬT</h2></th>
        </thead>

        <tr>
            <td>Chiều dài:</td>
            <td><input type="text" name="chieudai" value="<?php  echo $a;?> "/></td>
        </tr>

        <tr>
            <td>Chiều rộng:</td>
            <td><input type="text" name="chieurong" value="<?php  echo $b;?> "/></td>
        </tr>

        <tr>
            <td>Diện tích:</td>
            <td><input type="text" name="dientich" disabled="disabled" value="<?php  echo $s;?> "/></td>
        </tr>

        <tr>
            <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>
        </tr>
        </table>

    </form>

</body>
</html>