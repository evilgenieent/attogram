<?php
// Attogram - action - admin - info

namespace Attogram;

$this->page_header('Attogram - Admin - Info');

function info_file($file) {
  if( is_file($file) && is_readable($file) ) { $gn = 'ok'; $gt = 'success'; } else { $gn = 'remove'; $gt = 'danger'; }
  return '<span class="glyphicon glyphicon-' . $gn . ' text-' . $gt . '" aria-hidden="true"></span> ' . $file;  
}
function info_dir($dir) {
  if( is_readable_dir($dir) ) { $gn = 'ok'; $gt = 'success'; } else { $gn = 'remove'; $gt = 'danger'; }
  return '<span class="glyphicon glyphicon-' . $gn . ' text-' . $gt . '" aria-hidden="true"></span> ' . $dir;
}
function info_actions( $actions ) {
  $r = '';
  foreach( array_keys($actions) as $a ) {
    $r .= '<li><a href="../' . $a . '/"><strong>' . $a . '</strong></a>'
      . ' - file:<strong>' . $actions[$a]['file'] . '</strong>'
      . ' - parser:<strong>' . $actions[$a]['parser'] . '</strong></li>';
  }
  return $r;
}

/**
 * to_list() - make a comma seperated list of items within an array or object
 *
 * @param mixed $x The input to be listed
 * @param string $sep The seperator between items
 *
 * @return string
 */
function to_list( $x, $sep=', ') {
  if( is_array($x) ) {
    $r = '';
    foreach($x as $n => $v) {
      if( !is_object($v) && !is_array($v) ) {
        if( $v == '' ) { $v = '<code>empty</code>'; }
        $r .= $v . $sep;
      } else {
        $r .= to_list($v) . $sep;
      }
    }
    return rtrim($r,$sep);
  }
  if( is_object($x) ) {
    return get_class($x);
  }
  return $x;
}

$info = array();
$info['ATTOGRAM_VERSION'] = ATTOGRAM_VERSION;
$info['site_name'] = $this->site_name;
$info['site_url'] = '<a href="' . $this->get_site_url() . '">' . $this->get_site_url() . '</a>';
$info['path'] = ( $this->path ? $this->path : '<code>empty</code>' );
$info['uri'] = '<li>' . to_list($this->uri,'<li>');
$info['action'] = info_file($this->action);

$autoloader = 'vendor/autoload.php';
$info['autoloader'] = info_file($autoloader);
$info['log'] = ( is_object($this->log) ? get_class($this->log) : '<code>?</code>' );

$info['actions_dir'] = info_dir($this->actions_dir);
$info['default_action'] = info_file($this->default_action);
$info['actions'] = info_actions($this->actions);

$info['admin_dir'] = info_dir($this->admin_dir);
$info['admin_actions'] = info_actions($this->admin_actions);
$info['admins'] = '<li>' . to_list($this->admins, '<li>');

$info['fof'] = info_file($this->fof);
$info['templates_dir '] = info_dir($this->templates_dir);
$info['functions_dir'] = info_dir($this->functions_dir);

$info['db_name'] = info_file($this->db_name);
$info['tables_dir'] = info_dir($this->tables_dir);
$info['database_size'] = (file_exists($this->db_name) ? filesize($this->db_name) : '<code>null</code>') . ' bytes';
$info['sqlite_database'] = get_class($this->sqlite_database);
$info['skip_files'] = '<li>' . to_list($this->skip_files, '<li>');

$info['attogram_id'] = isset($_SESSION['attogram_id']) ? htmlentities($_SESSION['attogram_id']) : '<code>null</code>';
$info['attogram_username'] = isset($_SESSION['attogram_username']) ? htmlentities($_SESSION['attogram_username']) : '<code>null</code>';
$info['attogram_level'] = isset($_SESSION['attogram_level']) ? htmlentities($_SESSION['attogram_level']) : '<code>null</code>';
$info['attogram_email'] = isset($_SESSION['attogram_email']) ? htmlentities($_SESSION['attogram_email']) : '<code>null</code>';

print '<div class="container"><h1>Attogram Framework Info</h1><table class="table">';
foreach( $info as $name => $value ) {
  print '<tr><td>' . $name . '</td><td>' . $value . '</td></tr>';
}
print '</table></div>';
$this->page_footer();
