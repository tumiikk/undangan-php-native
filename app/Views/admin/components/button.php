<?php
/** Props: label, variant(primary|secondary|navy|danger|ghost), href?, type?, size?(sm), icon?, block?, class?, attrs?(array) */
$variant = $variant ?? 'primary';
$classes = 'btn-' . $variant . (($size ?? '') === 'sm' ? ' btn-sm' : '') . (!empty($block) ? ' btn-block' : '') . (isset($class) ? ' ' . $class : '');
$attrString = '';
foreach (($attrs ?? []) as $k => $v) {
    $attrString .= ' ' . e($k) . ($v === true ? '' : '="' . e($v) . '"');
}
$inner = (!empty($icon) ? icon($icon, 'h-4 w-4') : '') . '<span>' . e($label ?? '') . '</span>';
if (!empty($href)) {
    echo '<a href="' . e($href) . '" class="' . e($classes) . '"' . $attrString . '>' . $inner . '</a>';
} else {
    echo '<button type="' . e($type ?? 'button') . '" class="' . e($classes) . '"' . $attrString . '>' . $inner . '</button>';
}
