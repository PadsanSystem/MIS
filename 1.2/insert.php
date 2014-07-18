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
	require_once(INCLUDES."jdf.php");
	$cnt=count($_FILES['file']['name']);
	for($i=0; $i<$cnt; $i++){
		if($_FILES['file']['name'][$i]!=""){
			$push_number[]=$i;
			$push_name[]=$_FILES['file']['name'][$i];
		}
	}
	if($_POST['number']!=""){
		$cnt_push_number=count($push_name);
		for($j=0; $j<$cnt_push_number; $j++){
			$last=dbquery("SELECT id FROM documents ORDER BY id DESC LIMIT 1");
			$d_last=dbarray($last);
			$number=$d_last['id'];
			$number+=1;
			$attach=$number.$_FILES['file']['name'][$push_number[$j]];
			dbquery("INSERT INTO documents (p1, p2, number, attach, date, notary_id) VALUES ('".$_POST['p1']."', '".$_POST['p2']."', '".$_POST['number']."', '$attach', '".$_POST['date']."', '1')");
			move_uploaded_file($_FILES['file']['tmp_name'][$push_number[$j]], UPLOADS.$attach);
		}
	}
}

?>
<link rel="stylesheet" href="templates/default/css/bootstrap-fileupload.min.css" type="text/css">
<script src="includes/bootstrap-fileupload.min.js"></script>

<legend class="text-right">درج اطلاعات</legend>

<p class="text-error text-right">
: قابل توجه
<br>
.جهت درج اطلاعات می توانید از یک یا چند فیلد به صورت دلخواه استفاده نمایید

<form name="frm" method="post" action="<?php echo BASEDIR."insert.php"; ?>" enctype="multipart/form-data">
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
		<!--Attachments --> 
		<div class="input-append">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input span3">
						<i class="icon-file fileupload-exists"></i> 
						<span class="fileupload-preview"></span>
					</div>
					<span class="btn btn-file"><span class="fileupload-new">انتخاب فایل</span>
						<span class="fileupload-exists">ویرایش</span>
						<input name="file[]" type="file"/>
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">حذف</a>
				</div>
			</div>
		</div>
		<div class="input-append">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input span3">
						<i class="icon-file fileupload-exists"></i> 
						<span class="fileupload-preview"></span>
					</div>
					<span class="btn btn-file"><span class="fileupload-new">انتخاب فایل</span>
						<span class="fileupload-exists">ویرایش</span>
						<input name="file[]" type="file"/>
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">حذف</a>
				</div>
			</div>
		</div>
		<br>
		<div class="input-append">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input span3">
						<i class="icon-file fileupload-exists"></i> 
						<span class="fileupload-preview"></span>
					</div>
					<span class="btn btn-file"><span class="fileupload-new">انتخاب فایل</span>
						<span class="fileupload-exists">ویرایش</span>
						<input name="file[]" type="file"/>
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">حذف</a>
				</div>
			</div>
		</div>
		<div class="input-append">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input span3">
						<i class="icon-file fileupload-exists"></i> 
						<span class="fileupload-preview"></span>
					</div>
					<span class="btn btn-file"><span class="fileupload-new">انتخاب فایل</span>
						<span class="fileupload-exists">ویرایش</span>
						<input name="file[]" type="file"/>
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">حذف</a>
				</div>
			</div>
		</div>
		<br>
		<div class="input-append">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input span3">
						<i class="icon-file fileupload-exists"></i> 
						<span class="fileupload-preview"></span>
					</div>
					<span class="btn btn-file"><span class="fileupload-new">انتخاب فایل</span>
						<span class="fileupload-exists">ویرایش</span>
						<input name="file[]" type="file"/>
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">حذف</a>
				</div>
			</div>
		</div>
		<div class="input-append">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input span3">
						<i class="icon-file fileupload-exists"></i> 
						<span class="fileupload-preview"></span>
					</div>
					<span class="btn btn-file"><span class="fileupload-new">انتخاب فایل</span>
						<span class="fileupload-exists">ویرایش</span>
						<input name="file[]" type="file"/>
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">حذف</a>
				</div>
			</div>
		</div>
		<br>
		<div class="input-append">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input span3">
						<i class="icon-file fileupload-exists"></i> 
						<span class="fileupload-preview"></span>
					</div>
					<span class="btn btn-file"><span class="fileupload-new">انتخاب فایل</span>
						<span class="fileupload-exists">ویرایش</span>
						<input name="file[]" type="file"/>
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">حذف</a>
				</div>
			</div>
		</div>
		<div class="input-append">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input span3">
						<i class="icon-file fileupload-exists"></i> 
						<span class="fileupload-preview"></span>
					</div>
					<span class="btn btn-file"><span class="fileupload-new">انتخاب فایل</span>
						<span class="fileupload-exists">ویرایش</span>
						<input name="file[]" type="file"/>
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">حذف</a>
				</div>
			</div>
		</div>
		<br>
		<div class="input-append">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input span3">
						<i class="icon-file fileupload-exists"></i> 
						<span class="fileupload-preview"></span>
					</div>
					<span class="btn btn-file"><span class="fileupload-new">انتخاب فایل</span>
						<span class="fileupload-exists">ویرایش</span>
						<input name="file[]" type="file"/>
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">حذف</a>
				</div>
			</div>
		</div>
		<div class="input-append">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input span3">
						<i class="icon-file fileupload-exists"></i> 
						<span class="fileupload-preview"></span>
					</div>
					<span class="btn btn-file"><span class="fileupload-new">انتخاب فایل</span>
						<span class="fileupload-exists">ویرایش</span>
						<input name="file[]" type="file"/>
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">حذف</a>
				</div>
			</div>
		</div>
		<br>
		<div class="input-append">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input span3">
						<i class="icon-file fileupload-exists"></i> 
						<span class="fileupload-preview"></span>
					</div>
					<span class="btn btn-file"><span class="fileupload-new">انتخاب فایل</span>
						<span class="fileupload-exists">ویرایش</span>
						<input name="file[]" type="file"/>
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">حذف</a>
				</div>
			</div>
		</div>
		<div class="input-append">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input span3">
						<i class="icon-file fileupload-exists"></i> 
						<span class="fileupload-preview"></span>
					</div>
					<span class="btn btn-file"><span class="fileupload-new">انتخاب فایل</span>
						<span class="fileupload-exists">ویرایش</span>
						<input name="file[]" type="file"/>
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">حذف</a>
				</div>
			</div>
		</div>
		<br>
		<div class="input-append">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input span3">
						<i class="icon-file fileupload-exists"></i> 
						<span class="fileupload-preview"></span>
					</div>
					<span class="btn btn-file"><span class="fileupload-new">انتخاب فایل</span>
						<span class="fileupload-exists">ویرایش</span>
						<input name="file[]" type="file"/>
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">حذف</a>
				</div>
			</div>
		</div>
		<div class="input-append">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input span3">
						<i class="icon-file fileupload-exists"></i> 
						<span class="fileupload-preview"></span>
					</div>
					<span class="btn btn-file"><span class="fileupload-new">انتخاب فایل</span>
						<span class="fileupload-exists">ویرایش</span>
						<input name="file[]" type="file"/>
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">حذف</a>
				</div>
			</div>
		</div>
		<br>
		<div class="input-append">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input span3">
						<i class="icon-file fileupload-exists"></i> 
						<span class="fileupload-preview"></span>
					</div>
					<span class="btn btn-file"><span class="fileupload-new">انتخاب فایل</span>
						<span class="fileupload-exists">ویرایش</span>
						<input name="file[]" type="file"/>
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">حذف</a>
				</div>
			</div>
		</div>
		<div class="input-append">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input span3">
						<i class="icon-file fileupload-exists"></i> 
						<span class="fileupload-preview"></span>
					</div>
					<span class="btn btn-file"><span class="fileupload-new">انتخاب فایل</span>
						<span class="fileupload-exists">ویرایش</span>
						<input name="file[]" type="file"/>
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">حذف</a>
				</div>
			</div>
		</div>
		<br>
		<div class="input-append">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input span3">
						<i class="icon-file fileupload-exists"></i> 
						<span class="fileupload-preview"></span>
					</div>
					<span class="btn btn-file"><span class="fileupload-new">انتخاب فایل</span>
						<span class="fileupload-exists">ویرایش</span>
						<input name="file[]" type="file"/>
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">حذف</a>
				</div>
			</div>
		</div>
		<div class="input-append">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input span3">
						<i class="icon-file fileupload-exists"></i> 
						<span class="fileupload-preview"></span>
					</div>
					<span class="btn btn-file"><span class="fileupload-new">انتخاب فایل</span>
						<span class="fileupload-exists">ویرایش</span>
						<input name="file[]" type="file"/>
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">حذف</a>
				</div>
			</div>
		</div>
		<br>
		<div class="input-append">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input span3">
						<i class="icon-file fileupload-exists"></i> 
						<span class="fileupload-preview"></span>
					</div>
					<span class="btn btn-file"><span class="fileupload-new">انتخاب فایل</span>
						<span class="fileupload-exists">ویرایش</span>
						<input name="file[]" type="file"/>
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">حذف</a>
				</div>
			</div>
		</div>
		<div class="input-append">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input span3">
						<i class="icon-file fileupload-exists"></i> 
						<span class="fileupload-preview"></span>
					</div>
					<span class="btn btn-file"><span class="fileupload-new">انتخاب فایل</span>
						<span class="fileupload-exists">ویرایش</span>
						<input name="file[]" type="file"/>
					</span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">حذف</a>
				</div>
			</div>
		</div>
		<br>
		<!-- Submit Button -->
		<button name="submit" type="submit" class="btn btn-large btn-primary">درج اطلاعات</button>
	</div>
</form>

<?php require_once(BASEDIR."footer.php"); ?>