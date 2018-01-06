<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Controllers Model
 *
 * @property \App\Model\Table\ActionsTable|\Cake\ORM\Association\HasMany $Actions
 *
 * @method \App\Model\Entity\Controller get($primaryKey, $options = [])
 * @method \App\Model\Entity\Controller newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Controller[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Controller|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Controller patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Controller[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Controller findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ControllersTable extends Table
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

        $this->setTable('controllers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Actions', [
            'foreignKey' => 'controller_id'
        ]);
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
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('value')
            ->requirePresence('value', 'create')
            ->notEmpty('value');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->scalar('createdby')
            ->requirePresence('createdby', 'create')
            ->notEmpty('createdby');

        $validator
            ->scalar('updatedby')
            ->allowEmpty('updatedby');

        return $validator;
    }
}
