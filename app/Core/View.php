<?php
declare(strict_types=1);

namespace App\Core;

use RuntimeException;

/** Render template PHP biasa + layout. Template ada di app/Views/. */
final class View
{
    /** Render template tanpa layout, mengembalikan string. */
    public static function partial(string $template, array $data = []): string
    {
        $file = BASE_PATH . '/app/Views/' . $template . '.php';
        if (!is_file($file)) {
            throw new RuntimeException("Template tidak ditemukan: {$template}");
        }
        extract($data, EXTR_SKIP);
        ob_start();
        try {
            include $file;
        } catch (\Throwable $e) {
            ob_end_clean();
            throw $e;
        }
        return (string) ob_get_clean();
    }

    /** Render template di dalam layout; $content tersedia di layout. */
    public static function render(string $template, array $data = [], ?string $layout = null): string
    {
        $content = self::partial($template, $data);
        if ($layout === null) {
            return $content;
        }
        return self::partial($layout, $data + ['content' => $content]);
    }
}
