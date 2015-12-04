<div class="mobile_table">
        
        <div class="mobile_left"> 
        <select id='sorting_order_id' onchange="submitform('1','0');"> 
        <option value="Name" >Name</option>
        <option value="First name">First name</option>
        <option value="Email">Email</option>
        <option value="Phone">Phone</option>
        <option value="Car Brand">Car Brand</option>
        <option value="Model">Model</option>
        <option value="Year">Year</option>
        <option value="Service">Service</option>
        <option value="Date">Date</option>
        </select></div>
        
        <div class="mobile_right">Sort
       <div class="txt1" style="display: none;"> <input type="button"  onclick="submitform_des('0','1'); changeasc();" value="test" class="ac_order"></div> 
       <div class="txt2"> <input type="button"  onclick="submitform_des('0','1'); changedesc();" value="test" class="dc_order"></div> 
        </div>
      
        </div>
        <script type="text/javascript" charset="utf-8">
        function changeasc(){
         //   alert('hiii');
            jQuery('.txt1').hide();
            jQuery('.txt2').show();
        }
        function changedesc(){
           // alert('byee');
            jQuery('.txt2').hide();
            jQuery('.txt1').show();
            }
        </script>
        
        
        <script type="text/javascript" charset="utf-8">
       
        function submitform(x,y){
        	 jQuery('.txt1').hide();
             jQuery('.txt2').show();
          //  alert(jQuery('#sorting_order_id').val());
			if(jQuery('#sorting_order_id').val() == 'Name'){
				jQuery('#example th:nth-child(1)').click();
				
			}
			if(jQuery('#sorting_order_id').val() == 'First name'){
				jQuery('#example th:nth-child(2)').click();
				
			}
			if(jQuery('#sorting_order_id').val() == 'Email'){
				jQuery('#example th:nth-child(3)').click();
				
			}
			if(jQuery('#sorting_order_id').val() == 'Phone'){
				jQuery('#example th:nth-child(4)').click();
				
			}
			if(jQuery('#sorting_order_id').val() == 'Car Brand'){
				jQuery('#example th:nth-child(5)').click();
				
			}
			if(jQuery('#sorting_order_id').val() == 'Model'){
				jQuery('#example th:nth-child(6)').click();
				
			}
			if(jQuery('#sorting_order_id').val() == 'Year'){
				jQuery('#example th:nth-child(7)').click();
				
			}
			if(jQuery('#sorting_order_id').val() == 'Service'){
				jQuery('#example th:nth-child(8)').click();
				
			}
			if(jQuery('#sorting_order_id').val() == 'Date'){
				jQuery('#example th:nth-child(9)').click();
				
			}
        	
	
	    }


        function submitform_des(x,y){
            //  alert(jQuery('#sorting_order_id').val());
  			if(jQuery('#sorting_order_id').val() == 'Name'){
  				jQuery('#example th:nth-child(1)').click();
  				
  			}
  			if(jQuery('#sorting_order_id').val() == 'First name'){
  				jQuery('#example th:nth-child(2)').click();
  				
  			}
  			if(jQuery('#sorting_order_id').val() == 'Email'){
  				jQuery('#example th:nth-child(3)').click();
  				
  			}
  			if(jQuery('#sorting_order_id').val() == 'Phone'){
  				jQuery('#example th:nth-child(4)').click();
  				
  			}
  			if(jQuery('#sorting_order_id').val() == 'Car Brand'){
  				jQuery('#example th:nth-child(5)').click();
  				
  			}
  			if(jQuery('#sorting_order_id').val() == 'Model'){
  				jQuery('#example th:nth-child(6)').click();
  				
  			}
  			if(jQuery('#sorting_order_id').val() == 'Year'){
  				jQuery('#example th:nth-child(7)').click();
  				
  			}
  			if(jQuery('#sorting_order_id').val() == 'Service'){
  				jQuery('#example th:nth-child(8)').click();
  				
  			}
  			if(jQuery('#sorting_order_id').val() == 'Date'){
  				jQuery('#example th:nth-child(9)').click();
  				
  			}
          	
  	
  	    }

		
		</script>