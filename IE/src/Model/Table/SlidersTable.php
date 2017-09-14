<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sliders Model
 *
 * @method \App\Model\Entity\Slider get($primaryKey, $options = [])
 * @method \App\Model\Entity\Slider newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Slider[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Slider|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Slider patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Slider[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Slider findOrCreate($search, callable $callback = null)
 */
class SlidersTable extends Table
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

        $this->table('sliders');
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
            ->allowEmpty('image');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('path');

        return $validator;
    }
}
