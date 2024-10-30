<?php

namespace TomatoPHP\FilamentSettingsHub\Services\Contracts;

class SettingHold
{
    /**
     * @example home
     */
    public string $label;

    public ?string $description = null;

    /**
     * @example bx bx-home
     */
    public ?string $icon = 'heroicon-o-cog';

    /**
     * @example admin.home
     */
    public ?string $route = '';

    /**
     * @example /admin
     */
    public ?string $url = '#';

    /**
     * @example _blank
     */
    public ?string $target = null;

    /**
     * @example new
     */
    public ?string $badge = '';

    /**
     * @example #fefefe
     */
    public ?string $color = null;

    public ?string $page = null;

    public string | array | null $group = 'resources';

    public int $order = 1;

    public static function make(): self
    {
        return new self;
    }

    public function toArray(): array
    {
        return [[
            'label' => $this->label ?? null,
            'description' => $this->description ?? null,
            'icon' => $this->icon ?? null,
            'target' => $this->target ?? null,
            'url' => $this->url ?? null,
            'page' => $this->page ?? null,
            'route' => $this->route ?? null,
            'badge' => $this->badge ?? null,
            'color' => $this->color ?? null,
            'group' => $this->group ?? null,
            'order' => $this->order ?? 1,
        ]];
    }

    public function order(int $order): static
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return $this
     */
    public function label(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function page(string $page): static
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @return $this
     */
    public function description(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return $this
     */
    public function group(string | array $group): static
    {
        $this->group = $group;

        return $this;
    }

    /**
     * @return $this
     */
    public function icon(string $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @return $this
     */
    public function color(string $color): static
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return $this
     */
    public function route(string $route): static
    {
        $this->route = $route;

        return $this;
    }

    /**
     * @return $this
     */
    public function url(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return $this
     */
    public function target(string $target): static
    {
        $this->target = $target;

        return $this;
    }

    /**
     * @return $this
     */
    public function badge(string $badge): static
    {
        $this->badge = $badge;

        return $this;
    }
}
