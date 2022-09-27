<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sanctuaries Model
 *
 * @method \App\Model\Entity\Sanctuary get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sanctuary newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sanctuary[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sanctuary|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sanctuary saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sanctuary patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sanctuary[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sanctuary findOrCreate($search, callable $callback = null, $options = [])
 */
class SanctuariesTable extends Table
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

        $this->setTable('sanctuaries');
        $this->setDisplayField('title');
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
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->allowEmptyString('title', false);

        $validator
            ->integer('number')
            ->requirePresence('number', 'create')
            ->allowEmptyString('number', false);

        $validator
            ->scalar('place')
            ->maxLength('place', 255)
            ->requirePresence('place', 'create')
            ->allowEmptyString('place', false);

        $validator
            ->scalar('prefecture')
            ->maxLength('prefecture', 255)
            ->requirePresence('prefecture', 'create')
            ->allowEmptyString('prefecture', false);

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->requirePresence('address', 'create')
            ->allowEmptyString('address', false);

        $validator
            ->numeric('lat')
            ->requirePresence('lat', 'create')
            ->allowEmptyString('lat', false);

        $validator
            ->numeric('lng')
            ->requirePresence('lng', 'create')
            ->allowEmptyString('lng', false);

        return $validator;
    }
}
