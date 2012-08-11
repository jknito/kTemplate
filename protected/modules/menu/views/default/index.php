<STYLE TYPE="text/css">
.revoke, .revoke:hover{
	background-color: green;
	color: green;
}
.assign, .assign:hover{
	background-color: red;
	color: red;
}
.wait, .wait:hover{
	background-color: blue;
	color: blue;
}
</STYLE>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'permisos-menu-grid',
	'dataProvider'=>$data,
	'itemsCssClass'=>'table table-bordered table-striped table-condensed',
	'columns'=>$columns
	));
?>
<SCRIPT TYPE="text/javascript">
$(document).ready(function() {
    $('a[type="menu"]').click( function(){
    	if("wait"==$(this).attr('class')){
    		alert('Se esta actualizando');
    		return false;
    	}
    	var accion = $(this).attr('class');
    	$(this).attr('class','wait');
    	//alert("<?php echo url('/menu/default/process')?>");
    	$.ajax({
    		cache: false,
    		type: "post",
    		dataType: "script",
    		data: { menu: $(this).attr('menu'), rol: $(this).attr('rol'), action: accion },
    		url: "<?php echo url('/menu/default/process')?>",
    	});
    });
});
</SCRIPT>