<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TreatmentRecords Model
 *
 * @property \App\Model\Table\CowsTable|\Cake\ORM\Association\BelongsTo $Cows
 *
 * @method \App\Model\Entity\TreatmentRecord get($primaryKey, $options = [])
 * @method \App\Model\Entity\TreatmentRecord newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TreatmentRecord[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TreatmentRecord|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TreatmentRecord patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TreatmentRecord[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TreatmentRecord findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TreatmentRecordsTable extends Table
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

        $this->setTable('treatment_records');
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
            ->date('treatment_date')
            ->requirePresence('treatment_date', 'create')
            ->notEmpty('treatment_date');

        $validator
            ->scalar('disease')
            ->requirePresence('disease', 'create')
            ->notEmpty('disease');

        $validator
            ->scalar('drug_used')
            ->allowEmpty('drug_used');

        $validator
            ->scalar('conservator')
            ->allowEmpty('conservator');

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
