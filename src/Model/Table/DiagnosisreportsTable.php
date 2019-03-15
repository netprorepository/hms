<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Diagnosisreports Model
 *
 * @property \App\Model\Table\DiagnosistypesTable|\Cake\ORM\Association\BelongsTo $Diagnosistypes
 * @property \App\Model\Table\PrescriptionsTable|\Cake\ORM\Association\BelongsTo $Prescriptions
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ConsultationsTable|\Cake\ORM\Association\BelongsTo $Consultations
 *
 * @method \App\Model\Entity\Diagnosisreport get($primaryKey, $options = [])
 * @method \App\Model\Entity\Diagnosisreport newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Diagnosisreport[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Diagnosisreport|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Diagnosisreport|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Diagnosisreport patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Diagnosisreport[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Diagnosisreport findOrCreate($search, callable $callback = null, $options = [])
 */
class DiagnosisreportsTable extends Table
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

        $this->setTable('diagnosisreports');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Diagnosistypes', [
            'foreignKey' => 'diagnosistype_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Prescriptions', [
            'foreignKey' => 'prescription_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Consultations', [
            'foreignKey' => 'consultation_id',
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
//            ->scalar('document_type')
//            ->maxLength('document_type', 250)
//            ->requirePresence('document_type', 'create')
//            ->notEmpty('document_type');
//
//        $validator
//            ->scalar('file_name')
//            ->maxLength('file_name', 250)
//            ->requirePresence('file_name', 'create')
//            ->notEmpty('file_name');
//
//        $validator
//            ->scalar('description')
//            ->maxLength('description', 250)
//            ->requirePresence('description', 'create')
//            ->notEmpty('description');
//
//        $validator
//            ->dateTime('created_date')
//            ->requirePresence('created_date', 'create')
//            ->notEmpty('created_date');
//
//        $validator
//            ->scalar('report')
//            ->requirePresence('report', 'create')
//            ->notEmpty('report');
//
//        $validator
//            ->scalar('status')
//            ->maxLength('status', 16)
//            ->requirePresence('status', 'create')
//            ->notEmpty('status');

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
        $rules->add($rules->existsIn(['diagnosistype_id'], 'Diagnosistypes'));
       // $rules->add($rules->existsIn(['prescription_id'], 'Prescriptions'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['consultation_id'], 'Consultations'));

        return $rules;
    }
}
