<html>
  <head>
    <title>Pub Survey Form Generator Demo</title>
  </head>
  <body>
    <h1>Pub Survey Form Generator Demo</h1>
    <form method="POST">
      <ul>
        <li>
          <label for="pub">Pub:</label>
          <select name="pub">
            <?php
              foreach ($samplepubs as $pub) {
                $pubid = $pub["PubID"];
                $label = $pub["Name"] . ", " . $pub["Town"];
                echo ("<option value=\"$pubid\">$label</option>");
              }
            ?>
          </select>
        </li>
        <li>
          <input type="submit">
        </li>
      <ul>
    </form>
  </body>
</html>
