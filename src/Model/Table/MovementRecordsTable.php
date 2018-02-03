<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MovementRecords Model
 *
 * @property \App\Model\Table\CowsTable|\Cake\ORM\Association\BelongsTo $Cows
 *
 * @method \App\Model\Entity\MovementRecord get($primaryKey, $options = [])
 * @method \App\Model\Entity\MovementRecord newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MovementRecord[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MovementRecord|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MovementRecord patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MovementRecord[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MovementRecord findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MovementRecordsTable extends Table
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

        $this->setTable('movement_records');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'created' => 'new',
                    'updated' => 'always',
                ]
            ]
        ]);

        $this->belongsTo('Cows', [
            'foreignKey' => 'cow_id',
            'joinType' => 'INNER'
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
            ->scalar('departure')
            ->requirePresence('departure', 'create')
            ->notEmpty('departure');

        $validator
            ->scalar('destination')
            ->requirePresence('destination', 'create')
            ->notEmpty('destination');

        $validator
            ->date('movement_date')
            ->requirePresence('movement_date', 'create')
            ->notEmpty('movement_date');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->scalar('createdby')
            ->allowEmpty('createdby');

        $validator
            ->scalar('updatedby')
            ->allowEmpty('updatedby');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['cow_id'], 'Cows'));

        return $rules;
    }
}
