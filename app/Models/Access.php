<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Access extends Model
{
    protected $table = 'MUEACCESOS';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('acc_estado', function (Builder $builder) {
            $builder->where('acc_estado', true);
        });
    }

    public function scopeByUserId($builder, $user_id)
    {
        return $builder->where([
            'acc_codusr' => $user_id,
        ]);
    }

    public static function getUserAccess($user_id)
    {		
        $access = self::byUserId($user_id)->get();

        $menus = Menu::byIds(static::getMenuIds($access))->get();

        $menus->each(function ($menu, $index) use ($access) {
            $menu->submenus = SubMenu::byIds($menu->men_codigo, static::getSubMenuIds($access, $menu->men_codigo))->get();
        });
		
        return $menus;
    }

    public static function getMenuIds($access)
    {
        return $access->pluck('acc_codmen')->unique()->values()->toArray();
    }

    public static function getSubMenuIds($access, $menu_id)
    {
        return $access->where('acc_codmen', $menu_id)->pluck('acc_codsub')->unique()->values()->toArray();
    }
}
