<?php
// Attogram - plugin - timer

class plugin_timer { 
 
  var $start;

  function is_active() { return true; } 

  function __construct($attogram='') { }

  function hook($hook) { 
    switch($hook) { 
      case 'POST-ADMIN': print '<br />plugin_timer: ' . ($this->is_active() ? 'ACTIVE' : 'DISABLED'); break;
      case 'PRE-INIT': $this->start_timer(); break;
      case 'POST-FOOTER': $this->end_timer(); break;
    } 
  } 

  function start_timer() { 
    $this->start = microtime(1); 
  }
 
  function end_timer() { 
    $end = microtime(1);
    $diff = round( $end - $this->start, 18);
    $attoseconds = number_format( pow(10,18)*$diff, $decimals=0 );
    print '<br />Powered by <a target="code" href="https://github.com/attogram/attogram/">Attogram</a> &nbsp;|&nbsp; '
    . 'Page generated in ' . $attoseconds . ' attoseconds (' . round($diff,5) . ' seconds)';
  }

} // END of class plugin_timer
