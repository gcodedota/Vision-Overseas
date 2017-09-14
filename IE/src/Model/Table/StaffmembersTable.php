<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Staffmembers Model
 *
 * @method \App\Model\Entity\Staffmember get($primaryKey, $options = [])
 * @method \App\Model\Entity\Staffmember newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Staffmember[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Staffmember|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Staffmember patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Staffmember[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Staffmember findOrCreate($search, callable $callback = null)
 */
class StaffmembersTable extends Table
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

        $this->table('staffmembers');
        $this->displayField('name');
        $this->primaryKey('id');
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
            ->allowEmpty('name');

        $validator
            ->allowEmpty('position');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->integer('phone', 'Phone number is invalid')
            ->requirePresence('phone', 'create')
            ->notEmpty('phone', 'Please enter your phone number')
            ->add('phone', [
                'minLength' => [
                    'rule' => ['minLength', 10],
                    'last' => true,
                    'message' => 'Phone number must be 10 digits long.'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 10],
                    'message' => 'Phone number must be 10 digits long.'
                ]
            ]);
        $validator
            ->notEmpty('description', 'Please enter the description')
            ->add('description', [
                'minLength' => [
                    'rule' => ['minLength', 10],
                    'last' => true,
                    'message' => 'description number must be at least 10 digits long.'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 500],
                    'message' => 'description number must be 500 digits long maximum.'
                ]
            ]);
        $validator
            ->allowEmpty('image');

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

        return $rules;
    }
}