<?php

namespace App\Models\Maintenance;

use App\Models\Model;
use Illuminate\Database\Eloquent\Builder;

class TableCode extends Model
{
    protected $table = 'precodtab';

    protected $primaryKey = 'tab_codigo';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('tab_estado', function (Builder $builder) {
            $builder->where('tab_estado', 'A');
        });

        static::addGlobalScope('tab_cia', function (Builder $builder) {
            $builder->where('tab_cia', auth()->user()->usr_cia);
        });

        static::addGlobalScope('order_by', function (Builder $builder) {
            $builder->orderBy('tab_codigo', 'asc');
        });
    }

    public function scopeZones(Builder $builder)
    {
        return $builder->where('tab_codtab', 24);
    }

    public function scopeIdentificationTypes(Builder $builder)
    {
        return $builder->where('tab_codtab', 23);
    }

    public function scopePeriodicities(Builder $builder)
    {
        return $builder->where('tab_codtab', 1);
    }

    public function scopePaymentMethods(Builder $builder)
    {
        return $builder->where('tab_codtab', 2);
    }

    public function scopeCurrencies(Builder $builder)
    {
        return $builder->where('tab_codtab', 30);
    }

    public static function getToSelect($type)
    {
        return static::$type()->get()->mapWithKeys(function ($item) {
            return [$item->tab_codigo => $item->tab_descri];
        });
    }
}
