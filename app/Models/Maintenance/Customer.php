<?php

namespace App\Models\Maintenance;

use App\Models\Model;
use Illuminate\Database\Eloquent\Builder;

class Customer extends Model
{
    protected $table = 'preclien';

    protected $primaryKey = 'cli_codigo';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('cli_status', function (Builder $builder) {
            $builder->where('cli_status', 'A');
        });

        static::addGlobalScope('cli_cia', function (Builder $builder) {
            $builder->where('cli_cia', auth()->user()->usr_cia);
        });

        // static::addGlobalScope('order_by', function (Builder $builder) {
        //     $builder->orderBy('cli_codigo', 'asc');
        // });
    }

    public function scopeCode(Builder $builder, $code)
    {
        return $builder->where('cli_codigo', $code);
    }

    public function identificationType()
    {
        return $this->belongsTo(TableCode::class, 'cli_tipoid', 'tab_codext')->identificationTypes()->withoutGlobalScope('tab_estado');
    }

    public function getFullNameAttribute()
    {
        return $this->cli_nombre . ' ' . $this->cli_apelli;
    }
}
