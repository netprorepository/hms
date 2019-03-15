<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\CountriesTable|\Cake\ORM\Association\BelongsTo $Countries
 * @property \App\Model\Table\StatesTable|\Cake\ORM\Association\BelongsTo $States
 * @property \App\Model\Table\DepartmentsTable|\Cake\ORM\Association\BelongsTo $Departments
 * @property \App\Model\Table\AccountantsTable|\Cake\ORM\Association\HasMany $Accountants
 * @property \App\Model\Table\AdminsTable|\Cake\ORM\Association\HasMany $Admins
 * @property \App\Model\Table\DoctorsTable|\Cake\ORM\Association\HasMany $Doctors
 * @property \App\Model\Table\FrontdesksTable|\Cake\ORM\Association\HasMany $Frontdesks
 * @property \App\Model\Table\InvoicesTable|\Cake\ORM\Association\HasMany $Invoices
 * @property \App\Model\Table\LaboratoristsTable|\Cake\ORM\Association\HasMany $Laboratorists
 * @property \App\Model\Table\LogTable|\Cake\ORM\Association\HasMany $Log
 * @property \App\Model\Table\MessagesTable|\Cake\ORM\Association\HasMany $Messages
 * @property \App\Model\Table\NursesTable|\Cake\ORM\Association\HasMany $Nurses
 * @property \App\Model\Table\PatientsTable|\Cake\ORM\Association\HasMany $Patients
 * @property \App\Model\Table\PharmacistsTable|\Cake\ORM\Association\HasMany $Pharmacists
 * @property \App\Model\Table\StaffsTable|\Cake\ORM\Association\HasMany $Staffs
 * @property \App\Model\Table\UserloginsTable|\Cake\ORM\Association\HasMany $Userlogins
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('States', [
            'foreignKey' => 'state_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Departments', [
            'foreignKey' => 'department_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Accountants', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Admins', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Doctors', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Frontdesks', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Invoices', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Laboratorists', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Logs', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Messages', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Nurses', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Patients', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Pharmacists', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Staffs', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Userlogins', [
            'foreignKey' => 'user_id'
        ]);
        
         $this->hasMany('Consultations', [
            'foreignKey' => 'user_id'
        ]);
         
           $this->hasMany('Treatments', [
            'foreignKey' => 'user_id'
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
            ->scalar('username')
            ->maxLength('username', 250)
            ->requirePresence('username', 'create')
            ->notEmpty('username');
        
        $validator
            ->scalar('password')
            ->maxLength('password', 250)
            ->requirePresence('password', 'create')
           ->notEmpty('cpassword')
           ->add('cpassword', 'custom', [
                    'rule' => function($value, $context) {
                        if ($value !== $context['data']['password']) {
                            return false;
                        }
                        return true;
                   },
                  'message' => 'Password mismatch. Please verify your password and try again',
        ]);

//        $validator
//            ->scalar('password')
//            ->maxLength('password', 250)
//            ->requirePresence('password', 'create')
//            ->notEmpty('password');

        $validator
            ->scalar('fname')
            ->maxLength('fname', 64)
            ->requirePresence('fname', 'create')
            ->notEmpty('fname');

        $validator
            ->scalar('lname')
            ->maxLength('lname', 64)
            ->requirePresence('lname', 'create')
            ->notEmpty('lname');

        $validator
            ->scalar('mname')
            ->maxLength('mname', 64)
            ->allowEmpty('mname');

        $validator
            ->scalar('gender')
            ->maxLength('gender', 15)
            ->requirePresence('gender', 'create')
            ->notEmpty('gender');

        $validator
            ->scalar('address')
            ->maxLength('address', 250)
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 32)
            ->requirePresence('phone', 'create')
            ->notEmpty('phone');

        $validator
            ->scalar('profile')
            ->allowEmpty('profile');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 128)
            ->allowEmpty('photo');

        $validator
            ->scalar('dob')
            ->maxLength('dob', 64)
            ->allowEmpty('dob');

       /* $validator
            ->dateTime('created_date')
            ->requirePresence('created_date', 'create')
            ->notEmpty('created_date');*/

        $validator
            ->integer('created_by')
            ->requirePresence('created_by', 'create');
    

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));
        $rules->add($rules->existsIn(['country_id'], 'Countries'));
        $rules->add($rules->existsIn(['state_id'], 'States'));
        $rules->add($rules->existsIn(['department_id'], 'Departments'));
        //$rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
