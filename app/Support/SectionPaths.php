<?php

namespace App\Support;

use Illuminate\Support\Arr;

class SectionPaths
{
    /**
     * Вернёт public-relative путь к директории секции.
     * Пример: assets/components/sections/newborn/hero
     */
    public static function dir(string $page, string $section): string
    {
        $pages = config('site_sections.pages', []);
        $rel   = Arr::get($pages, "{$page}.{$section}");

        abort_unless(is_string($rel) && $rel !== '', 404);

        return ltrim($rel, '/');
    }

    /**
     * Вернёт массив путей (директорий) для страницы/группы.
     */
    public static function group(string $group, string $key): string
    {
        $groups = config('site_sections.groups', []);
        $rel    = Arr::get($groups, "{$group}.{$key}");

        abort_unless(is_string($rel) && $rel !== '', 404);

        return ltrim($rel, '/');
    }

    /**
     * URL fallback (единый для всего проекта)
     */
    public static function fallbackUrl(): string
    {
        return asset(config('site_sections.fallback', 'assets/images/fallback.png'));
    }

    /**
     * public_path() к папке (если надо File::files / scan)
     */
    public static function publicDirPath(string $relDir): string
    {
        return public_path(trim($relDir, '/'));
    }
}
