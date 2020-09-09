<?php

namespace App\Models\Maintenance;

use App\Models\Model;
use Illuminate\Database\Eloquent\Builder;

class LoanType extends Model
{
    protected $table = 'pretipo';

    protected $primaryKey = 'tip_codpro';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('tip_activo', function (Builder $builder) {
            $builder->where('tip_activo', 'A');
        });

        static::addGlobalScope('tip_cia', function (Builder $builder) {
            $builder->where('tip_cia', auth()->user()->usr_cia);
        });
    }

    public static function getToSelect()
    {
        return static::get()->mapWithKeys(function ($item) {
            return [$item->tip_codigo => $item->tip_descri];
        });
    }
}
