<!-- start footer -->
<div id="footer">
  <!--  start footer-left -->
  <div id="footer-left"> Page rendered in <?php echo round(microtime(true) - $_SERVER['REQUEST_TIME'], 4) ; ?> seconds.<br />
    Copyright  &copy;
    <?= date('Y'); ?>
    <?= SITE_TITLE_ADMIN; ?>
    . All rights reserved.</div>
  <!--  end footer-left -->
  <div class="clear">&nbsp;</div>
</div>
<!-- end footer -->
<!--  checkbox styling script -->
<script src="<?php echo DEFAULT_ADMIN_URL; ?>/js/jquery/ui.core.js" type="text/javascript"></script>
<!--  styled select box script version 3 -->
<script src="<?php echo DEFAULT_ADMIN_URL; ?>/js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>
<!-- Custom jquery scripts -->
<script src="<?php echo DEFAULT_ADMIN_URL; ?>/js/jquery/custom_jquery.js" type="text/javascript"></script>
<!-- Tooltips -->
<script src="<?php echo DEFAULT_ADMIN_URL; ?>/js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="<?php echo DEFAULT_ADMIN_URL; ?>/js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script>
<!--  date picker script -->
<script src="<?php echo DEFAULT_ADMIN_URL; ?>/js/jquery/date.js" type="text/javascript"></script>
<script src="<?php echo DEFAULT_ADMIN_URL; ?>/js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2012',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>
<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?php echo DEFAULT_ADMIN_URL; ?>/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
<script type="text/javascript" src="<?php echo DEFAULT_ADMIN_URL; ?>/js/jquery/jquery.tablesorter.js"></script>
<script type="text/javascript">
function sendSearch(){
	if($('#searchcombo').val()=='pages'){
			$('#searchform').attr('action', '<?php echo DEFAULT_ADMIN_URL.'/page/index.php';?>');
			$('#searchform').submit();
	}

}

</script>

</body></html><?php ob_end_flush(); ?>