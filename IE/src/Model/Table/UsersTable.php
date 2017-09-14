<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null)
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('first_name');
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
        $validator = new Validator();
        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->alphaNumeric('username', 'Username must not contain special characters')
            ->notEmpty('username', 'Username required must be a minimum of 6 characters and maximum of 16 characters and must not contain special characters!')
            ->add('username', [
                'minLength' => [
                    'rule' => ['minLength', 6],
                    'last' => true,
                    'message' => 'Username must be a minimum of 6 characters.'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 16],
                    'message' => 'Username must be a maximum of 16 characters'
                ]
            ]);

        $validator
            ->notEmpty('password', 'Password required must be a minimum of 6 characters and maximum of 16 characters!')
            ->add('password', [
                'minLength' => [
                    'rule' => ['minLength', 6],
                    'last' => true,
                    'message' => 'Password must be a minimum of 6 characters.'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 16],
                    'message' => 'Password must be a maximum of 16 characters'
                ]
            ]);

        $validator
            ->notEmpty('password')
            ->add('password', [
                'compare' => [
                    'rule' => ['compareWith', 'confirm_password'],
                    'message' => 'Your passwords do not match!'
                ]
            ]);

        $validator
            ->notEmpty('first_name', 'First name must not be empty!')
            ->add('first_name', [
            'length' => [
                'rule' => ['minLength', 2],
                'message' => 'Minimum length: 2 characters',
            ]
        ]);
 //           ->add('first_name', [
 //               'charactersonly' => [
 //                   'rule' => array('custom', '[a-zA-Z]+'),
 //                   'message' => 'First name must not have a special character or use of numbers!']
 //           ]);

        $validator
            ->notEmpty('last_name', 'Last name must not be empty!')
            ->add('last_name', [
            'length' => [
                'rule' => ['minLength', 2],
                'message' => 'Minimum length: 2 characters',
            ]
        ]);
//           ->add('last_name', [
//               'charactersonly' => [
//                   'rule' => array('custom', '[a-zA-Z]+'),
//                   'message' => 'Last name must not have a special character or use of numbers!']
//           ]);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email', 'Please enter your email');

        $validator
            ->date('dob')
            ->allowEmpty('dob');

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
            ->requirePresence('level', 'create')
            ->notEmpty('level');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;

    }

    public function buildRules(RulesChecker $rules)
    {
        // cannot have same usernames
        $rules->add($rules->isUnique(['username'], 'This username is already in use.'));

        return $rules;
    }


}
