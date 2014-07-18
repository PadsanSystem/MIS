<?php
/* Management Information System (MIS)
 * Design & Development By AtfaGroup
 * Website : www.atfagroup.com
 * Email : info@atfagroup.com
 * Tel : 026-32545700
 * Fax : 026-32545701
 */
require_once("subheader.php");

if(isset($_POST['submit'])){
	$dir = @scandir("files");
	$dir_count=count($dir);
	for($i=2; $i<$dir_count; $i++){
		// Start show folder
		echo $dir[$i];
		echo "<br>";
		// end
		$file=@scandir("files/".$dir[$i]);
		$file_count=count($file);
		for($j=2; $j<$file_count; $j++){
			echo $file[$j];
			echo "<br>";
			$last=dbquery("SELECT id FROM documents ORDER BY id DESC LIMIT 1");
			$d_last=dbarray($last);
			$number=$d_last['id'];
			$number+=1;
			$md5=$number.$file[$j];
			dbquery("INSERT INTO documents (number, attach) VALUES ('".$dir[$i]."', '$md5')");
			copy("files/".$dir[$i]."/".$file[$j], "uploads/".$md5);
		}
	}
}
	
?>
<form name="frm" method="post" action="insert_multi.php" enctype="multipart/form-data">
		<div class="body">
			<div class="tr">
				<div class="td">
					<input name="submit" type="submit" value="پردازش اطلاعات" class="button"/>
				</div>
			</div>
		</div>
</form>

<?php require_once(BASEDIR."footer.php"); ?>