<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bookings Model
 *
 * @method \App\Model\Entity\Booking get($primaryKey, $options = [])
 * @method \App\Model\Entity\Booking newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Booking[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Booking|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Booking patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Booking[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Booking findOrCreate($search, callable $callback = null)
 */
class BookingsTable extends Table
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

        $this->table('bookings');
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
        $validator = new Validator();
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
            ->notEmpty('email', 'Please enter an email');

        $validator
            ->notEmpty('email')
            ->add('email', [
                'compare' => [
                    'rule' => ['compareWith', 'confirm_email'],
                    'message' => 'Your emails do not match!'
                ]
            ]);

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
            ->notEmpty('consultant', 'Please select a consultant');

        $validator
            ->notEmpty('visatype');
        $validator
            ->notEmpty('start');
        $validator
            ->notEmpty('end');

        $validator
        ->requirePresence('reason', 'create')
        ->notEmpty('reason', 'Please enter your reason')
        ->add('reason', [
            'minLength' => [
                'rule' => ['minLength', 2],
                'last' => true,
                'message' => 'Reason is too shor.'
            ],
            'maxLength' => [
                'rule' => ['maxLength', 300],
                'message' => 'Reason is too long.'
            ]
        ]);

        $validator
            ->notEmpty('status');
        $validator
                ->allowEmpty('validationCode');

        return $validator;
    }

//    public function beforeMarshal($event, $data, $options) {
//        debug($data);
//        if (isset($data['start'])&& isset($data['end'])){
//            $data['start'] = $this->dateFormatBeforeSave($data['start']);
//            $data['end'] = $this->dateFormatBeforeSave($data['end']);
//        }

//
//    }


    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
//    function dateFormatBeforeSave($dateString)
//{
//    $split = explode(" ",$dateString);;
//    $newDate = explode("-",$split[0]);
//    return $newDate[2]."-".$newDate[1]."-".$newDate[0]. ' ' . $split[1] .':00';
//}
}
