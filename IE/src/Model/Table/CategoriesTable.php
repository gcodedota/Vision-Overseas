<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Categories Model
 *
 * @property \Cake\ORM\Association\HasMany $Visas
 *
 * @method \App\Model\Entity\Category get($primaryKey, $options = [])
 * @method \App\Model\Entity\Category newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Category[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Category|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Category patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Category[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Category findOrCreate($search, callable $callback = null)
 */
class CategoriesTable extends Table
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

        $this->table('categories');
        $this->displayField('category');
        $this->primaryKey('id');

        $this->hasMany('Visas', [
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
            ->notEmpty('category', 'Please provide the category')
            ->add('category', [
                'minLength' => [
                    'rule' => ['minLength', 6],
                    'last' => true,
                    'message' => 'Category name is too short'
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
}
