<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CowImages Model
 *
 * @property \App\Model\Table\CowsTable|\Cake\ORM\Association\BelongsTo $Cows
 * @property \App\Model\Table\ImagesTable|\Cake\ORM\Association\BelongsTo $Images
 *
 * @method \App\Model\Entity\CowImage get($primaryKey, $options = [])
 * @method \App\Model\Entity\CowImage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CowImage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CowImage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CowImage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CowImage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CowImage findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CowImagesTable extends Table
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

        $this->setTable('cow_images');
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
        $this->belongsTo('Images', [
            'foreignKey' => 'image_id',
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
            ->scalar('createdby')
            ->requirePresence('createdby', 'create')
            ->notEmpty('createdby');

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
        $rules->add($rules->existsIn(['image_id'], 'Images'));

        return $rules;
    }
}
