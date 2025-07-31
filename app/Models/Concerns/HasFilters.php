<?php

namespace App\Models\Concerns;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

trait HasFilters
{
    public function scopeFilter(Builder $query, Request $request): Builder
    {
        $fromNested = $request->query('filter', []);
        $all = $request->query();

        //campos reservados que não vão ser considerados como filtros.
        $reserved = ['page', 'per_page', 'sort', 'order', 'filter'];

        $allowed = property_exists($this, 'filterable') ? $this->filterable : [];

        $filters = [];

        foreach ($fromNested as $key => $value) {
            if (!in_array($key, $allowed, true) || $value === null || $value === '') {
                continue;
            }

            $filters[$key] = $value;
        }

        foreach ($all as $key => $value) {
            if (in_array($key, $reserved, true)) {
                continue;
            }

            if (!in_array($key, $allowed, true) || $value === null || $value === '') {
                continue;
            }

            if (!array_key_exists($key, $filters)) {
                $filters[$key] = $value;
            }
        }

        foreach ($filters as $key => $vlaue) {
            if ($key === 'created_from') {
                $query->whereDate('created_at', '>=', $value);
            } elseif ($key === 'created_to') {
                $query->whereDate('created_at', '<=', $value);
            } else if (str_ends_with($key, '_like')) {
                $column = substr($key, 0, -5);
                if (in_array($column, $allowed, true)) {
                    $query->where($column, 'LIKE', "%{$value}%");
                }
            } else {
                $query->where($key, $value);
            }
        }

        return $query;
    }
}
