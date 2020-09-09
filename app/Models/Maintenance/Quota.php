<?php

namespace App\Models\Maintenance;

use App\Models\Model;
use Illuminate\Database\Eloquent\Builder;

class Quota extends Model
{
    protected $table = 'precuota';

    protected $primaryKey = 'pre_codigo';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('cuo_cia', function (Builder $builder) {
            $builder->where('cuo_cia', auth()->user()->usr_cia);
        });

        static::addGlobalScope('order_by', function (Builder $builder) {
            $builder->orderBy('cuo_numero', 'asc');
        });
    }

    public function loan()
    {
        return $this->belongsTo(Loan::class, 'cuo_codpre')->withoutGlobalScope('cli_status');
    }

    public function scopePaid(Builder $builder)
    {
        return $builder->where('cuo_estado', 'C');
    }

    public function scopePending(Builder $builder)
    {
        return $builder->where('cuo_estado', 'P');
    }

    public function isPending()
    {
        return $this->cuo_estado == 'P';
    }

    public function isPaid()
    {
        return $this->cuo_estado == 'C';
    }

    public function getTotalQuota()
    {
        return $this->cuo_salcap + $this->cuo_salint + $this->cuo_saldom;
    }
}
