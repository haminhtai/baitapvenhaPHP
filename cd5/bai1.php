<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Tinh chu vi va dien tich</title>
<style>
fieldset {
  background-color: #eeeeee;
}

legend {
  background-color: gray;
  color: white;
  padding: 5px 10px;
}

input {
  margin: 5px;
}
</style>
</head>
<body>
<?php 
abstract class Hinh{
	protected $ten, $dodai;
	public function setTen($ten){
		$this->ten=$ten;
	}
	public function getTen(){
		return $this->ten;
	}
	public function setDodai($doDai){
		$this->dodai=$doDai;
	}
	public function getDodai(){
		return $this->dodai;
	}
	abstract public function tinh_CV();
	abstract public function tinh_DT();
}
class HinhTron extends Hinh{
	const PI=3.14;
	function tinh_CV(){
		return $this->dodai*2*self::PI;
	}
	function tinh_DT(){
		return pow($this->dodai,2)*self::PI;
	}
}
class HinhVuong extends Hinh{
	public function tinh_CV(){
		return $this->dodai*4;
	}
	public function tinh_DT(){
		return pow($this->dodai,2);
	}
}

class TamGiacDeu extends Hinh{
	public function tinh_CV(){
		return $this->dodai*3;
	}
	public function tinh_DT(){
		return pow($this->dodai,2)*sqrt(3)/4;
	}
}

class TamGiacThuong extends Hinh{
	protected $a,$b,$c,$canh,$cv;
	
	public function setCanh($dodai)
	{
		$this->canh=explode(",",$dodai);
		$this->a = $this->canh[0];
		$this->b = $this->canh[1];
		$this->c = $this->canh[2];
		$this->cv=$this->a+$this->b+$this->c ;

	}
	public function tinh_CV(){
		return $this->cv;
	}
	public function tinh_DT(){
		return sqrt($this->cv/2*($this->cv/2-$this->a)*($this->cv/2-$this->b)*($this->cv/2-$this->c) );
	}
}

class HinhCN extends Hinh{
	protected $a,$b,$canh,$cv;
	
	public function setCanh($dodai)
	{
		$this->canh=explode(",",$dodai);
		$this->a = $this->canh[0];
		$this->b = $this->canh[1];
		$this->cv=($this->a+$this->b)*2 ;

	}
	public function tinh_CV(){
		return $this->cv;
	}
	public function tinh_DT(){
		return $this->a * $this->b;
	}
}

$str=NULL;
if(isset($_POST['tinh'])){
	if(isset($_POST['hinh']) && ($_POST['hinh'])=="hv"){
		$hv=new HinhVuong();
		$hv->setTen($_POST['ten']);
		$hv->setDodai($_POST['dodai']);
		$str= "Di???n t??ch h??nh vu??ng ".$hv->getTen()." l????: ".$hv->tinh_DT()." \n".
		 		"Chu vi c???a h??nh vu??ng ".$hv->getTen()." l????: ".$hv->tinh_CV();
	}
	if(isset($_POST['hinh']) && ($_POST['hinh'])=="ht"){
		$ht=new HinhTron();
		$ht->setTen($_POST['ten']);
		$ht->setDodai($_POST['dodai']);
		$str= "Di???n t??ch c???a h??nh tr??n ".$ht->getTen()." l????: ".$ht->tinh_DT()." \n".
				"Chu vi c???a h??nh tr??n ".$ht->getTen()." l????: ".$ht->tinh_CV();
	}
    if(isset($_POST['hinh']) && ($_POST['hinh'])=="tgd"){
		$ht=new TamGiacDeu();
		$ht->setTen($_POST['ten']);
		$ht->setDodai($_POST['dodai']);
		$str= "Di???n t??ch c???a h??nh tam giac d???u ".$ht->getTen()." l????: ".$ht->tinh_DT()." \n".
				"Chu vi c???a h??nh tam giac ?????u ".$ht->getTen()." l????: ".$ht->tinh_CV();
	}
	if(isset($_POST['hinh']) && ($_POST['hinh'])=="tg"){
		$ht=new TamGiacThuong();
		$ht->setTen($_POST['ten']);
		$ht->setCanh($_POST['dodai']);
		$str= "Di???n t??ch c???a h??nh tam giac  ".$ht->getTen()." l????: ".$ht->tinh_DT()." \n".
				"Chu vi c???a h??nh tam giac  ".$ht->getTen()." l????: ".$ht->tinh_CV();
	}
	if(isset($_POST['hinh']) && ($_POST['hinh'])=="cn"){
		$ht=new HinhCN();
		$ht->setTen($_POST['ten']);
		$ht->setCanh($_POST['dodai']);
		$str= "Di???n t??ch c???a h??nh ch??? nh???t  ".$ht->getTen()." l????: ".$ht->tinh_DT()." \n".
				"Chu vi c???a h??nh ch??? nh???t  ".$ht->getTen()." l????: ".$ht->tinh_CV();
	}

}
?>
<form action="" method="post">
<fieldset>
	<legend>T??nh chu vi v?? di???n t??ch c??c h??nh ????n gi???n</legend>
	<table border='0'>
		<tr>
			<td>Ch???n h??nh</td>
			<td><input type="radio" name="hinh" value="hv" 
					<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="hv") echo 'checked'?>/>H??nh vu??ng
				<input type="radio" name="hinh" value="ht"
					<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="ht") echo 'checked'?>/>H??nh tr??n
				<input type="radio" name="hinh" value="tgd" 
					<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="tgd") echo 'checked'?>/>H??nh tam gi??c ?????u
				<input type="radio" name="hinh" value="tg" 
					<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="tg") echo 'checked'?>/>H??nh tam gi??c
				<input type="radio" name="hinh" value="cn" 
					<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="cn") echo 'checked'?>/>H??nh ch??? nh???t
			</td>
		</tr>
		<tr>
			<td>Nh???p t??n:</td>
			<td><input type="text"  name="ten" value="<?php if(isset($_POST['ten'])) echo $_POST['ten'];?>"/></td>
		</tr>
		<tr>
			<td>Nh???p ????? d??i:</td>
			<td><input type="text"  name="dodai" value="<?php if(isset($_POST['dodai'])) echo $_POST['dodai'];?>"/></td>
		</tr>
		<tr><td>K???t qu???:</td>
			<td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str;?></textarea></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="tinh" value="T??NH"/></td>
		</tr>
	</table>
</fieldset>
</form>
</body>
</html>

