<?php include("conf/config.inc.php");
$search = new search();
$arr = $search->CompleteSearch("honda");
echo count($arr);
//print_r($arr);



?>
<!--<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<table>
<tr>
<td>Price:</td>
<td><select name="price" >
<option value="0-1000" selected="selected">&lt; $1000</option>
<option value="1000-2000" selected="selected">$1000 - $2000</option>
<option value="2000-5000" selected="selected">$2000 - $5000</option>
<option value="5000-10000" selected="selected">$5000 - $100000</option>
<option value="10000" selected="selected">$10000 &gt;</option>
</select>
</td>
</tr>
<tr>
<td>

</td>
</tr>
</table>
</form>-->