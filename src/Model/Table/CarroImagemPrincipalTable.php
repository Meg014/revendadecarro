<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CarroImagemPrincipal Model
 *
 * @property \App\Model\Table\CarrosTable&\Cake\ORM\Association\BelongsTo $Carros
 *
 * @method \App\Model\Entity\CarroImagemPrincipal newEmptyEntity()
 * @method \App\Model\Entity\CarroImagemPrincipal newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CarroImagemPrincipal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CarroImagemPrincipal get($primaryKey, $options = [])
 * @method \App\Model\Entity\CarroImagemPrincipal findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CarroImagemPrincipal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CarroImagemPrincipal[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CarroImagemPrincipal|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CarroImagemPrincipal saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CarroImagemPrincipal[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CarroImagemPrincipal[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CarroImagemPrincipal[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CarroImagemPrincipal[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CarroImagemPrincipalTable extends Table
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

        $this->setTable('carro_imagem_principal');
        $this->setDisplayField('caminho');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Carros', [
            'foreignKey' => 'carro_id',
            'joinType' => 'INNER',
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
            ->integer('carro_id')
            ->notEmptyString('carro_id');

        $validator
            ->scalar('caminho')
            ->maxLength('caminho', 255)
            ->requirePresence('caminho', 'create')
            ->notEmptyString('caminho');

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
        $rules->add($rules->existsIn('carro_id', 'Carros'), ['errorField' => 'carro_id']);

        return $rules;
    }
}
