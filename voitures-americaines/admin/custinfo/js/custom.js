var previous;
var allreadySelected = [];

jQuery(document).ready(function(){
  var i=0;
  //disable option on onload
  jQuery('.status_assign_class').each(function(){
    if(jQuery(this).val() != 0){
      allreadySelected[i] = jQuery(this).val();
      i++;
    }    
  });
  
  for(i=0; i< allreadySelected.length; i++){
     jQuery('.status_assign_class').each(function(){
	if(jQuery(this).val() != allreadySelected[i]){
	  $("#"+ $(this).attr('id') +" option[value=" + allreadySelected[i] + "]").attr('disabled','disabled');	 
	}    
     });
  }
  
  //to save the current value of the select dropdown
  jQuery(".status_assign_class").focus(function () {
    // Store the current value on focus and on change
    previous = jQuery(this).val();
  });

  jQuery('.status_assign_class').change(function(){
      $(".status_assign_class option[value=" + $(this).val() + "]").attr('disabled','disabled');
      $(".status_assign_class option[value=" + previous + "]").removeAttr('disabled');
      $("#"+ $(this).attr('id') +" option[value=" + $(this).val() + "]").removeAttr('disabled');
      $(".status_assign_class option[value=0]").removeAttr('disabled');
  });

  
  
});