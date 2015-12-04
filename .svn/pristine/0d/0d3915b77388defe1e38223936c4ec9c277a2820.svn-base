<?php
/**
 * Categoryexport.php
 * CommerceThemes @ InterSEC Solutions LLC.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.commercethemes.com/LICENSE-M1.txt
 *
 * @category   Category
 * @package    Categoryexport
 * @copyright  Copyright (c) 2003-2009 CommerceThemes @ InterSEC Solutions LLC. (http://www.commercethemes.com)
 * @license    http://www.commercethemes.com/LICENSE-M1.txt
 */ 
 
class Mage_Catalog_Model_Convert_Parser_Categoryexport extends Mage_Eav_Model_Convert_Parser_Abstract
{
/**
     * @deprecated not used anymore
     */
    public function parse()
    {
			return $this;
		}
 /**
     * Unparse (prepare data) loaded categories
     *
     * @return Mage_Catalog_Model_Convert_Adapter_Categoryexport
     */
    public function unparse()
    {
		
					#$id = 3;
					#$ids = array();
					foreach (Mage::app()->getStores() as $store) {
						$rootId = $store->getRootCategoryId();
						$row['rootid'] = $rootId;
					#echo "ID: " . $rootId;
					/* Load category by id*/
					$categories = Mage::getModel('catalog/category')->getCollection()
    										->addAttributeToFilter(array(array('attribute'=>'parent_id', 'eq'=>$rootId)))//first level from the tree
    										->addAttributeToSelect('*')//or any other attributes you need
    										->setOrder('position'); 
												
						if(count($categories)) {
				    	foreach ($categories as $_categorytop) {
							
							  #echo "CAT ID: " . $_category->getId();
							  $cat = Mage::getModel('catalog/category')->load($_categorytop->getId());
								$row['store'] = strtolower($_categorytop->getStore()->getName());
								$row['categories'] = $_categorytop->getName();
								$row['description'] = $_categorytop->getDescription();
								$row['url_key'] = $_categorytop->getUrlKey();
								$row['is_active'] = $_categorytop->getIsActive();
								$row['meta_title'] = $_categorytop->getMetaTitle();
								$row['url_path'] = $_categorytop->getUrlPath();
								$row['is_anchor'] = $_categorytop->getIsAnchor();
								$row['meta_keywords'] = $_categorytop->getMetaKeywords();
								$row['meta_description'] = $_categorytop->getMetaDescription();
								$row['display_mode'] = $_categorytop->getDisplayMode();
						
								$batchExport = $this->getBatchExportModel()
										->setId(null)
										->setBatchId($this->getBatchModel()->getId())
										->setBatchData($row)
										->setStatus(1)
										->save();
							
					/*Returns comma separated ids*/
					$subcats = $cat->getChildren();
					
					//Print out categories string
					#print_r($subcats);
					
					foreach(explode(',',$subcats) as $subCatid)
					{
						$_category = Mage::getModel('catalog/category')->load($subCatid);
						#if($_category->getIsActive())
						#{
							#$_category->getURL();
							
							if($subCatid > 0) {
							$row2['store'] = strtolower($_category->getStore()->getName());
							$row2['categories'] = $_categorytop->getName() . "/" . $_category->getName();
							$row2['description'] = $_category->getDescription();
							$row2['url_key'] = $_category->getUrlKey();
							$row2['is_active'] = $_category->getIsActive();
							$row2['meta_title'] = $_category->getMetaTitle();
							$row2['url_path'] = $_category->getUrlPath();
							$row2['is_anchor'] = $_category->getIsAnchor();
							$row2['meta_keywords'] = $_category->getMetaKeywords();
							$row2['meta_description'] = $_category->getMetaDescription();
							$row2['display_mode'] = $_category->getDisplayMode();
							
							if($_category->getImageUrl())
							{
								$catimg = $_category->getImageUrl();
							}
							
							$batchExport = $this->getBatchExportModel()
									->setId(null)
									->setBatchId($this->getBatchModel()->getId())
									->setBatchData($row2)
									->setStatus(1)
									->save();
							}
						#}
						
						#echo "CAT ID: " . $_category->getId();
						$subcategoriesmodel = Mage::getModel('catalog/category')->load($_category->getId());
						$subcategories = $subcategoriesmodel->getChildren();
						#echo "SUB CAT ID: " . $subcategories;
						foreach(explode(',',$subcategories) as $subcategoriesid)
						{
							if($subcategoriesid > 0) {
								$_sub_category = Mage::getModel('catalog/category')->load($subcategoriesid);
								$row3['store'] = strtolower($_sub_category->getStore()->getName());
								$row3['categories'] = $_categorytop->getName() . "/" . $_category->getName() . "/" . $_sub_category->getName();
								$row3['description'] = $_sub_category->getDescription();
								$row3['url_key'] = $_sub_category->getUrlKey();
								$row3['is_active'] = $_sub_category->getIsActive();
								$row3['meta_title'] = $_sub_category->getMetaTitle();
								$row3['url_path'] = $_sub_category->getUrlPath();
								$row3['is_anchor'] = $_sub_category->getIsAnchor();
								$row3['meta_keywords'] = $_sub_category->getMetaKeywords();
								$row3['meta_description'] = $_sub_category->getMetaDescription();
								$row3['display_mode'] = $_sub_category->getDisplayMode();
								
								$batchExport = $this->getBatchExportModel()
										->setId(null)
										->setBatchId($this->getBatchModel()->getId())
										->setBatchData($row3)
										->setStatus(1)
										->save();
										
								 /* START OF 3rd LEVEL CATEGORY EXPORT */
							  #echo "CAT ID: " . $_category->getId();
								$subsubcategoriesmodel = Mage::getModel('catalog/category')->load($_sub_category->getId());
								$subsubcategories = $subsubcategoriesmodel->getChildren();
								#echo "SUB CAT ID: " . $subcategories;
								foreach(explode(',',$subsubcategories) as $subsubcategoriesid)
								{
									if($subsubcategoriesid > 0) {
										$_sub_sub_category = Mage::getModel('catalog/category')->load($subsubcategoriesid);
										$row4['store'] = strtolower($_sub_sub_category->getStore()->getName());
										$row4['categories'] = $_categorytop->getName() . "/" . $_category->getName() . "/" . $_sub_category->getName(). "/" . $_sub_sub_category->getName();
										$row4['description'] = $_sub_sub_category->getDescription();
										$row4['url_key'] = $_sub_sub_category->getUrlKey();
										$row4['is_active'] = $_sub_sub_category->getIsActive();
										$row4['meta_title'] = $_sub_sub_category->getMetaTitle();
										$row4['url_path'] = $_sub_sub_category->getUrlPath();
										$row4['is_anchor'] = $_sub_sub_category->getIsAnchor();
										$row4['meta_keywords'] = $_sub_sub_category->getMetaKeywords();
										$row4['meta_description'] = $_sub_sub_category->getMetaDescription();
										$row4['display_mode'] = $_sub_sub_category->getDisplayMode();
										
										$batchExport = $this->getBatchExportModel()
												->setId(null)
												->setBatchId($this->getBatchModel()->getId())
												->setBatchData($row4)
												->setStatus(1)
												->save();
									}
									
								}
								
							}
							 
							 
							 
						}
								
							}
						}
							
					}
					}
        return $this;
		}
}

?>