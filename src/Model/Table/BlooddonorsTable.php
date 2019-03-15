<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Blooddonors Model
 *
 * @property \App\Model\Table\NursesTable|\Cake\ORM\Association\BelongsTo $Nurses
 *
 * @method \App\Model\Entity\Blooddonor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Blooddonor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Blooddonor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Blooddonor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Blooddonor|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Blooddonor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Blooddonor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Blooddonor findOrCreate($search, callable $callback = null, $options = [])
 */
class BlooddonorsTable extends Table
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

        $this->setTable('blooddonors');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->scalar('blood_group')
            ->maxLength('blood_group', 250)
            ->requirePresence('blood_group', 'create')
            ->notEmpty('blood_group');

        $validator
            ->scalar('sex')
            ->maxLength('sex', 250)
            ->requirePresence('sex', 'create')
            ->notEmpty('sex');

        $validator
            ->integer('age')
            ->requirePresence('age', 'create')
            ->notEmpty('age');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 250)
            ->requirePresence('phone', 'create')
            ->notEmpty('phone');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('address')
            ->maxLength('address', 250)
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->dateTime('last_donation_timestamp')
            ->requirePresence('last_donation_timestamp', 'create')
            ->notEmpty('last_donation_timestamp');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
