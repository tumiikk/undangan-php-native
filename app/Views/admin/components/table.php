<?php
/** Props: columns[string], rows[ [cell,...] ] — cell string di-escape; ['html'=>'...'] untuk HTML dari komponen */
?>
<div class="table-wrap">
  <table class="table">
    <thead><tr><?php foreach ($columns as $c): ?><th scope="col"><?= e($c) ?></th><?php endforeach; ?></tr></thead>
    <tbody>
      <?php foreach ($rows as $row): ?>
        <tr><?php foreach ($row as $cell): ?><td><?= is_array($cell) ? ($cell['html'] ?? '') : e($cell) ?></td><?php endforeach; ?></tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
