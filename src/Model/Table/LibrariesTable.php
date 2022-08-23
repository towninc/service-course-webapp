<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Libraries Model
 *
 * @method \App\Model\Entity\Library get($primaryKey, $options = [])
 * @method \App\Model\Entity\Library newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Library[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Library|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Library saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Library patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Library[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Library findOrCreate($search, callable $callback = null, $options = [])
 */
class LibrariesTable extends Table
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

        $this->setTable('libraries');
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
            ->maxLength('name', 20)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('category')
            ->maxLength('category', 20)
            ->requirePresence('category', 'create')
            ->allowEmptyString('category', false);

        $validator
            ->scalar('address')
            ->maxLength('address', 100)
            ->requirePresence('address', 'create')
            ->allowEmptyString('address', false);

        $validator
            ->numeric('latitude')
            ->requirePresence('latitude', 'create')
            ->allowEmptyString('latitude', false);

        $validator
            ->numeric('longitude')
            ->requirePresence('longitude', 'create')
            ->allowEmptyString('longitude', false);

        return $validator;
    }
}
