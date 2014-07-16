<?php

require_once('functions.php');

$dir    = 'docs';
$files1 = scandir($dir, -1);
?>
<table>
<tbody>
  <tr>
    <th>FILENAME</th>
    <th>LOCATION</th>
    <th>AUTHOUR</th>
    <th>DATE</th>


  </tr>

<?php
foreach ($files1 as $filename):
	echo '<tr>';
  echo '<td><strong>';
	$filename = 'docs/'.$filename;
	echo $filename;
	echo '</strong></td>';




$zip = zip_open($filename);
if (!$zip || is_numeric($zip)) return false;
//echo zip_read($zip);
if ($zip):
  while ($zip_entry = zip_read($zip)):
    if ( zip_entry_name($zip_entry) == 'word/document.xml'):
      if (zip_entry_open($zip, $zip_entry)):

        $contents = zip_entry_read($zip_entry);
        $contents = strtolower($contents);

        echo '<td>' . between($contents,'location','date') . '</td>';
        echo '<td>' . between($contents,'authour','location') . '</td>';
        echo '<td>' . between($contents,'date','end') . '</td>';
        zip_entry_close($zip_entry);
        endif;
      endif;
  endwhile;

zip_close($zip);
endif;

endforeach;?>
</tbody>
</table>