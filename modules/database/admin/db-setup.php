<?php
// Attogram Framework - Database Setup v0.0.1

namespace Attogram;

$title = 'Attogram - Admin - DB setup';
$this->page_header('Attogram - Admin - DB setup');
?>
<div class="container">
Config: <a href="./">Database Tables</a>
<ul>
<li><a href="./?create">Create Attogram Tables</a>
</ul>
<?php
if( isset($_GET['create']) ) {

  if( !$this->db->get_tables() ) {
    print '<pre>ERROR: no table definitions found</pre>';
  } else {
    foreach(array_keys( $this->db->tables ) as $table) {
      print "<br />Creating table <strong>$table</strong>: ";
      if( $this->db->create_table($table) ) {
        print 'OK';
      } else {
        print 'ERROR';
      }
    }
  }
}
?>
</div>
<?php
$this->page_footer();