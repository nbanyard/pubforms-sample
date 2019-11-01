<?php
require_once __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/sample.inc';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $requestedpub = NULL;
  foreach ($samplepubs as $pub) {
    if ($pub['PubID'] == $_POST['pub']) {
      $requestedpub  = $pub;
      break;
    }
  }

  if (is_null($requestedpub)) {
    require 'notfound.inc';
  } else {
    $filename = preg_replace('/[\/ ,"\']+/', '-', $pub['PubID'].'-'.$pub['Name'].'-'.$pub['Town'].'.pdf');
    header('Content-Type: application/php');
    header('Content-Disposition: attachment; filename="$filename"');

    $renderer = new \ShbPubForms\Renderer();
    $renderer->FormForPub($pub);
    $renderer->Output();
  }
} else {
  require 'form.inc';
}
?>
