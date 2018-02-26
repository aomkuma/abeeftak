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
 * @property \App\Model\Table\ImagesTable|\Cake\ORM\Association\BelongsTo $Images
 * @property \App\Model\Table\FarmHerdsmansTable|\Cake\ORM\Association\HasMany $FarmHerdsmans
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
 */
class HerdsmansTable extends Table
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

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'created' => 'new',
                    'updated' => 'always',
                ]
            ]
        ]);

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
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('code')
            ->maxLength('code', 5)
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->scalar('aac_code')
            ->maxLength('aac_code', 6)
            ->allowEmpty('aac_code');

        $validator
            ->scalar('amc_code')
            ->maxLength('amc_code', 6)
            ->allowEmpty('amc_code');

        $validator
            ->integer('grade')
            ->requirePresence('grade', 'create')
            ->notEmpty('grade');

        $validator
            ->scalar('title')
            ->maxLength('title', 10)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('firstname')
            ->maxLength('firstname', 50)
            ->requirePresence('firstname', 'create')
            ->notEmpty('firstname');

        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 50)
            ->requirePresence('lastname', 'create')
            ->notEmpty('lastname');

        $validator
            ->scalar('idcard')
            ->maxLength('idcard', 13)
            ->requirePresence('idcard', 'create')
            ->notEmpty('idcard');

        $validator
            ->date('birthday')
            ->allowEmpty('birthday');

        $validator
            ->scalar('account_number1')
            ->maxLength('account_number1', 12)
            ->allowEmpty('account_number1');

        $validator
            ->scalar('account_number2')
            ->maxLength('account_number2', 12)
            ->allowEmpty('account_number2');

        $validator
            ->date('registerdate')
            ->requirePresence('registerdate', 'create')
            ->notEmpty('registerdate');

        $validator
            ->scalar('isactive')
            ->requirePresence('isactive', 'create')
            ->notEmpty('isactive');

        $validator
            ->scalar('mobile')
            ->maxLength('mobile', 50)
            ->allowEmpty('mobile');

        $validator
            ->email('email')
            ->allowEmpty('email');

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

        $validator
            ->scalar('isapproved')
            ->allowEmpty('isapproved');

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
        $rules->add($rules->existsIn(['image_id'], 'Images'));

        return $rules;
    }
}
