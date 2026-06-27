<?php

namespace App\Services;

use App\Models\Menu;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;

class SiteDataService
{
    public function settings(): ?Setting
    {
        return Setting::site();
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

        return $menu?->items ?? collect();
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
