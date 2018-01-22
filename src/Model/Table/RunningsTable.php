<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Runnings Model
 *
 * @method \App\Model\Entity\Running get($primaryKey, $options = [])
 * @method \App\Model\Entity\Running newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Running[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Running|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Running patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Running[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Running findOrCreate($search, callable $callback = null, $options = [])
 */
class RunningsTable extends Table
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

        $this->setTable('runnings');
        $this->setDisplayField('id');
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('running_code')
            ->requirePresence('running_code', 'create')
            ->notEmpty('running_code');

        $validator
            ->integer('running_no')
            ->requirePresence('running_no', 'create')
            ->notEmpty('running_no');

        $validator
            ->date('runnubg_date')
            ->requirePresence('runnubg_date', 'create')
            ->notEmpty('runnubg_date');

        $validator
            ->scalar('running_type')
            ->requirePresence('running_type', 'create')
            ->notEmpty('running_type');

        return $validator;
    }
}
