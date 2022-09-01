<?php

namespace OopDesign\TaskTen;



class Normalizer
{
    public function normalize(array $cities)
    {
        return collect($cities)
            ->map(fn($values) => array_map(fn($value) => trim(strtolower($value)), $values))
            ->unique()
            ->groupBy("country")
            ->map(fn($values) => collect($values)->map(fn($value) => $value['name'])->all())
            ->map(fn($values) => collect($values)->sort()->values()->all())
            ->sortKeys()
            ->all();
    }
}

/**
 * function normalize($raw)
{
return collect($raw)
->map(fn($value) =>
array_map(fn($item) =>
mb_strtolower($item), $value))
->map(fn($value) =>
array_map(fn($item) =>
trim($item), $value))
->mapToGroups(fn($item) =>
[$item['country'] => $item['name']])
->map(fn($cities) =>
$cities->unique()->sort()->values())
->sortKeys()
->toArray();
}
 */