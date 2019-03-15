<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Admins Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AccountantsTable|\Cake\ORM\Association\HasMany $Accountants
 * @property \App\Model\Table\BloodbankTable|\Cake\ORM\Association\HasMany $Bloodbank
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\HasMany $Categories
 * @property \App\Model\Table\DepartmentsTable|\Cake\ORM\Association\HasMany $Departments
 * @property \App\Model\Table\DoctorsTable|\Cake\ORM\Association\HasMany $Doctors
 * @property \App\Model\Table\EmailtemplateTable|\Cake\ORM\Association\HasMany $Emailtemplate
 * @property \App\Model\Table\FrontdesksTable|\Cake\ORM\Association\HasMany $Frontdesks
 * @property \App\Model\Table\LaboratoristsTable|\Cake\ORM\Association\HasMany $Laboratorists
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Admin get($primaryKey, $options = [])
 * @method \App\Model\Entity\Admin newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Admin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Admin|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Admin|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Admin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Admin[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Admin findOrCreate($search, callable $callback = null, $options = [])
 */
class AdminsTable extends Table
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

        $this->setTable('admins');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Accountants', [
            'foreignKey' => 'admin_id'
        ]);
        $this->hasMany('Bloodbank', [
            'foreignKey' => 'admin_id'
        ]);
        $this->hasMany('Categories', [
            'foreignKey' => 'admin_id'
        ]);
        $this->hasMany('Departments', [
            'foreignKey' => 'admin_id'
        ]);
        $this->hasMany('Doctors', [
            'foreignKey' => 'admin_id'
        ]);
        $this->hasMany('Emailtemplate', [
            'foreignKey' => 'admin_id'
        ]);
        $this->hasMany('Frontdesks', [
            'foreignKey' => 'admin_id'
        ]);
        $this->hasMany('Laboratorists', [
            'foreignKey' => 'admin_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'admin_id'
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
