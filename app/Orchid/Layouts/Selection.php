<?php

namespace App\Orchid\Layouts;

use Orchid\Filters\Filter;
use Orchid\Screen\Layouts\Selection;

class Selection extends Selection
{
    /**
     * @return Filter[]
     */
    public function filters(): iterable
    {
        return [];
    }
}
