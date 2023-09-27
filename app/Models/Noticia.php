<?php

namespace App\Models;

//use UploadableTrait;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'noticias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_usuario','titulo','autor','contenido','imagen','id_categoria'
    ];

    /*protected $uploadable = [
        'imagen' => [
            'folder' => 'posts',
            'name_column' => 'imagen'
          ]
      ];*/

     /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'id_categoria');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_usuario');
    }
}
