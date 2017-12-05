<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GrowthRecords Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Cows
 *
 * @method \App\Model\Entity\GrowthRecord get($primaryKey, $options = [])
 * @method \App\Model\Entity\GrowthRecord newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GrowthRecord[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GrowthRecord|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GrowthRecord patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GrowthRecord[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GrowthRecord findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GrowthRecordsTable extends Table
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

        $this->setTable('growth_records');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

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
            ->scalar('type')
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->date('record_date')
            ->allowEmpty('record_date');

        $validator
            ->scalar('age')
            ->allowEmpty('age');

        $validator
            ->decimal('weight')
            ->allowEmpty('weight');

        $validator
            ->decimal('chest')
            ->allowEmpty('chest');

        $validator
            ->decimal('height')
            ->allowEmpty('height');

        $validator
            ->decimal('length')
            ->allowEmpty('length');

        $validator
            ->decimal('growth_stat')
            ->allowEmpty('growth_stat');

        $validator
            ->scalar('food_type')
            ->allowEmpty('food_type');

        $validator
            ->scalar('total_eating')
            ->allowEmpty('total_eating');

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
