<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Patients Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AppointmentsTable|\Cake\ORM\Association\HasMany $Appointments
 * @property \App\Model\Table\BedallotmentsTable|\Cake\ORM\Association\HasMany $Bedallotments
 * @property \App\Model\Table\InvoicesTable|\Cake\ORM\Association\HasMany $Invoices
 * @property \App\Model\Table\PaymentsTable|\Cake\ORM\Association\HasMany $Payments
 * @property \App\Model\Table\PrescriptionsTable|\Cake\ORM\Association\HasMany $Prescriptions
 * @property \App\Model\Table\ReportsTable|\Cake\ORM\Association\HasMany $Reports
 *
 * @method \App\Model\Entity\Patient get($primaryKey, $options = [])
 * @method \App\Model\Entity\Patient newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Patient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Patient|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Patient|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Patient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Patient[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Patient findOrCreate($search, callable $callback = null, $options = [])
 */
class PatientsTable extends Table
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

        $this->setTable('patients');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Appointments', [
            'foreignKey' => 'patient_id'
        ]);
        $this->hasMany('Bedallotments', [
            'foreignKey' => 'patient_id'
        ]);
        $this->hasMany('Invoices', [
            'foreignKey' => 'patient_id'
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'patient_id'
        ]);
        $this->hasMany('Prescriptions', [
            'foreignKey' => 'patient_id'
        ]);
        $this->hasMany('Reports', [
            'foreignKey' => 'patient_id'
        ]);
        $this->hasMany('Vitals', [
            'foreignKey' => 'patient_id'
        ]);
        
         $this->hasMany('Consultations', [
            'foreignKey' => 'patient_id'
        ]);
         
          $this->hasMany('Admissions', [
            'foreignKey' => 'patient_id'
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
            ->scalar('surname')
            ->maxLength('surname', 250)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('address')
            ->maxLength('address', 250)
            ->requirePresence('address', 'create')
            ->notEmpty('address');
        
         $validator
            ->scalar('nokaddress')
            ->maxLength('nokaddress', 250)
            ->requirePresence('nokaddress', 'create')
            ->notEmpty('nokaddress');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 250)
            ->requirePresence('phone', 'create')
            ->notEmpty('phone');
        
        $validator
            ->scalar('nokphone')
            ->maxLength('nokphone', 18)
            ->requirePresence('nokphone', 'create')
            ->notEmpty('nokphone');
        
        $validator
            ->scalar('surname')
            ->maxLength('surname', 250)
            ->requirePresence('surname', 'create')
            ->notEmpty('surname');
        
        

        $validator
            ->scalar('sex')
            ->maxLength('sex', 250)
            ->requirePresence('sex', 'create')
            ->notEmpty('sex');

        $validator
            ->scalar('birth_date')
            ->maxLength('birth_date', 64)
            ->requirePresence('birth_date', 'create')
            ->notEmpty('birth_date');

        $validator
            ->scalar('blood_group')
            ->maxLength('blood_group', 250)
            ->requirePresence('blood_group', 'create')
            ->notEmpty('blood_group');

       /* $validator
            ->dateTime('created_date')
            ->requirePresence('created_date', 'create')
            ->notEmpty('created_date');*/

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
