<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Prescriptions Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ConsultationsTable|\Cake\ORM\Association\BelongsTo $Consultations
 * @property \App\Model\Table\DiagnosisreportsTable|\Cake\ORM\Association\HasMany $Diagnosisreports
 * @property \App\Model\Table\LabtestsTable|\Cake\ORM\Association\HasMany $Labtests
 *
 * @method \App\Model\Entity\Prescription get($primaryKey, $options = [])
 * @method \App\Model\Entity\Prescription newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Prescription[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Prescription|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Prescription|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Prescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Prescription[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Prescription findOrCreate($search, callable $callback = null, $options = [])
 */
class PrescriptionsTable extends Table
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

        $this->setTable('prescriptions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Patients', [
            'foreignKey' => 'patient_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Consultations', [
            'foreignKey' => 'consultation_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Diagnosisreports', [
            'foreignKey' => 'prescription_id'
        ]);
        $this->hasMany('Labtests', [
            'foreignKey' => 'prescription_id'
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
      /*  $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->dateTime('date_created')
            ->requirePresence('date_created', 'create')
            ->notEmpty('date_created');*/

        $validator
            ->scalar('medication')
            ->requirePresence('medication', 'create')
            ->notEmpty('medication');

        /*$validator
            ->scalar('medication_from_pharmacist')
            ->requirePresence('medication_from_pharmacist', 'create')
            ->notEmpty('medication_from_pharmacist');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->scalar('medication_by')
            ->maxLength('medication_by', 64)
            ->requirePresence('medication_by', 'create')
            ->notEmpty('medication_by');

        $validator
            ->scalar('medication_date')
            ->maxLength('medication_date', 64)
            ->requirePresence('medication_date', 'create')
            ->notEmpty('medication_date');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status'); */

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
        $rules->add($rules->existsIn(['consultation_id'], 'Consultations'));

        return $rules;
    }
}
