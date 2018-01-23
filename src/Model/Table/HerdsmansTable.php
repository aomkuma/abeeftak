<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Herdsmans Model
 *
 * @property \App\Model\Table\AddressesTable|\Cake\ORM\Association\BelongsTo $Addresses
 * @property |\Cake\ORM\Association\BelongsTo $Images
 * @property |\Cake\ORM\Association\HasMany $FarmHerdsmans
 *
 * @method \App\Model\Entity\Herdsman get($primaryKey, $options = [])
 * @method \App\Model\Entity\Herdsman newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Herdsman[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Herdsman|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Herdsman patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Herdsman[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Herdsman findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class HerdsmansTable extends Table
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

        $this->setTable('herdsmans');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Addresses', [
            'foreignKey' => 'address_id'
        ]);
        $this->belongsTo('Images', [
            'foreignKey' => 'image_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('FarmHerdsmans', [
            'foreignKey' => 'herdsman_id'
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
            ->uuid('id')            ->allowEmpty('id', 'create');
        $validator
            ->scalar('code')            ->requirePresence('code', 'create')            ->notEmpty('code');
        $validator
            ->scalar('aac_code')            ->allowEmpty('aac_code');
        $validator
            ->scalar('amc_code')            ->allowEmpty('amc_code');
        $validator
            ->integer('grade')            ->requirePresence('grade', 'create')            ->notEmpty('grade');
        $validator
            ->scalar('title')            ->requirePresence('title', 'create')            ->notEmpty('title');
        $validator
            ->scalar('firstname')            ->requirePresence('firstname', 'create')            ->notEmpty('firstname');
        $validator
            ->scalar('lastname')            ->requirePresence('lastname', 'create')            ->notEmpty('lastname');
        $validator
            ->scalar('idcard')            ->requirePresence('idcard', 'create')            ->notEmpty('idcard');
        $validator
            ->date('birthday')            ->allowEmpty('birthday');
        $validator
            ->scalar('account_number1')            ->allowEmpty('account_number1');
        $validator
            ->scalar('account_number2')            ->allowEmpty('account_number2');
        $validator
            ->date('registerdate')            ->requirePresence('registerdate', 'create')            ->notEmpty('registerdate');
        $validator
            ->scalar('isactive')            ->requirePresence('isactive', 'create')            ->notEmpty('isactive');
        $validator
            ->scalar('mobile')            ->allowEmpty('mobile');
        $validator
            ->email('email')            ->allowEmpty('email');
        $validator
            ->scalar('description')            ->allowEmpty('description');
        $validator
            ->scalar('createdby')            ->requirePresence('createdby', 'create')            ->notEmpty('createdby');
        $validator
            ->scalar('updatedby')            ->allowEmpty('updatedby');
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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['address_id'], 'Addresses'));
        $rules->add($rules->existsIn(['image_id'], 'Images'));

        return $rules;
    }
}
