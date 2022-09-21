<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bicycles Model
 *
 * @method \App\Model\Entity\Bicycle get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bicycle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bicycle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bicycle|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bicycle saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bicycle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bicycle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bicycle findOrCreate($search, callable $callback = null, $options = [])
 */
class BicyclesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('bicycles');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('location')
            ->maxLength('location', 255)
            ->requirePresence('location', 'create')
            ->allowEmptyString('location', false);

        $validator
            ->numeric('latitude')
            ->allowEmptyString('latitude');

        $validator
            ->numeric('longitude')
            ->allowEmptyString('longitude');

        $validator
            ->scalar('utilization_time')
            ->maxLength('utilization_time', 255)
            ->requirePresence('utilization_time', 'create')
            ->allowEmptyString('utilization_time', false);

        $validator
            ->scalar('price_per_day')
            ->maxLength('price_per_day', 255)
            ->requirePresence('price_per_day', 'create')
            ->allowEmptyString('price_per_day', false);

        $validator
            ->scalar('phone_number')
            ->maxLength('phone_number', 255)
            ->requirePresence('phone_number', 'create')
            ->allowEmptyString('phone_number', false);

        $validator
            ->integer('capacity')
            ->allowEmptyString('capacity');

        $validator
            ->scalar('url')
            ->maxLength('url', 255)
            ->requirePresence('url', 'create')
            ->allowEmptyString('url', false);

        return $validator;
    }
}
