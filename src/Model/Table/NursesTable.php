<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Nurses Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\BedallotmentsTable|\Cake\ORM\Association\HasMany $Bedallotments
 * @property \App\Model\Table\BedsTable|\Cake\ORM\Association\HasMany $Beds
 * @property \App\Model\Table\BlooddonorsTable|\Cake\ORM\Association\HasMany $Blooddonors
 *
 * @method \App\Model\Entity\Nurse get($primaryKey, $options = [])
 * @method \App\Model\Entity\Nurse newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Nurse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Nurse|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nurse|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nurse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Nurse[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Nurse findOrCreate($search, callable $callback = null, $options = [])
 */
class NursesTable extends Table
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

        $this->setTable('nurses');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Bedallotments', [
            'foreignKey' => 'nurse_id'
        ]);
        $this->hasMany('Beds', [
            'foreignKey' => 'nurse_id'
        ]);
        $this->hasMany('Blooddonors', [
            'foreignKey' => 'nurse_id'
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
            ->scalar('address')
            ->maxLength('address', 250)
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 250)
            ->requirePresence('phone', 'create')
            ->notEmpty('phone');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
