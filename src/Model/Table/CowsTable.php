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
 * @property \App\Model\Table\BreedingRecordsTable|\Cake\ORM\Association\HasMany $BreedingRecords
 * @property \App\Model\Table\CowImagesTable|\Cake\ORM\Association\HasMany $CowImages
 * @property |\Cake\ORM\Association\HasMany $FarmCows
 * @property \App\Model\Table\GivebirthRecordsTable|\Cake\ORM\Association\HasMany $GivebirthRecords
 * @property \App\Model\Table\GrowthRecordsTable|\Cake\ORM\Association\HasMany $GrowthRecords
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

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'created' => 'new',
                    'updated' => 'always',
                ]
            ]
        ]);

        $this->belongsTo('CowBreeds', [
            'foreignKey' => 'cow_breed_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('BreedingRecords', [
            'foreignKey' => 'cow_id'
        ]);
        $this->hasMany('CowImages', [
            'foreignKey' => 'cow_id'
        ]);
        $this->hasMany('FarmCows', [
            'foreignKey' => 'cow_id'
        ]);
        $this->hasMany('GivebirthRecords', [
            'foreignKey' => 'cow_id'
        ]);
        $this->hasMany('GrowthRecords', [
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
            ->maxLength('code', 10)
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->scalar('grade')
            ->maxLength('grade', 50)
            ->requirePresence('grade', 'create')
            ->notEmpty('grade');

        $validator
            ->scalar('breed_level')
            ->maxLength('breed_level', 35)
            ->allowEmpty('breed_level');

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
            ->maxLength('father_code', 20)
            ->allowEmpty('father_code');

        $validator
            ->scalar('mother_code')
            ->maxLength('mother_code', 20)
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
            ->maxLength('description', 255)
            ->allowEmpty('description');

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
        $rules->add($rules->existsIn(['cow_breed_id'], 'CowBreeds'));

        return $rules;
    }
}
