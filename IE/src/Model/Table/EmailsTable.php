<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Emails Model
 *
 * @method \App\Model\Entity\Email get($primaryKey, $options = [])
 * @method \App\Model\Entity\Email newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Email[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Email|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Email patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Email[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Email findOrCreate($search, callable $callback = null)
 */
class EmailsTable extends Table
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

        $this->table('emails');
        $this->displayField('id');
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
            ->allowEmpty('header')
            ->add('header', [
            'minLength' => [
                'rule' => ['minLength', 6],
                'last' => true,
                'message' => 'Category name is too short'
            ],
            'maxLength' => [
                'rule' => ['maxLength', 3000],
                'message' => 'Maximum: 3000 characters'
            ]
        ]);
        $validator
            ->allowEmpty('footer')
            ->add('footer', [
                'minLength' => [
                    'rule' => ['minLength', 6],
                    'last' => true,
                    'message' => 'Category name is too short'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 3000],
                    'message' => 'Maximum: 3000 characters'
                ]
            ]);
        $validator
            ->allowEmpty('top')
            ->add('top', [
                'minLength' => [
                    'rule' => ['minLength', 6],
                    'last' => true,
                    'message' => 'Category name is too short'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 3000],
                    'message' => 'Maximum: 3000 characters'
                ]
            ]);

        $validator
            ->allowEmpty('bottom')
            ->add('bottom', [
                'minLength' => [
                    'rule' => ['minLength', 6],
                    'last' => true,
                    'message' => 'Category name is too short'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 3000],
                    'message' => 'Maximum: 3000 characters'
                ]
            ]);

        $validator
            ->allowEmpty('content')
            ->add('content', [
                'minLength' => [
                    'rule' => ['minLength', 6],
                    'last' => true,
                    'message' => 'Category name is too short'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 3000],
                    'message' => 'Maximum: 3000 characters'
                ]
            ]);
        return $validator;
    }
}
