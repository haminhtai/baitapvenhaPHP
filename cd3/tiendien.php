<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tinh tien dien</title>

    <style type="text/css">

        table{
            margin-left: 35%;
            background: whitesmoke;
            border: 1 solid black;
        }

        thead{           
            background: gray;    
        }

        td {
            color: black;
        }

        h2{
            font-family: verdana;
            text-align: center;
            text-anchor: middle;
            color: black;
        }
    </style>
</head>


<body>
    <?php 
        $tenchuho="";
        
        if(isset($_POST['tenchuho']))  
            $tenchuho=trim($_POST['tenchuho']); 
        
        if(isset($_POST['chisocu']))  
            $chisocu=trim($_POST['chisocu']); 
        else $chisocu=0;

        if(isset($_POST['chisocu']))  
            $chisomoi=trim($_POST['chisomoi']); 
        else $chisomoi=0;

        if(isset($_POST['dongia']))  
            $dongia=trim($_POST['dongia']); 
        else $dongia=20000;

        if(isset($_POST['tinh']))

            if (is_string($tenchuho) && is_numeric($chisocu) && is_numeric($chisomoi) && is_numeric($dongia))  

                $tienthanhtoan=($chisomoi - $chisocu) * $dongia;

            else {
                
                echo "<font color='red'>Vui lòng nhập vào đúng thông tin</font>"; 
                
                $tienthanhtoan="";
            }
        else $tienthanhtoan=0;

    ?>

<form name="Tính Tiền Điện" align='left' action="tinhtiendien.php" method="post">
    <table>
        <thead> 
            <th colspan="3" align="center" ><h2>THANH TOÁN TIỀN ĐIỆN</h2></th>
        </thead>
        <TR>
            <td>Tên chủ hộ:</td>
            <td><input type="text" name="tenchuho" value="<?php  echo $tenchuho;?> "/></td>
        </TR>
        <TR>
            <td>Chỉ số cũ:</td>
            <td><input type="text" name="chisocu" value="<?php  echo $chisocu;?> "/></td>
            <td>(Kw)</td>
        </TR>
        <TR>
            <td>Chỉ số mới:</td>
            <td><input type="text" name="chisomoi" value="<?php  echo $chisomoi;?> "/></td>
            <td>(Kw)</td>
        </TR>
        <TR>
            <td>Đơn Giá:</td>
            <td><input type="text" name="dongia" value="<?php  echo $dongia;?> "/></td>
            <td>(VND)</td>
        </TR>
        <TR>
            <td>Số Tiền Thanh Toán:</td>
            <td><input type="text" name="tienthanhtoan" disabled="disabled" value="<?php  echo $tienthanhtoan;?> "/></td>
            <td>(VND)</td>
        </TR>
        
        <tr>
            <td colspan="3" align="center"><input type="submit" value="Tính" name="tinh" /></td>
        </tr>
    </table>
</form>

</body>
</html>