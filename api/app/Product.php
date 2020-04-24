<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_produto
 * @property int $id_categoria_produto
 * @property string $data_cadastro
 * @property string $nome_produto
 * @property float $valor_produto
 * @property TbCategoriaProduto $tbCategoriaProduto
 */
class Product extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tb_produto';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_produto';

    /**
     * @var boolean
     */
    public $timestamps = false;


    /**
     * @var array
     */
    protected $fillable = ['id_categoria_produto', 'data_cadastro', 'nome_produto', 'valor_produto'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tbCategoriaProduto()
    {
        return $this->belongsTo('App\Category', 'id_categoria_produto', 'id_categoria_planejamento');
    }
}
