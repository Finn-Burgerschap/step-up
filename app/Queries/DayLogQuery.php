<?php

namespace App\Queries;

use Illuminate\Database\Eloquent\Builder;

class DayLogQuery extends Builder
{
    public function whereDateToday(): static
    {
        return $this->where('date', today());
    }
}
