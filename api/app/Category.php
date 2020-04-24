<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_categoria_planejamento
 * @property string $nome_categoria
 * @property TbProduto[] $tbProdutos
 */
class Category extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tb_categoria_produto';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_categoria_planejamento';

    /**
     * @var boolean
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['nome_categoria'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tbProdutos()
    {
        return $this->hasMany('App\TbProduto', 'id_categoria_produto', 'id_categoria_planejamento');
    }
}
