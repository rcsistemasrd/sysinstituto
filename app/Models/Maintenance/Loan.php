<?php

namespace App\Models\Maintenance;

use App\Models\Model;
use Illuminate\Database\Eloquent\Builder;

class Loan extends Model
{
    protected $table = 'premaest';

    protected $primaryKey = 'pre_codigo';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('pre_estado', function (Builder $builder) {
            $builder->where('pre_estado', 'D');
        });

        static::addGlobalScope('pre_cia', function (Builder $builder) {
            $builder->where('pre_cia', auth()->user()->usr_cia);
        });

        // static::addGlobalScope('order_by', function (Builder $builder) {
        //     $builder->orderBy('pre_codigo', 'asc');
        // });
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'pre_codcli')->withoutGlobalScope('cli_status');
    }

    public function quotas()
    {
        return $this->hasMany(Quota::class, 'cuo_codpre');
    }

    public function getCurrentPendingQuota()
    {
        return $this->quotas->where('cuo_estado', 'P')->first()->getTotalQuota();
    }

    public function getAmountToPay()
    {
        $quotas = $this->quotas->where('cuo_vence', '<=', now()->format('Y-m-d'));

        return $quotas->sum('cuo_salcap') + $quotas->sum('cuo_salint') + $this->getQuotaLatePay();
    }

    //mora
    public function getQuotaLatePay()
    {
        return $this->quotas->sum('cuo_saldom');
    }

    public function currency()
    {
        return $this->belongsTo(TableCode::class, 'pre_codmon')->currencies()->withoutGlobalScope('tab_estado');
    }

    public function periodicity()
    {
        return $this->belongsTo(TableCode::class, 'pre_formap')->periodicities()->withoutGlobalScope('tab_estado');
    }

    public function scopeCode(Builder $builder, $code)
    {
        return $builder->where('pre_codigo', $code);
    }
}
