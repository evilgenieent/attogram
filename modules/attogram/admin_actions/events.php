<?php // Attogram Framework - Events log v0.0.2

namespace Attogram;

$this->page_header('Event Log');
print '<div class="container"><h1>Event Log</h1>';
print '<p>last 500 events:</p>';

$e = $this->db->query('SELECT * FROM event ORDER BY time DESC LIMIT 500');

foreach( $e as $v ) {
  print $this->web_display( $v['message'] ) . '<br />';
}

print '</div>';
$this->page_footer();
