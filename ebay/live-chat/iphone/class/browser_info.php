<?php
class Browser
{
    var $props  = array("Version" => "0.0.0",
                    "Name" => "unknown",
                    "Agent" => "unknown") ;

    function Browser($UA)
    {
        $browsers = array("firefox", "msie", "opera", "chrome", "safari",
                            "mozilla", "seamonkey",    "konqueror", "netscape",
                            "gecko", "navigator", "mosaic", "lynx", "amaya",
                            "omniweb", "avant", "camino", "flock", "aol");

        $this->Agent = strtolower($UA);
        foreach($browsers as $browser)
        {
            if (preg_match("#($browser)[/ ]?([0-9.]*)#", $this->Agent, $match))
            {
                $this->Name = $match[1] ;
                $this->Version = $match[2] ;
                break ;
            }
        }
    }

    function Get($name)
    {
        if (!array_key_exists($name, $this->props))
        {
          return "NA";
        }
        return $this->props[$name] ;
    }

    function Set($name, $val)
    {
        if (array_key_exists($name, $this->props))
        {
        $this->props[$name] = $val ;        
        }
    }

}
?>