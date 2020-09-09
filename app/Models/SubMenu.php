<?php

namespace App\Models;

class SubMenu extends Model
{
    protected $table = 'SUBMENU';

    public function scopeByIds($builder, $menu_id, $submenu_ids)
    {
        return $builder->where('sub_codmen', $menu_id)->whereIn('sub_codigo', $submenu_ids)->where([
            'sub_estatu' => 'A',
            'sub_web' => 'S',
        ])->orderBy('sub_order', 'asc');
    }
}
