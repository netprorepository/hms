<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Medicines Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\MedicineCategoriesTable|\Cake\ORM\Association\HasMany $MedicineCategories
 *
 * @method \App\Model\Entity\Medicine get($primaryKey, $options = [])
 * @method \App\Model\Entity\Medicine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Medicine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Medicine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Medicine|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Medicine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Medicine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Medicine findOrCreate($search, callable $callback = null, $options = [])
 */
class MedicinesTable extends Table
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

        $this->setTable('medicines');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('MedicineCategories', [
            'foreignKey' => 'medicine_id'
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
            ->scalar('name')
            ->maxLength('name', 250)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 250)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->scalar('price')
            ->maxLength('price', 250)
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->scalar('manufacturing_company')
            ->maxLength('manufacturing_company', 250)
            ->requirePresence('manufacturing_company', 'create')
            ->notEmpty('manufacturing_company');

        $validator
            ->scalar('status')
            ->maxLength('status', 250)
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
