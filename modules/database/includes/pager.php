<?php // Attogram Framework - Database Module - Pager v0.0.2

namespace Attogram;

/**
 * pager() - pagination
 * @param  int    $count   The Total Resultset Count
 * @param  int    $limit   The # of results to list per page
 * @param  int    $offset  The item# to start the list
 * @return string           HTML fragment
 */
function pager( int $count, int $limit, int $offset ) {

  if( $limit > $count ) {
    $limit = $count;
  }
  if( $offset > $count ) {
    $offset = $count - $limit;
  }
  $start_count = $offset + 1;
  $end_count = $offset + $limit;
  if( $end_count > $count ) {
    $end_count = $count;
  }

  $r = "<p>Showing #$start_count to #$end_count of <code>$count</code> results</p>";

  if( $limit <= 0 ) {
    $total_pages = 0;
  } else {
    $total_pages = ceil( $count / $limit );
    if( $total_pages == 1 ) {
      $total_pages = 0;
    }
  }

  if( $total_pages ) {
    $r .= '<ul class="pagination squished">';
    $p_offset = 0;
    for( $x = 0; $x < $total_pages; $x++ ) {
      if( $start_count == $p_offset + 1 ) {
        $active = ' class="active"';
      } else {
        $active = '';
      }
      $r .= '<li' . $active . '><a href="?l=' . $limit . '&o=' . $p_offset . '">' . ($x+1) . '</a></li>';
      $p_offset += $limit;
    }
    $r .= '</ul>';
  }

  return '<div class="container">' . $r . '</div>';
}