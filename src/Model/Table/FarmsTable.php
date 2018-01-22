<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Farms Model
 *
 * @property \App\Model\Table\AddressesTable|\Cake\ORM\Association\BelongsTo $Addresses
 * @property \App\Model\Table\FarmCowsTable|\Cake\ORM\Association\HasMany $FarmCows
 * @property \App\Model\Table\FarmHerdsmansTable|\Cake\ORM\Association\HasMany $FarmHerdsmans
 *
 * @method \App\Model\Entity\Farm get($primaryKey, $options = [])
 * @method \App\Model\Entity\Farm newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Farm[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Farm|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Farm patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Farm[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Farm findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FarmsTable extends Table
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

        $this->setTable('farms');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Addresses', [
            'foreignKey' => 'address_id'
        ]);
        $this->hasMany('FarmCows', [
            'foreignKey' => 'farm_id'
        ]);
        $this->hasMany('FarmHerdsmans', [
            'foreignKey' => 'farm_id'
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
            ->scalar('level')
            ->allowEmpty('level');

        $validator
            ->scalar('type')
            ->allowEmpty('type');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->uuid('location_image')
            ->allowEmpty('location_image');

        $validator
            ->scalar('latitude')
            ->allowEmpty('latitude');

        $validator
            ->scalar('longitude')
            ->allowEmpty('longitude');

        $validator
            ->scalar('hasstable')
            ->requirePresence('hasstable', 'create')
            ->notEmpty('hasstable');

        $validator
            ->integer('total_stable')
            ->allowEmpty('total_stable');

        $validator
            ->integer('total_cow_capacity')
            ->allowEmpty('total_cow_capacity');

        $validator
            ->scalar('hasmeadow')
            ->requirePresence('hasmeadow', 'create')
            ->notEmpty('hasmeadow');

        $validator
            ->integer('total_meadow')
            ->allowEmpty('total_meadow');

        $validator
            ->scalar('total_space')
            ->allowEmpty('total_space');

        $validator
            ->scalar('grass_species')
            ->allowEmpty('grass_species');

        $validator
            ->scalar('water_body')
            ->allowEmpty('water_body');

        $validator
            ->scalar('dung_destroy')
            ->allowEmpty('dung_destroy');

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
        $rules->add($rules->existsIn(['address_id'], 'Addresses'));

        return $rules;
    }
}
