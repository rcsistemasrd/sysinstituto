<?php

namespace App\Models\Maintenance;

use App\Models\Model;
use Illuminate\Database\Eloquent\Builder;

class IdentificationType extends Model
{
    protected $table = 'pretipoid';

    protected $primaryKey = 'tip_codigo';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('tip_estado', function (Builder $builder) {
            $builder->where('tip_estado', 'A');
        });
    }

    public static function getToSelect()
    {
        return static::get()->mapWithKeys(function ($item) {
            return [$item->tip_codigo => $item->tip_descri];
        });
    }
}
