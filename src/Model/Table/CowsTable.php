<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cows Model
 *
 * @property \App\Model\Table\CowBreedsTable|\Cake\ORM\Association\BelongsTo $CowBreeds
 * @property \App\Model\Table\CowImagesTable|\Cake\ORM\Association\HasMany $CowImages
 * @property \App\Model\Table\MovementRecordsTable|\Cake\ORM\Association\HasMany $MovementRecords
 * @property \App\Model\Table\TreatmentRecordsTable|\Cake\ORM\Association\HasMany $TreatmentRecords
 *
 * @method \App\Model\Entity\Cow get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cow newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cow[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cow|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cow patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cow[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cow findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CowsTable extends Table
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

        $this->setTable('cows');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CowBreeds', [
            'foreignKey' => 'cow_breed_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('CowImages', [
            'foreignKey' => 'cow_id'
        ]);
        $this->hasMany('MovementRecords', [
            'foreignKey' => 'cow_id'
        ]);
        $this->hasMany('TreatmentRecords', [
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
            ->scalar('code')
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->scalar('grade')
            ->requirePresence('grade', 'create')
            ->notEmpty('grade');

        $validator
            ->date('birthday')
            ->requirePresence('birthday', 'create')
            ->notEmpty('birthday');

        $validator
            ->scalar('gender')
            ->requirePresence('gender', 'create')
            ->notEmpty('gender');

        $validator
            ->scalar('isbreeder')
            ->requirePresence('isbreeder', 'create')
            ->notEmpty('isbreeder');

        $validator
            ->scalar('breeding')
            ->requirePresence('breeding', 'create')
            ->notEmpty('breeding');

        $validator
            ->scalar('father_code')
            ->allowEmpty('father_code');

        $validator
            ->scalar('mother_code')
            ->allowEmpty('mother_code');

        $validator
            ->scalar('origins')
            ->requirePresence('origins', 'create')
            ->notEmpty('origins');

        $validator
            ->date('import_date')
            ->allowEmpty('import_date');

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
        $rules->add($rules->existsIn(['cow_breed_id'], 'CowBreeds'));

        return $rules;
    }
}
