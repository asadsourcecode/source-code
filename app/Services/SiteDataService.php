<?php

namespace App\Services;

use App\Models\Menu;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;

class SiteDataService
{
    private ?Setting $cachedSettings = null;

    public function settings(): ?Setting
    {
        return $this->cachedSettings ??= Setting::site();
    }

    public function contactPhone(): string
    {
        return $this->settings()?->phone ?? '+45 50106941';
    }

    public function contactEmail(): string
    {
        return $this->settings()?->email ?? 'Info@characterbuilding.education';
    }

    public function headerMenu(): Collection
    {
        $menu = Menu::where('location', 'header')
            ->with(['items' => function ($q) {
                $q->whereNull('parent_id')
                    ->where('status', true)
                    ->orderBy('sort_order')
                    ->with(['children', 'page']);
            }])
            ->first();

        return $this->addRouteMapping($menu?->items ?? collect());
    }

    private function addRouteMapping(Collection $items): Collection
    {
        return $items->map(function ($item) {
            $normalizedTitle = strtolower(str_replace(' ', '', $item->title));

            if (str_contains($normalizedTitle, 'teacher') && str_contains($normalizedTitle, 'training')) {
                $item->route = 'teachers-training';
            } elseif (str_contains($normalizedTitle, 'online') && str_contains($normalizedTitle, 'class')) {
                $item->route = 'online-classes';
            } elseif (str_contains($normalizedTitle, 'audio') && str_contains($normalizedTitle, 'stori')) {
                $item->route = 'audio-stories';
            } elseif (str_contains($normalizedTitle, 'homeschool')) {
                $item->route = 'homeschooling';
            } elseif ($item->isIntro()) {
                $item->route = 'introduction';
            } elseif (str_contains($normalizedTitle, 'contact')) {
                $item->route = 'contact';
            } elseif ($item->isCounselling()) {
                $item->route = 'counselling';
            } elseif (str_contains($normalizedTitle, 'pricing')) {
                $item->route = 'pricing';
            } elseif ($item->isBooks()) {
                $item->route = null;
            } else {
                $item->route = null;
            }

            if ($item->children->isNotEmpty()) {
                $item->children = $this->addRouteMapping($item->children);
            }

            return $item;
        });
    }

    public function footerMenu(): Collection
    {
        $menu = Menu::where('location', 'footer')
            ->with(['items' => function ($q) {
                $q->where('status', true)
                    ->orderBy('sort_order');
            }])
            ->first();

        return $menu?->items ?? collect();
    }
}
