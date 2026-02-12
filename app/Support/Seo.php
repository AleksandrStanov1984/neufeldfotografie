<?php

namespace App\Support;

class Seo
{
    /**
     * Build full title: "{page} – {site}"
     * @param string $key
     * @param string|null $fallback
     * @return string
     */
    public static function title(string $key, ?string $fallback = null): string
    {
        $site = __('seo.global.site_name');
        $sep  = __('seo.global.separator');

        $pageTitle = self::t("seo.$key.title", $fallback ?? $site);

        // если title пустой/не найден → только site
        if (!$pageTitle || $pageTitle === $site) {
            return $site;
        }

        return $pageTitle . ' ' . $sep . ' ' . $site;
    }

    public static function description(string $key, ?string $fallback = null): string
    {
        return self::t("seo.$key.description", $fallback ?? __('seo.global.default_description'));
    }

    public static function robots(string $key, ?string $fallback = null): string
    {
        // page-level override; if none → global
        $val = self::t("seo.$key.robots", '');
        return $val ?: ($fallback ?? __('seo.global.robots'));
    }

    public static function ogType(?string $fallback = null): string
    {
        return self::t('seo.global.og_type', $fallback ?? 'website');
    }

    public static function ogImage(string $key, ?string $fallback = null): string
    {
        // page-level image; if none → fallback
        $img = self::t("seo.$key.og_image", '');
        $img = $img ?: ($fallback ?? '/assets/og/default.jpg');

        // absolute url required for OG
        return url($img);
    }

    public static function twitterCard(?string $fallback = null): string
    {
        return self::t('seo.global.twitter_card', $fallback ?? 'summary_large_image');
    }

    public static function canonical(): string
    {
        return url()->current();
    }

    private static function t(string $path, string $fallback): string
    {
        $val = __($path);
        // Laravel returns the key string if missing
        if ($val === $path) return $fallback;
        return trim((string)$val) ?: $fallback;
    }

public static function hreflangs(): array
{
    // Поддерживаемые локали
    $locales = ['de', 'en', 'ru'];

    $current = url()->current();

    $out = [];
    foreach ($locales as $loc) {
        // Вариант 1 (идеально): если локаль в URL и есть Seo::localizedUrl($loc)
        if (method_exists(static::class, 'localizedUrl')) {
            $out[$loc] = static::localizedUrl($loc);
        } else {
            // Вариант 2 (пока): хотя бы на корень локали
            $out[$loc] = url('/' . $loc);
        }
    }

    // x-default обычно на базовую версию (например de)
    $out['x-default'] = $out['de'] ?? $current;

    return $out;
}

public static function ogImageAlt(string $key = 'home'): string
{
    // можно хранить в lang/*/seo.php как og_image_alt
    return __('seo.' . $key . '.og_image_alt', [], app()->getLocale())
        ?: __('seo.global.site_name');
}

public static function ogLocale(): string
{
    // Facebook любит формат ll_CC (de_DE), но можно хотя бы так:
    return match(app()->getLocale()) {
        'de' => 'de_DE',
        'en' => 'en_US',
        'ru' => 'ru_RU',
        default => 'en_US',
    };
}

public static function ogAlternateLocales(): array
{
    $map = ['de' => 'de_DE', 'en' => 'en_US', 'ru' => 'ru_RU'];
    $current = app()->getLocale();
    return array_values(array_diff($map, [$map[$current] ?? null]));
}



}
