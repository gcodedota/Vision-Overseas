<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Visas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Categories
 *
 * @method \App\Model\Entity\Visa get($primaryKey, $options = [])
 * @method \App\Model\Entity\Visa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Visa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Visa|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Visa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Visa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Visa findOrCreate($search, callable $callback = null)
 */
class VisasTable extends Table
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

        $this->table('visas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('visatype', 'create')
            ->notEmpty('visatype', 'Please provide the category')
            ->add('visatype', 'unique', ['rule' => 'validateUnique', 'provider' => 'table'])
            ->add('visatype', [
                'minLength' => [
                    'rule' => ['minLength', 6],
                    'last' => true,
                    'message' => 'visatype too short'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 30],
                    'message' => 'Maximum: 30 characters'
                ]
            ]);

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description', 'Description required')
            ->add('description', [
                'minLength' => [
                    'rule' => ['minLength', 6],
                    'last' => true,
                    'message' => 'Description too short'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 600],
                    'message' => 'Maximum: 600 characters'
                ]
            ]);

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
        $rules->add($rules->isUnique(['visatype']));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));

        return $rules;
    }
}
