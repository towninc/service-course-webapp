<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Medicines Model
 *
 * @method \App\Model\Entity\Medicine get($primaryKey, $options = [])
 * @method \App\Model\Entity\Medicine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Medicine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Medicine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Medicine saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Medicine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Medicine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Medicine findOrCreate($search, callable $callback = null, $options = [])
 */
class MedicinesTable extends Table
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

        $this->setTable('medicines');
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
            ->allowEmptyString('name');

        $validator
            ->scalar('location')
            ->maxLength('location', 255)
            ->allowEmptyString('location');

        $validator
            ->allowEmptyString('latitude');

        $validator
            ->allowEmptyString('longitude');

        return $validator;
    }
}
