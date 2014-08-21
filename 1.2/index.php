<?php
/* Management Information System (MIS)
 * Design & Development By AtfaGroup
 * Website : www.atfagroup.coms
 * Email : info@atfagroup.com
 * Tel : 026-32545700
 * Fax : 026-32545701
 */
require_once("subheader.php");
?>
<legend class="text-right">جستجوی اطلاعات</legend>

<p class="text-error text-right">
: قابل توجه
<br>
.جهت جستجو می توانید از یک یا چند فیلد به صورت دلخواه استفاده نمایید

<form name="frm" method="post" action="<?php echo BASEDIR."index.php"; ?>">
	<div class="text-center">	
		<!-- P2 Documents -->
		<div class="input-append">	
			<input id="appendedInput" name="p2" class="span2 text-right" type="text" placeholder="نام متعامل را وارد نمایید">
			<span class="add-on">
				نام متعامل
				<i class="icon-user"></i>
			</span>
		</div>
		<!-- P1 Documents -->
		<div class="input-append">
			<input id="appendedInput" name="p1" class="span2 text-right" type="text" placeholder="نام معامل را وارد نمایید">
			<span class="add-on">
				نام معامل
				<i class="icon-user"></i>
			</span>
		</div>
		<!--Date Documents --> 
		<div class="input-append">
			<input id="appendedInput" name="date" class="span2 text-center" type="text" placeholder="----/--/--" data-mask="9999/99/99">
			<span class="add-on">
				تاریخ سند
				<i class="icon-time"></i>
			</span>
		</div>
		<!--No Documents --> 
		<div class="input-append">
			<input id="appendedInput" name="number" class="span2 text-center" type="text" placeholder="شماره سند را وارد نمایید">
			<span class="add-on">
				شماره سند
				<i class="icon-envelope"></i>
			</span>
		</div>
		<br>
		<!-- Submit Button -->
		<button name="submit" type="submit" class="btn btn-large btn-primary">جستجوی اطلاعات</button>
	</div>
</form>

<?php
if(isset($_POST['submit'])){
	$result=search($_POST['number'], $_POST['date'], $_POST['p1'], $_POST['p2']);
	if(dbrows($result)!=0){
		?>
		<legend class="text-right">اطلاعات یافت شده</legend>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ضمیمه</th>
					<th>متعامل</th>
					<th>معامل</th>
					<th>تاریخ سند</th>
					<th>شماره سند</th>
					<th>ردیف</th>
				</tr>
			</thead>
			<tbody>
				
	    <?php
		$i=1;
		while($data=dbarray($result)){
		?>
			<tr>
				<td>
					<a href="<?php echo UPLOADS.$data['attach'] ?>" target="_blank">
						<img src="<?php echo UPLOADS.$data['attach'] ?>" border="0" width="50px" class="img-polaroid"/>
					</a>
				</td>
				<td><?php echo $data['number']; ?></td>
				<td><?php echo $data['date']; ?></td>
				<td><?php echo $data['p2']; ?></td>
				<td><?php echo $data['p1']; ?></td>
				<td><?php echo $i; ?></td>
			</tr>
		<?php
		}
		?>
		</tbody>
		</table>
		<?php
	}
}
?>

<?php require_once(BASEDIR."footer.php"); ?>