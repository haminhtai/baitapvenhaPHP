<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Xử lý n</title>
</head>

<body>
    <?php
    if (isset($_POST['n'])) $n = $_POST['n'];
    else $n = 0;

    $ketqua = "";
    $ketqua1 = "";
    if (isset($_POST['hthi'])) {    //Tạo mảng có n phần tử, các phần tử có giá trị [-100,100]
        $arr = array();
        for ($i = 0; $i < $n; $i++) {
            $x = rand(-200, 200);
            $arr[$i] = $x;
        }
        //In ra mảng vừa tạo
        $ketqua = "Mảng được tạo là:" . implode(" ", $arr) . "&#13;&#10;";

        $c = 0;

        for($i=0;$i<$n-1;$i++)
        {
            for($j=$i+1;$j<$n;$j++)
            {
                if($arr[$i]>$arr[$j])
                {
                    $c=$arr[$i];
                    $arr[$i] =$arr[$j];
                    $arr[$j] =$c;
                }
            }
        }
        $ketqua1 = "Mảng được sx là:" . implode(" ", $arr) . "&#13;&#10;";
    }
    ?>
    <form action="" method="post">
        Nhập n: <input type="text" name="n" value="<?php echo $n ?>" />
        <input type="submit" name="hthi" value="Hiển thị" />
        Kết quả: <br>
        <textarea cols="70" rows="10" name="ketqua"> <?php echo $ketqua ?></textarea>
        <textarea cols="70" rows="10" name="ketqua1"> <?php echo $ketqua1 ?></textarea>
    </form>
</body>

</html>