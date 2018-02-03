<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Addresses Model
 *
 * @property \App\Model\Table\ProvincesTable|\Cake\ORM\Association\BelongsTo $Provinces
 * @property \App\Model\Table\FarmsTable|\Cake\ORM\Association\HasMany $Farms
 * @property \App\Model\Table\HerdsmansTable|\Cake\ORM\Association\HasMany $Herdsmans
 *
 * @method \App\Model\Entity\Address get($primaryKey, $options = [])
 * @method \App\Model\Entity\Address newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Address[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Address|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Address patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Address[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Address findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AddressesTable extends Table
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

        $this->setTable('addresses');
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

        $this->belongsTo('Provinces', [
            'foreignKey' => 'province_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Farms', [
            'foreignKey' => 'address_id'
        ]);
        $this->hasMany('Herdsmans', [
            'foreignKey' => 'address_id'
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
            ->scalar('address_line')
            ->allowEmpty('address_line');

        $validator
            ->scalar('houseno')
            ->requirePresence('houseno', 'create')
            ->notEmpty('houseno');

        $validator
            ->scalar('villageno')
            ->requirePresence('villageno', 'create')
            ->notEmpty('villageno');

        $validator
            ->scalar('villagename')
            ->allowEmpty('villagename');

        $validator
            ->scalar('subdistrict')
            ->requirePresence('subdistrict', 'create')
            ->notEmpty('subdistrict');

        $validator
            ->scalar('district')
            ->requirePresence('district', 'create')
            ->notEmpty('district');

        $validator
            ->scalar('postalcode')
            ->requirePresence('postalcode', 'create')
            ->notEmpty('postalcode');

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
        $rules->add($rules->existsIn(['province_id'], 'Provinces'));

        return $rules;
    }
}
