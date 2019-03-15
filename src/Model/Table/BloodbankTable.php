<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bloodbank Model
 *
 * @property \App\Model\Table\AdminsTable|\Cake\ORM\Association\BelongsTo $Admins
 *
 * @method \App\Model\Entity\Bloodbank get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bloodbank newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bloodbank[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bloodbank|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bloodbank|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bloodbank patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bloodbank[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bloodbank findOrCreate($search, callable $callback = null, $options = [])
 */
class BloodbankTable extends Table
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

        $this->setTable('bloodbank');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Admins', [
            'foreignKey' => 'admin_id',
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
            ->scalar('blood_group')
            ->maxLength('blood_group', 250)
            ->requirePresence('blood_group', 'create')
            ->notEmpty('blood_group');

        $validator
            ->scalar('status')
            ->maxLength('status', 250)
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->dateTime('created_date')
            ->requirePresence('created_date', 'create')
            ->notEmpty('created_date');

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
        $rules->add($rules->existsIn(['admin_id'], 'Admins'));

        return $rules;
    }
}
