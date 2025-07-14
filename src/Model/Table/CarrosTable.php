<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Carros Model
 *
 * @property \App\Model\Table\ExposicoesTable&\Cake\ORM\Association\BelongsTo $Exposicoes
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\MarcasTable&\Cake\ORM\Association\BelongsTo $Marcas
 * @property \App\Model\Table\ModelosTable&\Cake\ORM\Association\BelongsTo $Modelos
 * @property \App\Model\Table\CombustiveisTable&\Cake\ORM\Association\BelongsTo $Combustiveis
 * @property \App\Model\Table\TransmissoesTable&\Cake\ORM\Association\BelongsTo $Transmissoes
 * @property \App\Model\Table\CondicoesTable&\Cake\ORM\Association\BelongsTo $Condicoes
 * @property \App\Model\Table\CategoriasTable&\Cake\ORM\Association\BelongsTo $Categorias
 * @property \App\Model\Table\FeaturesTable&\Cake\ORM\Association\BelongsToMany $Features
 *
 * @method \App\Model\Entity\Carro newEmptyEntity()
 * @method \App\Model\Entity\Carro newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Carro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Carro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Carro findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Carro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Carro[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Carro|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Carro saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Carro[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Carro[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Carro[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Carro[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CarrosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('carros');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Exposicoes', [
            'foreignKey' => 'exposicao_id',
            'joinType' => 'LEFT',
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('Marcas', [
            'foreignKey' => 'marca_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Modelos', [
            'foreignKey' => 'modelo_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Combustiveis', [
            'foreignKey' => 'combustivel_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Transmissoes', [
            'foreignKey' => 'transmissao_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Condicoes', [
            'foreignKey' => 'condicao_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Categorias', [
            'foreignKey' => 'categoria_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Features', [
            'foreignKey' => 'carro_id',
            'targetForeignKey' => 'feature_id',
            'joinTable' => 'carros_features',
        ]);

        $this->hasMany('CarroImagens', [
            'foreignKey' => 'carro_id',
            'dependent' => true
        ]);

        $this->hasOne('CarroImagemPrincipal', [
            'foreignKey' => 'carro_id',
            'dependent' => true
        ]);

     
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('exposicao_id')
            ->notEmptyString('exposicao_id');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->integer('marca_id')
            ->notEmptyString('marca_id');

        $validator
            ->integer('modelo_id')
            ->notEmptyString('modelo_id');

        $validator
            ->integer('combustivel_id')
            ->notEmptyString('combustivel_id');

        $validator
            ->integer('transmissao_id')
            ->notEmptyString('transmissao_id');

        $validator
            ->integer('condicao_id')
            ->notEmptyString('condicao_id');

        $validator
            ->integer('categoria_id')
            ->notEmptyString('categoria_id');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 150)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('ano')
            ->requirePresence('ano', 'create')
            ->notEmptyString('ano');

        $validator
            ->integer('quilometragem')
            ->allowEmptyString('quilometragem');

        $validator
            ->scalar('cor_exterior')
            ->maxLength('cor_exterior', 40)
            ->allowEmptyString('cor_exterior');

        $validator
            ->scalar('cor_interior')
            ->maxLength('cor_interior', 40)
            ->allowEmptyString('cor_interior');

        $validator
            ->allowEmptyString('portas');

        $validator
            ->scalar('motor')
            ->maxLength('motor', 60)
            ->allowEmptyString('motor');

        $validator
            ->scalar('torque')
            ->maxLength('torque', 60)
            ->allowEmptyString('torque');

        $validator
            ->scalar('potencia')
            ->maxLength('potencia', 40)
            ->allowEmptyString('potencia');

        $validator
            ->scalar('velocidade_maxima')
            ->maxLength('velocidade_maxima', 40)
            ->allowEmptyString('velocidade_maxima');

        $validator
            ->scalar('tracao')
            ->maxLength('tracao', 60)
            ->allowEmptyString('tracao');

        $validator
            ->scalar('capacidade_reboque')
            ->maxLength('capacidade_reboque', 40)
            ->allowEmptyString('capacidade_reboque');

        $validator
            ->scalar('placa')
            ->maxLength('placa', 150)
            ->requirePresence('placa', 'create')
            ->notEmptyString('placa')
            ->add('placa', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('codigo_estoque')
            ->maxLength('codigo_estoque', 150)
            ->requirePresence('codigo_estoque', 'create')
            ->notEmptyString('codigo_estoque');

        $validator
            ->decimal('preco')
            ->notEmptyString('preco');

        $validator
            ->decimal('preco_promocional')
            ->allowEmptyString('preco_promocional');

        $validator
            ->scalar('descricao')
            ->allowEmptyString('descricao');

        $validator
            ->scalar('extras')
            ->allowEmptyString('extras');

        $validator
            ->scalar('observacoes')
            ->allowEmptyString('observacoes');

        $validator
            ->boolean('status')
            ->notEmptyString('status');

        $validator
            ->boolean('destaque')
            ->allowEmptyString('destaque');

        $validator
            ->integer('visualizacoes')
            ->allowEmptyString('visualizacoes');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['placa']), ['errorField' => 'placa']);
        $rules->add($rules->existsIn('exposicao_id', 'Exposicoes'), ['errorField' => 'exposicao_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('marca_id', 'Marcas'), ['errorField' => 'marca_id']);
        $rules->add($rules->existsIn('modelo_id', 'Modelos'), ['errorField' => 'modelo_id']);
        $rules->add($rules->existsIn('combustivel_id', 'Combustiveis'), ['errorField' => 'combustivel_id']);
        $rules->add($rules->existsIn('transmissao_id', 'Transmissoes'), ['errorField' => 'transmissao_id']);
        $rules->add($rules->existsIn('condicao_id', 'Condicoes'), ['errorField' => 'condicao_id']);
        $rules->add($rules->existsIn('categoria_id', 'Categorias'), ['errorField' => 'categoria_id']);

        return $rules;
    }
}
