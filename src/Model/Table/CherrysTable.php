<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cherrys Model
 *
 * @method \App\Model\Entity\Cherry get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cherry newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cherry[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cherry|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cherry saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cherry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cherry[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cherry findOrCreate($search, callable $callback = null, $options = [])
 */
class CherrysTable extends Table
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

        $this->setTable('cherrys');
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
            ->maxLength('name', 13)
            ->allowEmptyString('name');

        $validator
            ->scalar('yomi_name')
            ->maxLength('yomi_name', 24)
            ->allowEmptyString('yomi_name');

        $validator
            ->scalar('pref')
            ->maxLength('pref', 4)
            ->allowEmptyString('pref');

        $validator
            ->scalar('city')
            ->maxLength('city', 11)
            ->allowEmptyString('city');

        $validator
            ->decimal('lat')
            ->allowEmptyString('lat');

        $validator
            ->decimal('long')
            ->allowEmptyString('long');

        return $validator;
    }
}
