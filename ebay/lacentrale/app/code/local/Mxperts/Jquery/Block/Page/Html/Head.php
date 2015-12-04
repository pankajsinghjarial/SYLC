<?php
/**
 * @category Mxperts
 * @package Mxperts_jQuery
 * @authors TMEDIA cross communications <info@tmedia.de>, Johannes Teitge <teitge@tmedia.de>, Igor Jankovic <jankovic@tmedia.de>, Daniel Sasse <daniel.sasse@golox.eu>
 * @developer Johannes Teitge <teitge@tmedia.de>  
 * @copyright TMEDIA cross communications, Doris Teitge-Seifert
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * 
 * 
 * Initial-Release V 1.1.0 - 7-15-2009 
 *
 * Changes V 1.2.0 - 7-16-2009
 *   - noConflict moved to seperate Javascript-File   
 *   - Integration of Minified Version of jQuery-Scripts
 *
 * Changes V 1.2.1 - 7-18-2009
 *   - Functionality moved to seperate Javascript-File   
 *   - better integration of Minified Version
 *   - getjQueryFilenames() integrated    
 *
 * Changes V 1.2.2 - 7-18-2009
 *   - additional_files for communications with Mxperst_Jquerytools    
 *             
 * Changes V 1.2.3 - 7-19-2009
 *   - Jquery Scripting added    
 *
 *  Changes V 1.2.4 - 7-25-2009
 *   - Jquery 1.3.1 and 1.2.6 added    
 *
 *  Changes V 1.2.5 - 7-27-2009
 *   - Support for Skin Javascript added    
 *   - Support for Skin CSS added
 *   New Functions: checkSkinFile,getSkinJS and getSkinCSS
 *   
 *  Bugfix V 1.2.6 - 8-12-2009
 *  System -> Configuration -> default -> URL Options: Yes   
 *
 *  Changes V 1.3.0 - 8-12-2009
 *  Allow js and css comments in backend   
 *  
 *  Changes V 1.3.1 - 9-28-2009
 *  Bugfix in MxpertsAll Helper  
 *                     
 */
class Mxperts_Jquery_Block_Page_Html_Head extends Mage_Page_Block_Html_Head
{

    var $additional_files;
    var $rega = '<!--.*?-->';    
    var $regb = '/\*.*?\*/';   

    public function jQueryLatest()
    {
      return '1.8.2';
    }

    public function getjQueryFilenames()
    {
        $latest_jquery_version = $this->jQueryLatest();
        $minified = '';        
        $jquery_version = '';        
        $jquery_filename = '';
        
        if (Mage::getStoreConfig('mxperts/jquerysettings/jquery_minified') == 1) {
          $minified = '.min';  
        }
        
        if (Mage::getStoreConfig('mxperts/jquerysettings/jquery_always_latest') == 1) {
          $jquery_version = $latest_jquery_version;  
        } else {
          $jquery_version = Mage::getStoreConfig('mxperts/jquerysettings/jquery_version');
          if (trim($jquery_version) == '') {
            $jquery_version = $latest_jquery_version;          
          }                                               
        }
        
        $filenames[] = 'jquery/jquery-'.$jquery_version.$minified.'.js';
        
        if (Mage::getStoreConfig('mxperts/jquerysettings/jquery_noconflict') == 1) {
          $filenames[] = 'jquery/jquery-noconflict.js';  
        }
        
        if ( Mage::getStoreConfig('mxperts/jquerysettings/jquery_functionality') == 1) {
          $filenames[] = 'jquery/jquery-functionality.js';        
        }        
		//$filenames[] = 'jquery/jquery.dimensions-1.2.js';  
		//$filenames[] = 'jquery/jquery.cluetip.js';  
		//$filenames[] = 'jquery/ui/jquery-ui-1.8.16.custom.min.js';  

        return $filenames;           
    }


    public function getjQueryScript($number) {
      if ( Mage::getStoreConfig('mxperts/jqueryscript'.trim($number).'/active') == 1) {
        $code = Mage::getStoreConfig('mxperts/jqueryscript'.trim($number).'/code');          
        $scripttemplate = "<script type=\"text/javascript\">\n%s\n</script>"; 
        
        if ( Mage::getStoreConfig('mxperts/jqueryscript'.trim($number).'/ready') == 1) {           
          $scripttemplate_read = "jQuery(function() {\n%s\n});";                    
          $code = sprintf($scripttemplate_read, $code);
        }  
            
        return sprintf($scripttemplate, $code) . "\n";
      } else {
        return '';
      }        
    }


    public function checkSkinFile($filename)
    {
      $_filename = $this->getSkinUrl($filename);
      return $_filename;
      
/*      
      $_url = parse_url($_filename,PHP_URL_PATH);
      
      if (file_exists($_SERVER['DOCUMENT_ROOT'].$_url)) {
        if (strpos($_url, "/") == 0) {
          $_url = substr($_url,1); 
        }            
        return $_url;
      } else {
        return false;
      }
*/      
              
    }
    
    public function checkComment($filename)
    {
      if ( preg_match($this->rega, $filename) ) {
        return true;
      }      
      if ( preg_match($this->regb, $filename) ) {
        return true;
      }      
     
      return false;
    }    


    public function getSkinJS() 
    {
      $result = '';    
//      $base = Mage::getBaseUrl();
      $base = '';  
    
      $script = '<script type="text/javascript" src="%s" %s></script>';      
      if ( (Mage::getStoreConfig('mxperts/jqueryjs/active') == 1) && (trim(Mage::getStoreConfig('mxperts/jqueryjs/code')) != '') ) { 
        $jslines = explode("\n", Mage::getStoreConfig('mxperts/jqueryjs/code'));       
        foreach ($jslines as $js) {
        
          $js = trim($js);          
          if (!$this->checkComment($js)) {        
            if ( ($js != '') && ($filename = $this->checkSkinFile('js/'.$js)) ) {                   
              $result .= sprintf($script, $base.$filename, '') . "\n";            
            }                              
          }
        }      
      }               
      return $result;
    }

    
    public function getSkinCSS() 
    {
      $result = '';    
//      $base = Mage::getBaseUrl();
      $base = '';
      $script = '<link rel="stylesheet" type="text/css" href="%s" media="all" />';
      
      if ( (Mage::getStoreConfig('mxperts/jquerycss/active') == 1) && (trim(Mage::getStoreConfig('mxperts/jquerycss/code')) != '') ) { 
        $csslines = explode("\n", Mage::getStoreConfig('mxperts/jquerycss/code'));       
        foreach ($csslines as $css) {
          $css = trim($css);           
          if (!$this->checkComment($css)) {          
            if ( ($css != '') && ($filename = $this->checkSkinFile('css/'.$css)) ) {                   
              $result .= sprintf($script, $base.$filename, '') . "\n";            
            }
          }                      
        }      
      }               
      return $result;
    }
    
     

    public function getCssJsHtml()
    {
        $js_files = '';    
        $html = '';
        $test = '';   
        $baseJs = Mage::getBaseUrl('js');     
        $script = '<script type="text/javascript" src="%s" %s></script>';            
        
        if ( Mage::getStoreConfig('mxperts/jquerysettings/active') == 1) {
          $js_files = $this->getjQueryFilenames();
          
          if (is_array($this->additional_files) && (count($this->additional_files) > 0)) {
            foreach($this->additional_files as $filename) {
              $js_files[] = $filename;
            }
          }                    
          
          foreach($js_files as $filename) {
            if (Mage::getStoreConfigFlag('dev/js/merge_files')) {             
              $html .= ','.$filename;
            } else {
              $html .= sprintf($script, $baseJs.$filename, '') . "\n";
            }   
          }
          if (Mage::getStoreConfigFlag('dev/js/merge_files')) {
            $html = sprintf($script, $baseJs.'index.php?c=auto&amp;f='.$html, '') . "\n";                                 
          }  
                  

        } // .../active') == 1
        
        $html .= parent::getCssJsHtml().$this->getjQueryScript('1').$this->getjQueryScript('2').$this->getSkinJs().$this->getSkinCSS();
        return $html;         
    }

}
