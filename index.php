<?php

require_once('functions.php');

$dir    = 'docs';
$files1 = scandir($dir, -1);

foreach ($files1 as $filename):
	echo '<strong>';
	$filename = 'docs/'.$filename;
	echo $filename;
	echo '</strong>';




$zip = zip_open($filename);
if (!$zip || is_numeric($zip)) return false;
//echo zip_read($zip);
if ($zip)
  {
  while ($zip_entry = zip_read($zip))
    {
    echo "<p>";
    if ( zip_entry_name($zip_entry) == 'word/document.xml'):
    if (zip_entry_open($zip, $zip_entry))
      {
      echo "File Contents:";

      $contents = zip_entry_read($zip_entry);
      echo '<p>' .$contents . '</p>';
      zip_entry_close($zip_entry);
      }
      endif;
    echo "</p>";
  }

zip_close($zip);
}

endforeach;
	





;?>