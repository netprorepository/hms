<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Admissions Model
 *
 * @property \App\Model\Table\PatientsTable|\Cake\ORM\Association\BelongsTo $Patients
 * @property \App\Model\Table\WardsTable|\Cake\ORM\Association\BelongsTo $Wards
 * @property \App\Model\Table\BedsTable|\Cake\ORM\Association\BelongsTo $Beds
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Admission get($primaryKey, $options = [])
 * @method \App\Model\Entity\Admission newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Admission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Admission|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Admission|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Admission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Admission[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Admission findOrCreate($search, callable $callback = null, $options = [])
 */
class AdmissionsTable extends Table
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

        $this->setTable('admissions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Patients', [
            'foreignKey' => 'patient_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Wards', [
            'foreignKey' => 'ward_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Beds', [
            'foreignKey' => 'bed_id',
            'joinType' => 'INNER'
        ]);
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

//        $validator
//            ->dateTime('admissiondate')
//            ->requirePresence('admissiondate', 'create')
//            ->notEmpty('admissiondate');
//
//        $validator
//            ->scalar('dischargedate')
//            ->maxLength('dischargedate', 50)
//            ->requirePresence('dischargedate', 'create')
//            ->notEmpty('dischargedate');

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
        $rules->add($rules->existsIn(['patient_id'], 'Patients'));
        $rules->add($rules->existsIn(['ward_id'], 'Wards'));
        $rules->add($rules->existsIn(['bed_id'], 'Beds'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
