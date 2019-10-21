<?php

namespace App;

use App\Models\Painel\Location;
use App\Models\Painel\Product;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Recuperar os dados vinculados ao usuário da tabela location
    //Relacionamento One to One - Um para Um
    public function location()
    {
        return $this->hasOne(Location::class, 'user_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
