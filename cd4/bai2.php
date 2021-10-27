<!DOCTYPE html>

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tinh dien tich HCN</title>

    <style type="text/css">
        body {
            background-color: rgb(255, 233, 4);
        }

        table {
            background: rgb(22, 123, 12);
            margin-left: 35%;
            border: 0 solid blue;
        }

        thead {
            background: rgb(123, 221, 32);
        }

        td {
            color: rgb(12, 23, 43);
        }

        h3 {
            font-family: verdana;
            text-align: center;
            text-anchor: middle;
            color: rgb(225, 1, 1);
            font-size: medium;
        }
    </style>

</head>

<body>

    <?php
        if (isset($_POST['arr'])) $arr = $_POST['arr'];
        else $arr = null;
        $t=0;
        if (isset($_POST['hthi'])){
        foreach ($arr as $v) {
            if (is_numeric($v)) $t=$t+$v;
        }
        }
    ?>

</body>

<form align='left' action="" method="post">

    <table>

        <thead>
            <th colspan="4" align="center">
                <h2>TÍNH TỔNG TRÊN DÃY SỐ</h2>
            </th>
        </thead>

        <tr>
            <td>Dãy Số:</td>
            <td><input type="text" name="arr" value="<?php echo $arr; ?> " /></td>
        </tr>

        <tr>
            <td>Kết quả:</td>
            <td><input type="text" name="kq" disabled="disabled" value="<?php echo $t; ?> " /></td>
        </tr>

        <tr>
            <td colspan="2" align="center"><input type="submit" value="Tính" name="hthi" /></td>
        </tr>
    </table>

</form>

</body>

</html>