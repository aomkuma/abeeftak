<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BreedingRecords Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Cows
 *
 * @method \App\Model\Entity\BreedingRecord get($primaryKey, $options = [])
 * @method \App\Model\Entity\BreedingRecord newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BreedingRecord[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BreedingRecord|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BreedingRecord patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BreedingRecord[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BreedingRecord findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BreedingRecordsTable extends Table
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

        $this->setTable('breeding_records');
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
            'foreignKey' => 'cow_id'
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
            ->date('breeding_date')
            ->requirePresence('breeding_date', 'create')
            ->notEmpty('breeding_date');

        $validator
            ->scalar('mother_code')
            ->requirePresence('mother_code', 'create')
            ->notEmpty('mother_code');

        $validator
            ->scalar('createdby')
            ->requirePresence('createdby', 'create')
            ->notEmpty('createdby');

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
