<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Consultations Model
 *
 * @property \App\Model\Table\PatientsTable|\Cake\ORM\Association\BelongsTo $Patients
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\TreatmentplansTable|\Cake\ORM\Association\BelongsTo $Treatmentplans
 * @property \App\Model\Table\TreatmentplansTable|\Cake\ORM\Association\HasMany $Treatmentplans
 *
 * @method \App\Model\Entity\Consultation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Consultation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Consultation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Consultation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Consultation|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Consultation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Consultation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Consultation findOrCreate($search, callable $callback = null, $options = [])
 */
class ConsultationsTable extends Table
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

        $this->setTable('consultations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Patients', [
            'foreignKey' => 'patient_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Treatmentplans', [
            'foreignKey' => 'treatmentplan_id'
        ]);
        $this->hasMany('Treatmentplans', [
            'foreignKey' => 'consultation_id'
        ]);
         $this->hasMany('Treatments', [
            'foreignKey' => 'consultation_id'
        ]);
         $this->hasMany('Prescriptions', [
            'foreignKey' => 'consultation_id'
        ]);
        $this->hasMany('Diagnosisreports', [
            'foreignKey' => 'consultation_id'
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
//            ->dateTime('consultationday')
//            ->requirePresence('consultationday', 'create')
//            ->notEmpty('consultationday');

        $validator
            ->scalar('pc')
            ->maxLength('pc', 600)
            ->allowEmpty('pc');

        $validator
            ->scalar('hpc')
            ->maxLength('hpc', 600)
            ->allowEmpty('hpc');

        $validator
            ->scalar('pmh')
            ->maxLength('pmh', 600)
            ->allowEmpty('pmh');

        $validator
            ->scalar('psh')
            ->maxLength('psh', 600)
            ->allowEmpty('psh');

        $validator
            ->scalar('dh')
            ->maxLength('dh', 600)
            ->allowEmpty('dh');

        $validator
            ->scalar('allergies')
            ->maxLength('allergies', 600)
            ->allowEmpty('allergies');

        $validator
            ->scalar('socialhistory')
            ->maxLength('socialhistory', 600)
            ->allowEmpty('socialhistory');

        $validator
            ->scalar('impression')
            ->maxLength('impression', 600)
            ->allowEmpty('impression');

        $validator
            ->scalar('hop')
            ->maxLength('hop', 500)
            ->allowEmpty('hop');

        $validator
            ->scalar('poh')
            ->maxLength('poh', 500)
            ->allowEmpty('poh');

        $validator
            ->scalar('pgh')
            ->maxLength('pgh', 500)
            ->allowEmpty('pgh');

        $validator
            ->scalar('lmp')
            ->maxLength('lmp', 50)
            ->allowEmpty('lmp');

        $validator
            ->scalar('ga')
            ->maxLength('ga', 30)
            ->allowEmpty('ga');

        $validator
            ->scalar('edd')
            ->maxLength('edd', 30)
            ->allowEmpty('edd');

        $validator
            ->integer('parity')
            ->allowEmpty('parity');

        $validator
            ->integer('diagnosis')
            ->allowEmpty('diagnosis');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
       // $rules->add($rules->existsIn(['treatmentplan_id'], 'Treatmentplans'));

        return $rules;
    }
}
