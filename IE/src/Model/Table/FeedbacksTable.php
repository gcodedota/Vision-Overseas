<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Feedbacks Model
 *
 * @method \App\Model\Entity\Feedback get($primaryKey, $options = [])
 * @method \App\Model\Entity\Feedback newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Feedback[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Feedback|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Feedback patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Feedback[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Feedback findOrCreate($search, callable $callback = null)
 */
class FeedbacksTable extends Table
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

        $this->table('feedbacks');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'time' => 'new'
                ]
            ]
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
            ->requirePresence('name', 'create')
            ->notEmpty('name', 'Please enter your name')
            ->add('name', [
            'length' => [
                'rule' => ['minLength', 2],
                'message' => 'Minimum length: 2 characters',
            ]
        ]);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email', 'Please enter your email');

        $validator
            ->requirePresence('content', 'create')
            ->notEmpty('content', 'Please provide the feedback')
            ->add('content', [
                'minLength' => [
                    'rule' => ['minLength', 4],
                    'last' => true,
                    'message' => 'content too short'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 200],
                    'message' => 'Maximum: 200 characters'
                ]
            ]);

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->dateTime('time')
            ->allowEmpty('time');

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
 //       $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
