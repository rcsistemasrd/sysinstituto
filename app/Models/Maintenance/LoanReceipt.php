<?php

namespace App\Models\Maintenance;

use App\Models\Model;
use Illuminate\Database\Eloquent\Builder;

class LoanReceipt extends Model
{
    protected $table = 'prerecib';

    protected $primaryKey = 'rec_numero';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('rec_estado', function (Builder $builder) {
            $builder->where('pre_estado', 'A');
        });

        static::addGlobalScope('rec_cia', function (Builder $builder) {
            $builder->where('pre_cia', auth()->user()->usr_cia);
        });

        // static::addGlobalScope('order_by', function (Builder $builder) {
        //     $builder->orderBy('pre_codigo', 'asc');
        // });
    }

    public function loan()
    {
        return $this->belongsTo(Loan::class, 'rec_codpre')->withoutGlobalScope('pre_estado');
    }
}
