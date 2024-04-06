<?php

namespace TomatoPHP\FilamentSettingsHub\Services\Contracts;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cookie;
use TomatoPHP\TomatoAdmin\Facade\TomatoWidget as TomatoWidgetFacade;
use Modules\TomatoSettings\App\Facades\TomatoSettings;

class SettingHold
{
    /**
     * @var string
     * @example home
     */
    public string $label;

    public ?string $description =null;


    /**
     * @var ?string
     * @example bx bx-home
     */
    public ?string $icon = "heroicon-o-cog";

    /**
     * @var ?string
     * @example admin.home
     */
    public ?string $route = "";

    /**
     * @var ?string
     * @example /admin
     */
    public ?string $url = "#";

    /**
     * @var ?string
     * @example _blank
     */
    public ?string $target = null;

    /**
     * @var ?string
     * @example new
     */
    public ?string $badge = "";

    /**
     * @var ?string
     * @example #fefefe
     */
    public ?string $color = null;

    /**
     * @var string|null
     */
    public string|array|null $group = "resources";


    /**
     * @return static
     */
    public static function make(): static
    {
        return (new static);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array([
            "label" => $this->label ?? null,
            "description" => $this->description ?? null,
            "icon" => $this->icon ?? null,
            "target" => $this->target ?? null,
            "url" => $this->url ?? null,
            "route" => $this->route ?? null,
            "badge" => $this->badge ?? null,
            "color" => $this->color ?? null,
            "group" => $this->group ?? null,
        ]);
    }


    /**
     * @param string $label
     * @return $this
     */
    public function label(string $label): static
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @param string $label
     * @return $this
     */
    public function description(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param string $group
     * @return $this
     */
    public function group(string|array $group): static
    {
        $this->group = $group;
        return $this;
    }

    /**
     * @param string $icon
     * @return $this
     */
    public function icon(string $icon): static
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @param string $color
     * @return $this
     */
    public function color(string $color): static
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @param string $route
     * @return $this
     */
    public function route(string $route): static
    {
        $this->route = $route;
        return $this;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function url(string $url): static
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param string $target
     * @return $this
     */
    public function target(string $target): static
    {
        $this->target = $target;
        return $this;
    }

    /**
     * @param string $badge
     * @return $this
     */
    public function badge(string $badge): static
    {
        $this->badge = $badge;
        return $this;
    }
}
