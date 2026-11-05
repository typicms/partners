<?php

declare(strict_types=1);

namespace TypiCMS\Modules\Partners\Composers;

use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use TypiCMS\Modules\Sidebar\SidebarGroup;
use TypiCMS\Modules\Sidebar\SidebarItem;
use TypiCMS\Modules\Sidebar\SidebarManager;

class SidebarViewComposer
{
    public function compose(View $view): void
    {
        $sidebar = $view->offsetGet('sidebar');

        if (! $sidebar instanceof SidebarManager) {
            return;
        }

        if (Gate::denies('read partners')) {
            return;
        }

        $sidebar->group(
            __(config()->string('typicms.modules.partners.sidebar.group', 'Content')),
            function (SidebarGroup $group): void {
                $group->id = 'content';
                $group->weight = 30;
                $group->addItem(
                    __(config()->string('typicms.modules.partners.sidebar.label', 'Partners')),
                    function (SidebarItem $item): void {
                        $item->id = 'partners';
                        $item->icon = config()->string('typicms.modules.partners.sidebar.icon');
                        $item->weight = config()->integer('typicms.modules.partners.sidebar.weight');
                        $item->route('admin::index-partners');
                    },
                );
            },
        );
    }
}
