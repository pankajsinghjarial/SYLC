<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo SITE_TITLE_ADMIN; ?></title>
<link rel="stylesheet" href="<?php echo DEFAULT_ADMIN_URL; ?>/css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="<?php echo DEFAULT_ADMIN_URL; ?>/css/pro_dropline_ie.css" />
<![endif]-->
<link rel="stylesheet" href="<?php echo DEFAULT_ADMIN_URL; ?>/css/datePicker.css" type="text/css" />
<!--  jquery core -->
<link rel="stylesheet" href="<?php echo DEFAULT_ADMIN_URL; ?>/css/tabs.css" type="text/css" />
<script src="<?php echo DEFAULT_ADMIN_URL; ?>/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<![if !IE 7]>
<!--  styled select box script version 1 -->
<script src="<?php echo DEFAULT_ADMIN_URL; ?>/js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>

<![endif]>

</head>
<?php flush(); ?>
<body>
<!-- Start: page-top-outer -->
<div id="page-top-outer">
  <!-- Start: page-top -->
  <div id="page-top">
    <!-- start logo -->
    <div id="logo"> <a href="<?php echo DEFAULT_ADMIN_URL; ?>/index.php"><img src="<?php echo ADMIN_IMAGE_URL; ?>/shared/logo.png"  alt="" /></a> </div>
    <!-- end logo -->
    <!--  start top-search -->
    <?php /*?><div id="top-search">
    <form method="get" action="#" name="searchform" id="searchform">
      <table border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><input type="text" name="searchtext" id="searchtext" value="Search" onblur="if (this.value=='') { this.value='Search'; }" onfocus="if (this.value=='Search') { this.value=''; }" class="top-search-inp" /></td>
          <td><select class="styledselect" name="searchcombo" id="searchcombo">
              <option value="pages">Pages</option>
              <option value="car">Cars</option>
            </select>
          </td>
          <td><img src="<?php echo ADMIN_IMAGE_URL; ?>/shared/top_search_btn.gif"  onclick="sendSearch()" width="65" height="29"/>
          </td>
        </tr>
      </table>
      </form>
    </div><?php */?>
    <!--  end top-search -->
    <div class="clear"></div>
  </div>
  <!-- End: page-top -->
</div>
<!-- End: page-top-outer -->
<div class="clear">&nbsp;</div>
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat">
  <!--  start nav-outer -->
  <div class="nav-outer">
    <!-- start nav-right -->
    <div id="nav-right">
      <div class="nav-divider">&nbsp;</div>
      <div class="showhide-account"><img src="<?php echo ADMIN_IMAGE_URL; ?>/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div>
      <div class="nav-divider">&nbsp;</div>
      <?php if($_SESSION['userName']!=''){ ?>
      <a href="<?=DEFAULT_ADMIN_URL?>/login/logout.php" id="logout"><img src="<?php echo ADMIN_IMAGE_URL; ?>/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
      <? }?>
      <div class="clear">&nbsp;</div>
      <!--  start account-content -->
      <div class="account-content">
        <div class="account-drop-inner"> 
        	<a href="<?php echo DEFAULT_ADMIN_URL; ?>/settings/preferences.php" id="acc-settings">Settings</a>
          <div class="clear">&nbsp;</div>
          <div class="acc-line">&nbsp;</div>
          <a href="<?php echo DEFAULT_ADMIN_URL; ?>/settings/index.php" id="acc-details">Personal details </a>
          <div class="clear">&nbsp;</div>
          <div class="acc-line">&nbsp;</div>
          <a href="<?php echo DEFAULT_ADMIN_URL; ?>/currency/index.php" id="acc-details">Currency Exchange</a>
          <div class="clear">&nbsp;</div>
          </div>
      </div>
      <!--  end account-content -->
    </div>
    <!-- end nav-right -->
    <!--  start nav -->
    <div class="nav">
      <div class="table">
        <ul class="select<?php if(strpos($_SERVER['REQUEST_URI'],'dashboard')!==false){?> current<?php } ?>">
          <li> <a href="<?= DEFAULT_ADMIN_URL; ?>/dashboard/index.php"> <b>Dashboard</b></a>
            <!--[if IE 7]><!--></a><!--<![endif]-->
            <!--[if lte IE 6]><table><tr><td><![endif]-->
            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
          </li>
        </ul>
        <div class="nav-divider">&nbsp;</div>
        <ul class="select<?php  if(strpos(array_shift(explode('?', $_SERVER['REQUEST_URI'])),'page')!==false){?> current<?php } ?>" >
          <li><a href="#nogo"><b>Page Manager</b></a>
            <!--[if IE 7]><!--></a><!--<![endif]-->
            <!--[if lte IE 6]><table><tr><td><![endif]-->
            <div class="select_sub show">
              <ul class="sub">
                <li <?php  if(strpos($_SERVER['REQUEST_URI'],'page')!==false && basename($_SERVER['REQUEST_URI'])=='index.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/page/index.php" >View all Pages</a></li>
                <li <?php  if(strpos($_SERVER['REQUEST_URI'],'page')!==false && basename($_SERVER['REQUEST_URI'])=='add.php'){?>class="sub_show"<?php } ?> ><a href="<?=DEFAULT_ADMIN_URL?>/page/add.php">Add New Page</a></li>
              </ul>
            </div>
            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
          </li>
        </ul>
        <div class="nav-divider">&nbsp;</div>
        <ul class="select<?php  if(strpos($_SERVER['REQUEST_URI'],'car')!==false){?> current<?php } ?>">
          <li><a href="#nogo" ><b>Cars</b></a>
            <!--[if IE 7]><!--></a><!--<![endif]-->
            <!--[if lte IE 6]><table><tr><td><![endif]-->
            <div class="select_sub show">
              <ul class="sub">
                <li <?php  if(strpos($_SERVER['REQUEST_URI'],'car')!==false && array_shift(explode('?', basename($_SERVER['REQUEST_URI']))) =='index.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/car/index.php">View All Cars</a></li>
                <li <?php  if(strpos($_SERVER['REQUEST_URI'],'car')!==false && array_shift(explode('?', basename($_SERVER['REQUEST_URI']))) =='add.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/car/add.php">Add New Car</a></li>
                <li <?php  if(strpos($_SERVER['REQUEST_URI'],'car')!==false && array_shift(explode('?', basename($_SERVER['REQUEST_URI']))) =='from_ebay.php'){?>class="sub_show"<?php } ?>> <a href="<?=DEFAULT_ADMIN_URL?>/car/from_ebay.php">From Ebay.com</a></li>
                <li <?php  if(strpos($_SERVER['REQUEST_URI'],'car')!==false && array_shift(explode('?', basename($_SERVER['REQUEST_URI']))) =='import.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/car/import.php">Import Car</a></li>
                <li <?php  if(strpos($_SERVER['REQUEST_URI'],'car')!==false && array_shift(explode('?', basename($_SERVER['REQUEST_URI']))) =='from.php' && $_REQUEST['car'] == 72){?>class="sub_show"<?php } ?>> <a href="<?=DEFAULT_ADMIN_URL?>/car/from.php?car=72">From Cars.com</a></li>
                <li <?php  if(strpos($_SERVER['REQUEST_URI'],'car')!==false && array_shift(explode('?', basename($_SERVER['REQUEST_URI']))) =='from.php' && $_REQUEST['car'] == 73){?>class="sub_show"<?php } ?>> <a href="<?=DEFAULT_ADMIN_URL?>/car/from.php?car=73">From AutoTrader.com</a> </li>
                <li <?php  if(strpos($_SERVER['REQUEST_URI'],'car')!==false && array_shift(explode('?', basename($_SERVER['REQUEST_URI']))) =='feature.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/car/feature.php">Featured Cars</a> </li>
                <li <?php  if(strpos($_SERVER['REQUEST_URI'],'car')!==false && array_shift(explode('?', basename($_SERVER['REQUEST_URI']))) =='popular.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/car/popular.php">Popular Cars</a> </li>
              </ul>
            </div>
            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
          </li>
        </ul>
        
         <div class="nav-divider">&nbsp;</div>
        <ul class="select<?php  if(strpos($_SERVER['REQUEST_URI'],'contact')!==false){?> current<?php } ?>">
          <li><a href="#nogo" ><b>Lead Manager</b></a>
          <div class="select_sub show">
              <ul class="sub">
                <li <?php  if(strpos($_SERVER['REQUEST_URI'],'contact')!==false && strpos($_SERVER['REQUEST_URI'],'general') !==false  && basename($_SERVER['REQUEST_URI'])=='index.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/contact/general/index.php">General Enquiry</a></li>
                <li <?php  if(strpos($_SERVER['REQUEST_URI'],'contact')!==false && strpos($_SERVER['REQUEST_URI'],'car') !==false  && basename($_SERVER['REQUEST_URI'])=='index.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/contact/car/index.php">Cars Enquiry</a></li>
                 <li <?php  if(strpos($_SERVER['REQUEST_URI'],'contact')!==false && strpos($_SERVER['REQUEST_URI'],'consult') !==false  && basename($_SERVER['REQUEST_URI'])=='index.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/contact/consult/index.php">Consult Specialist Enquiry</a></li>
                 <li <?php  if(strpos($_SERVER['REQUEST_URI'],'contact')!==false && strpos($_SERVER['REQUEST_URI'],'log') !==false  && basename($_SERVER['REQUEST_URI'])=='index.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/contact/log/index.php">Email Log</a></li>
                
              </ul>
            </div>
            <!--[if IE 7]><!--></a><!--<![endif]-->
            <!--[if lte IE 6]><table><tr><td><![endif]-->
            
            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
          </li>
        </ul>
        <div class="nav-divider">&nbsp;</div>
        <ul class="select<?php  if(strpos($_SERVER['REQUEST_URI'],'banner')!==false){?> current<?php } ?>">
          <li><a href="#nogo" ><b>Banner Manager</b></a>
            <!--[if IE 7]><!--></a><!--<![endif]-->
            <!--[if lte IE 6]><table><tr><td><![endif]-->
            <div class="select_sub show">
              <ul class="sub">
                <li <?php  if(strpos($_SERVER['REQUEST_URI'],'banner')!==false && basename($_SERVER['REQUEST_URI'])=='index.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/banner/index.php">View All Banner</a></li>
                <li <?php  if(strpos($_SERVER['REQUEST_URI'],'banner')!==false && basename($_SERVER['REQUEST_URI'])=='add.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/banner/add.php">Add New Banner</a></li>
                
              </ul>
            </div>
            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
          </li>
        </ul>
        
         <div class="nav-divider">&nbsp;</div>
         <ul class="select<?php  if(strpos($_SERVER['REQUEST_URI'],'faq')!==false){?> current<?php } ?>">
          <li><a href="#nogo" ><b>FAQ Manager</b></a>
            <!--[if IE 7]><!--></a><!--<![endif]-->
            <!--[if lte IE 6]><table><tr><td><![endif]-->
            <div class="select_sub show">
              <ul class="sub">
                <li <?php  if(strpos($_SERVER['REQUEST_URI'],'faq')!==false && basename($_SERVER['REQUEST_URI'])=='index.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/faq/index.php">View All FAQ</a></li>
                <li <?php  if(strpos($_SERVER['REQUEST_URI'],'faq')!==false && basename($_SERVER['REQUEST_URI'])=='add.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/faq/add.php">Add New FAQ</a></li>
                
              </ul>
            </div>
            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
          </li>
        </ul>
        
        
         <div class="nav-divider">&nbsp;</div>
         <ul class="select<?php  if(strpos($_SERVER['REQUEST_URI'],'new_stock')!==false){?> current<?php } ?>">
          <li><a href="#nogo" ><b>Stock Manger</b></a>
            <!--[if IE 7]><!--></a><!--<![endif]-->
            <!--[if lte IE 6]><table><tr><td><![endif]-->
            <div class="select_sub show">
              <ul class="sub">
                <li <?php  if(strpos($_SERVER['REQUEST_URI'],'new_stock')!==false && strpos($_SERVER['REQUEST_URI'],'brands') !==false  && basename($_SERVER['REQUEST_URI'])=='index.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/new_stock/brands/index.php">Brand Manger</a></li>
                <li <?php  if(strpos($_SERVER['REQUEST_URI'],'new_stock')!==false && strpos($_SERVER['REQUEST_URI'],'new_car') !==false && basename($_SERVER['REQUEST_URI'])=='index.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/new_stock/new_car/index.php">Add New Car</a></li>
                
              </ul>
            </div>
            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
          </li>
        </ul>
        
        
<div class="nav-divider">&nbsp;</div>
         <ul class="select<?php  if(strpos($_SERVER['REQUEST_URI'],'template')!==false){?> current<?php } ?>">
          <li><a href="#nogo" ><b>Template Manger</b></a>
            <!--[if IE 7]><!--></a><!--<![endif]-->
            <!--[if lte IE 6]><table><tr><td><![endif]-->
            <div class="select_sub show">
              <ul class="sub">
                <li <?php  if(strpos($_SERVER['REQUEST_URI'],'template')!==false && strpos($_SERVER['REQUEST_URI'],'reminder') !==false  && basename($_SERVER['REQUEST_URI'])=='index.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/template/reminder/index.php">Reminder Template</a></li>
                <li <?php  if(strpos($_SERVER['REQUEST_URI'],'template')!==false && strpos($_SERVER['REQUEST_URI'],'thanks') !==false && basename($_SERVER['REQUEST_URI'])=='index.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/template/thanks/index.php">Thanks Template</a></li>
               <li <?php  if(strpos($_SERVER['REQUEST_URI'],'template')!==false && strpos($_SERVER['REQUEST_URI'],'templat1') !==false && basename($_SERVER['REQUEST_URI'])=='index.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/template/templat1/index.php">Template 1</a></li>
               <li <?php  if(strpos($_SERVER['REQUEST_URI'],'template')!==false && strpos($_SERVER['REQUEST_URI'],'templat2') !==false && basename($_SERVER['REQUEST_URI'])=='index.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/template/templat2/index.php">Template 2</a></li>
               <li <?php  if(strpos($_SERVER['REQUEST_URI'],'template')!==false && strpos($_SERVER['REQUEST_URI'],'templat3') !==false && basename($_SERVER['REQUEST_URI'])=='index.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/template/templat3/index.php">Template 3</a></li>
                
              </ul>
            </div>
            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
          </li>
        </ul>
        
        <?php /*?><div class="nav-divider">&nbsp;</div>
        <ul class="select<?php  if(strpos($_SERVER['REQUEST_URI'],'attributes')!==false){?> current<?php } ?>">
          <li><a href="#nogo" ><b>Car Attributes</b></a>
            <!--[if IE 7]><!--></a><!--<![endif]-->
            <!--[if lte IE 6]><table><tr><td><![endif]-->
            <div class="select_sub show">
              <ul class="sub">
                <li <?php  if(strpos($_SERVER['REQUEST_URI'],'attributes')!==false && basename($_SERVER['REQUEST_URI'])=='index.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/attributes/index.php#nogo">View All Attributes</a></li>
                <li <?php  if(strpos($_SERVER['REQUEST_URI'],'attributes')!==false && basename($_SERVER['REQUEST_URI'])=='add.php'){?>class="sub_show"<?php } ?>><a href="<?=DEFAULT_ADMIN_URL?>/attributes/add.php">Add New Attribute</a></li>
              </ul>
            </div>
            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
          </li>
        </ul>
        <div class="nav-divider">&nbsp;</div>
        <ul class="select">
          <li><a href="#nogo" ><b>Dealer</b></a>
            <!--[if IE 7]><!--></a><!--<![endif]-->
            <!--[if lte IE 6]><table><tr><td><![endif]-->
            <div class="select_sub">
              <ul class="sub">
                <li><a href="#nogo">View All Dealer</a></li>
                <li><a href="#nogo">Add New Dealer</a></li>
              </ul>
            </div>
            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
          </li>
        </ul><?php */?>
        
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
    <!--  start nav -->
  </div>
  <div class="clear"></div>
  <!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->
<div class="clear"></div>
