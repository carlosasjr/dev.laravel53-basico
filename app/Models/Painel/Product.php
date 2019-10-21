<?php
namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes; //filtra apenas campo não deletados

    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'number', 'active', 'category', 'description'
    ];
    //protected $guarded = ['admin'];
}