<?php

namespace App\Support;

class Seo
{
    /**
     * Build full title: "{page} {sep} {site}"
     */
    public static function title(string $key, ?string $fallback = null): string
    {
        $site = __('seo.global.site_name');
        $sep  = __('seo.global.separator');

        $pageTitle = self::t("seo.$key.title", $fallback ?? $site);

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
        $val = self::t("seo.$key.robots", '');
        return $val ?: ($fallback ?? __('seo.global.robots'));
    }

    public static function ogType(?string $fallback = null): string
    {
        return self::t('seo.global.og_type', $fallback ?? 'website');
    }

    public static function ogImage(string $key, ?string $fallback = null): string
    {
        $img = self::t("seo.$key.og_image", '');
        $img = $img ?: ($fallback ?? config('site_sections.seo.og_fallback', '/assets/og/default.jpg'));

        // Absolute url required for OG
        return url($img);
    }

    public static function ogImageAlt(string $key, ?string $fallback = null): string
    {
        $alt = self::t("seo.$key.og_image_alt", '');
        return $alt ?: ($fallback ?? __('seo.global.site_name'));
    }

    public static function twitterCard(?string $fallback = null): string
    {
        return self::t('seo.global.twitter_card', $fallback ?? 'summary_large_image');
    }

    /**
     * Canonical URL (по умолчанию без ?lang=, чтобы не плодить дубликаты).
     */
    public static function canonical(bool $keepLang = false): string
    {
        $url = url()->current();

        if ($keepLang) {
            $langKey = config('site_sections.locales.query_key', 'lang');
            $lang = request()->query($langKey);

            if ($lang) {
                return $url . '?'.$langKey.'=' . urlencode($lang);
            }
        }

        return $url;
    }

    /**
     * hreflang URLs (у тебя язык через query параметр).
     */
    public static function hreflangs(): array
    {
        $locales   = config('site_sections.locales.available', ['de', 'en', 'ru']);
        $fallback  = config('site_sections.locales.fallback', 'de');
        $queryKey  = config('site_sections.locales.query_key', 'lang');

        $base = url()->current();

        $out = [];
        foreach ($locales as $loc) {
            $out[$loc] = $base . '?' . $queryKey . '=' . urlencode($loc);
        }

        $out['x-default'] = $out[$fallback] ?? $base;

        return $out;
    }

    public static function ogLocale(): string
    {
        $map = config('site_sections.seo.og_locales_map', [
            'de' => 'de_DE',
            'en' => 'en_US',
            'ru' => 'ru_RU',
        ]);

        $cur = app()->getLocale();

        return $map[$cur] ?? 'en_US';
    }

    public static function ogAlternateLocales(): array
    {
        $map = config('site_sections.seo.og_locales_map', [
            'de' => 'de_DE',
            'en' => 'en_US',
            'ru' => 'ru_RU',
        ]);

        $cur = app()->getLocale();
        $curVal = $map[$cur] ?? null;

        return array_values(array_filter($map, fn($v) => $v && $v !== $curVal));
    }

    private static function t(string $path, string $fallback): string
    {
        $val = __($path);

        // Laravel returns the key string if missing
        if ($val === $path) {
            return $fallback;
        }

        $val = trim((string) $val);

        return $val !== '' ? $val : $fallback;
    }
}
