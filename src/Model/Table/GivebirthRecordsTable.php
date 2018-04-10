<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Givebirthrecords Model
 *
 * @property \App\Model\Table\CowsTable|\Cake\ORM\Association\BelongsTo $Cows
 *
 * @method \App\Model\Entity\Givebirthrecord get($primaryKey, $options = [])
 * @method \App\Model\Entity\Givebirthrecord newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Givebirthrecord[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Givebirthrecord|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Givebirthrecord patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Givebirthrecord[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Givebirthrecord findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GivebirthrecordsTable extends Table
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

        $this->setTable('givebirth_records');
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
            ->date('breeding_date')
            ->requirePresence('breeding_date', 'create')
            ->notEmpty('breeding_date');

        $validator
            ->scalar('father_code')
            ->maxLength('father_code', 20)
            ->requirePresence('father_code', 'create')
            ->notEmpty('father_code');

        $validator
            ->scalar('authorities')
            ->maxLength('authorities', 100)
            ->requirePresence('authorities', 'create')
            ->notEmpty('authorities');

        $validator
            ->scalar('breeding_status')
            ->requirePresence('breeding_status', 'create')
            ->notEmpty('breeding_status');

        $validator
            ->scalar('breeding_type')
            ->requirePresence('breeding_type', 'create')
            ->notEmpty('breeding_type');

        $validator
            ->scalar('createdby')
            ->maxLength('createdby', 100)
            ->requirePresence('createdby', 'create')
            ->notEmpty('createdby');

        $validator
            ->scalar('updatedby')
            ->maxLength('updatedby', 100)
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
