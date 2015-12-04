<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE_AFL.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    design
 * @package     base_default
 * @copyright   Copyright (c) 2010 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Product view template
 *
 * @see Mage_Catalog_Block_Product_View
 * @see Mage_Review_Block_Product_View
 */
?>   <?php $_helper = $this->helper('catalog/output'); ?>
<?php $_product = $this->getProduct(); ?>
<?php if($_product->getId()==18) { ?>
<?php $_helper = $this->helper('catalog/output'); ?>
<?php $_product = $this->getProduct(); ?>
<script type="text/javascript">
    var optionsPrice = new Product.OptionsPrice(<?php echo $this->getJsonConfig() ?>);
</script>

<div id="messages_product_view"><?php echo $this->getMessagesBlock()->getGroupedHtml() ?></div>

<div class="content_indent2 content_style">
<form action="<?php echo $this->getSubmitUrl($_product) ?>" method="post" id="product_addtocart_form"<?php if($_product->getOptions()): ?> enctype="multipart/form-data"<?php endif; ?>>
<div class="no-display">
            <input type="hidden" name="product" value="<?php echo $_product->getId() ?>" />
            <input type="hidden" name="related_product" id="related-products-field" value="" />
        </div>
        <h1> <?php echo $_helper->productAttribute($_product, $_product->getName(), 'name') ?> </h1>
        <div class="pro_outer">
          <div class="pro_left">
          <?php echo $this->getChildHtml('media') ?>
            
          </div>
          <div class="pro_right">
            <div class="pro_info">
              <div class="proinfo_indent">
              
                <?php if ($_product->isSaleable() && $this->hasOptions()):?>
            <?php echo $this->getChildChildHtml('container2', '', true, true) ?>
        <?php endif;?>
              </div>
              <div class="divider2"></div>
              <div class="proinfo_indent" style="padding-bottom:0">
                <div class="price_col2">Price: <strong><img src="<?php echo $this->getSkinUrl('images/price_tag.jpg'); ?>"  alt="price" /> <?php echo $this->getPriceHtml($_product) ?></strong></div>
                 <?php if($_product->isSaleable()): ?>
                        <?php echo $this->getChildHtml('addtocart') ?>
                    <?php endif; ?>
                
              </div>
            </div>
            <div class="share">
            <!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=xa-4ec62300485ab740" class="addthis_button_compact">Share</a>
<span class="addthis_separator">|</span>
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4ec62300485ab740"></script>
<!-- AddThis Button END -->
             <?php /*?> <ul>
                <li><a href="#"><img src="<?php echo $this->getSkinUrl('images/share.jpg'); ?>" alt="share" /></a></li>
                <li><a href="#"><img src="<?php echo $this->getSkinUrl('images/mail.jpg'); ?>" alt="mail" /></a></li>
                <li><a href="#"><img src="<?php echo $this->getSkinUrl('images/print.jpg'); ?>" alt="print" /></a></li>
                <li><a href="#"><img src="<?php echo $this->getSkinUrl('images/fb.jpg'); ?>" alt="facebook" /></a></li>
                <li><a href="#"><img src="<?php echo $this->getSkinUrl('images/twitter2.jpg'); ?>" alt="twitter" /></a></li>
              </ul><?php */?>
            </div>
            <div class="quick_overreview">
              <h4>Quick Overview</h4>
              <p><?php echo $_helper->productAttribute($_product, nl2br($_product->getShortDescription()), 'short_description') ?></p>
            </div>
          </div>
        </div>
      
       
        </form>
    <script type="text/javascript">
    //<![CDATA[
        var productAddToCartForm = new VarienForm('product_addtocart_form');
        productAddToCartForm.submit = function(button, url) {
            if (this.validator.validate()) {
                var form = this.form;
                var oldUrl = form.action;

                if (url) {
                   form.action = url;
                }
                var e = null;
                try {
                    this.form.submit();
                } catch (e) {
                }
                this.form.action = oldUrl;
                if (e) {
                    throw e;
                }

                if (button && button != 'undefined') {
                    button.disabled = true;
                }
            }
        }.bind(productAddToCartForm);

        productAddToCartForm.submitLight = function(button, url){
            if(this.validator) {
                var nv = Validation.methods;
                delete Validation.methods['required-entry'];
                delete Validation.methods['validate-one-required'];
                delete Validation.methods['validate-one-required-by-name'];
                if (this.validator.validate()) {
                    if (url) {
                        this.form.action = url;
                    }
                    this.form.submit();
                }
                Object.extend(Validation.methods, nv);
            }
        }.bind(productAddToCartForm);
    //]]>
    </script>
    
    

        <?php //echo $this->getChildHtml('upsell_products') ?>
        <?php //echo $this->getChildHtml('product_additional_data') ?>
    
      </div>
      
       <div class="tabs_outer">
          <ul id="tabs">
            <li><a href="#pro_info">Product info</a></li>
            <li><a href="#related_products">Related Products</a></li>
            <li><a href="#read_review">Read Reviews</a></li>
            <li class="active"><a href="#write_review">Write a review</a></li>
          </ul>
        </div>
        <div class="tabs_content" id="pro_info">
<?php echo $_helper->productAttribute($_product, nl2br($_product->getDescription()), 'description') ?>


        </div>
        <div class="tabs_content" id="related_products">
          <?php echo $this->getChildHtml('upsell_products') ?>
        </div>
        
        <div class="tabs_content" id="read_review">
         
	

          <?php echo $this->getChildHtml('product_reviewlist') ?>
          
        </div>
        
        <div class="tabs_content" id="write_review">
          <?php echo $this->getChildHtml('product_review') ?>
          
        </div>
 <?php 
	 } 
	 else { 
	 
 ?>   
     <?php $_helper = $this->helper('catalog/output'); ?>
<?php $_product = $this->getProduct(); ?>
<script type="text/javascript">
    var optionsPrice = new Product.OptionsPrice(<?php echo $this->getJsonConfig() ?>);
</script>

<div id="messages_product_view"><?php echo $this->getMessagesBlock()->getGroupedHtml() ?></div>

<div class="content_indent2 content_style">
<form action="<?php echo $this->getSubmitUrl($_product) ?>" method="post" id="product_addtocart_form"<?php if($_product->getOptions()): ?> enctype="multipart/form-data"<?php endif; ?>>
<div class="no-display">
            <input type="hidden" name="product" value="<?php echo $_product->getId() ?>" />
            <input type="hidden" name="related_product" id="related-products-field" value="" />
        </div>
        <h1> <?php echo $_helper->productAttribute($_product, $_product->getName(), 'name') ?> </h1>
        <div class="pro_outer">
          <div class="pro_left">
          <?php echo $this->getChildHtml('media') ?>
            
          </div>
          <div class="pro_right">
            <div class="pro_info">
              <div class="proinfo_indent">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="34%" align="left" valign="middle">Brand Name</td>
                    <td width="66%" align="left" valign="middle">:  <?php echo $_product->getAttributeText('manufacturer')?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">Product Code</td>
                    <td align="left" valign="middle">:  <?php echo nl2br($_product->getSku()) ?> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">Rating Points</td>
                    <td align="left" valign="middle"><div style="width:auto; padding-right:2px; float:left;">:</div> <div style="width:auto; float:left;"> <?php echo $this->getReviewsSummaryHtml($_product, false, true)?></div></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">Availability</td>
                    <td align="left" valign="middle">:  <?php if ($_product->isAvailable()): ?>
    <?php echo $this->__('In Stock') ?>
<?php else: ?>
    <?php echo $this->__('Out of Stock') ?>
<?php endif; ?></td>
                  </tr>
                  
                </table>
              </div>
              <div class="divider2"></div>
              <div class="proinfo_indent" style="padding-bottom:0">
                <div class="price_col2">Price: <strong><img src="<?php echo $this->getSkinUrl('images/price_tag.jpg'); ?>"  alt="price" /> <?php echo $this->getPriceHtml($_product) ?></strong></div>
                 <?php if($_product->isSaleable()): ?>
                        <?php echo $this->getChildHtml('addtocart') ?>
                    <?php endif; ?>
                
              </div>
            </div>
            <div class="share">
            <!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=xa-4ec62300485ab740" class="addthis_button_compact">Share</a>
<span class="addthis_separator">|</span>
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4ec62300485ab740"></script>
<!-- AddThis Button END -->
             <?php /*?> <ul>
                <li><a href="#"><img src="<?php echo $this->getSkinUrl('images/share.jpg'); ?>" alt="share" /></a></li>
                <li><a href="#"><img src="<?php echo $this->getSkinUrl('images/mail.jpg'); ?>" alt="mail" /></a></li>
                <li><a href="#"><img src="<?php echo $this->getSkinUrl('images/print.jpg'); ?>" alt="print" /></a></li>
                <li><a href="#"><img src="<?php echo $this->getSkinUrl('images/fb.jpg'); ?>" alt="facebook" /></a></li>
                <li><a href="#"><img src="<?php echo $this->getSkinUrl('images/twitter2.jpg'); ?>" alt="twitter" /></a></li>
              </ul><?php */?>
            </div>
            <div class="quick_overreview">
              <h4>Quick Overview</h4>
              <p><?php echo $_helper->productAttribute($_product, nl2br($_product->getShortDescription()), 'short_description') ?></p>
            </div>
          </div>
        </div>
       
        </form>
    <script type="text/javascript">
    //<![CDATA[
        var productAddToCartForm = new VarienForm('product_addtocart_form');
        productAddToCartForm.submit = function(button, url) {
            if (this.validator.validate()) {
                var form = this.form;
                var oldUrl = form.action;

                if (url) {
                   form.action = url;
                }
                var e = null;
                try {
                    this.form.submit();
                } catch (e) {
                }
                this.form.action = oldUrl;
                if (e) {
                    throw e;
                }

                if (button && button != 'undefined') {
                    button.disabled = true;
                }
            }
        }.bind(productAddToCartForm);

        productAddToCartForm.submitLight = function(button, url){
            if(this.validator) {
                var nv = Validation.methods;
                delete Validation.methods['required-entry'];
                delete Validation.methods['validate-one-required'];
                delete Validation.methods['validate-one-required-by-name'];
                if (this.validator.validate()) {
                    if (url) {
                        this.form.action = url;
                    }
                    this.form.submit();
                }
                Object.extend(Validation.methods, nv);
            }
        }.bind(productAddToCartForm);
    //]]>
    </script>
    
    

        <?php //echo $this->getChildHtml('upsell_products') ?>
        <?php //echo $this->getChildHtml('product_additional_data') ?>
    
      </div>
      
       <div class="tabs_outer">
          <ul id="tabs">
            <li><a href="#pro_info">Product info</a></li>
            <li><a href="#related_products">Related Products</a></li>
            <li><a href="#read_review">Read Reviews</a></li>
            <li class="active"><a href="#write_review">Write a review</a></li>
          </ul>
        </div>
        <div class="tabs_content" id="pro_info">
<?php echo $_helper->productAttribute($_product, nl2br($_product->getDescription()), 'description') ?>


        </div>
        <div class="tabs_content" id="related_products">
          <?php echo $this->getChildHtml('upsell_products') ?>
        </div>
        
        <div class="tabs_content" id="read_review">
         
	

          <?php echo $this->getChildHtml('product_reviewlist') ?>
          
        </div>
        
        <div class="tabs_content" id="write_review">
          <?php echo $this->getChildHtml('product_review') ?>
          
        </div>
        
        <?php }  ?>   