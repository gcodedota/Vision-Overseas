<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Calendars Model
 *
 * @method \App\Model\Entity\Calendar get($primaryKey, $options = [])
 * @method \App\Model\Entity\Calendar newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Calendar[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Calendar|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Calendar patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Calendar[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Calendar findOrCreate($search, callable $callback = null)
 */
class CalendarsTable extends Table
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

        $this->table('calendars');
        $this->displayField('longName');
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
            ->requirePresence('shortName', 'create')
            ->notEmpty('shortName', 'Please enter your name');

        $validator
            ->requirePresence('longName', 'create')
            ->notEmpty('longName', 'Please enter your name');

        $validator
            ->notEmpty('calendarAPI', 'Please enter the calendar API');

        $validator
            ->requirePresence('calendarID', 'create')
            ->notEmpty('calendarID', 'please enter the calendar ID');

        return $validator;
    }
}
