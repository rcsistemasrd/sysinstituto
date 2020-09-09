<?php

namespace App\Models;

class Menu extends Model
{
    protected $table = 'MENU';

    public function scopeByIds($builder, $menu_ids)
    {
        return $builder->whereIn('men_codigo', $menu_ids)->where([
            'men_estatu' => 'A',
            'men_web' => 'S',
        ])->orderBy('men_order', 'asc');
    }
}
