<?php
/** Props: name, label, type(text|email|password|select|textarea|number), value?, placeholder?, options?(value=>label), help?, error?, required?, soft?, id? */
$type = $type ?? 'text';
$id = $id ?? 'f-' . $name;
$cls = 'field' . (!empty($soft) ? ' field-soft' : '') . (!empty($error) ? ' field-invalid' : '');
$req = !empty($required) ? ' required' : '';
$aria = ' aria-describedby="' . e($id) . '-msg"' . (!empty($error) ? ' aria-invalid="true"' : '');
?>
<div>
  <?php if (!empty($label)): ?><label class="field-label" for="<?= e($id) ?>"><?= e($label) ?></label><?php endif; ?>
  <?php if ($type === 'select'): ?>
    <select id="<?= e($id) ?>" name="<?= e($name) ?>" class="<?= e($cls) ?>"<?= $req . $aria ?>>
      <?php foreach (($options ?? []) as $v => $l): ?>
        <option value="<?= e($v) ?>"<?= (string) ($value ?? '') === (string) $v ? ' selected' : '' ?>><?= e($l) ?></option>
      <?php endforeach; ?>
    </select>
  <?php elseif ($type === 'textarea'): ?>
    <textarea id="<?= e($id) ?>" name="<?= e($name) ?>" class="<?= e($cls) ?>" placeholder="<?= e($placeholder ?? '') ?>"<?= $req . $aria ?>><?= e($value ?? '') ?></textarea>
  <?php else: ?>
    <input id="<?= e($id) ?>" type="<?= e($type) ?>" name="<?= e($name) ?>" value="<?= e($value ?? '') ?>" placeholder="<?= e($placeholder ?? '') ?>" class="<?= e($cls) ?>"<?= $req . $aria ?>>
  <?php endif; ?>
  <div id="<?= e($id) ?>-msg">
    <?php if (!empty($error)): ?><p class="field-error"><?= e($error) ?></p>
    <?php elseif (!empty($help)): ?><p class="field-help"><?= e($help) ?></p><?php endif; ?>
  </div>
</div>
