<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CowBreeds Model
 *
 * @property \App\Model\Table\CowsTable|\Cake\ORM\Association\HasMany $Cows
 *
 * @method \App\Model\Entity\CowBreed get($primaryKey, $options = [])
 * @method \App\Model\Entity\CowBreed newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CowBreed[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CowBreed|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CowBreed patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CowBreed[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CowBreed findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CowBreedsTable extends Table
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

        $this->setTable('cow_breeds');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Cows', [
            'foreignKey' => 'cow_breed_id'
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
            ->scalar('createdby')
            ->requirePresence('createdby', 'create')
            ->notEmpty('createdby');

        $validator
            ->scalar('updatedby')
            ->allowEmpty('updatedby');

        return $validator;
    }
}
