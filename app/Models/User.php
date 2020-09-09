<?php

namespace App\Models;

use App\Models\Maintenance\Branch;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'MUEUSER';

    protected $primaryKey = 'id';

    protected $hidden = [
        'usr_passwd',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('usr_estado', function (Builder $builder) {
            $builder->where('usr_estado', 'A');
        });
    }

    public function username()
    {
        return 'usr_usuari';
    }

    public function getAuthPassword()
    {
        return $this->usr_passwd;
    }

    public function getRememberTokenName()
    {
        return null;
    }

    public function branch()
    {
        return $this->hasOne(Branch::class, 'suc_codigo', 'usr_codsuc');
    }
}
