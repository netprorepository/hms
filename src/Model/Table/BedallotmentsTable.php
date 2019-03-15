<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bedallotments Model
 *
 * @property \App\Model\Table\BedsTable|\Cake\ORM\Association\BelongsTo $Beds
 * @property \App\Model\Table\PatientsTable|\Cake\ORM\Association\BelongsTo $Patients
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Bedallotment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bedallotment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bedallotment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bedallotment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bedallotment|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bedallotment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bedallotment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bedallotment findOrCreate($search, callable $callback = null, $options = [])
 */
class BedallotmentsTable extends Table
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

        $this->setTable('bedallotments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Beds', [
            'foreignKey' => 'bed_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Patients', [
            'foreignKey' => 'patient_id',
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

       /* $validator
            ->dateTime('allotment_timestamp')
            ->requirePresence('allotment_timestamp', 'create')
            ->notEmpty('allotment_timestamp');

        $validator
            ->scalar('discharge_timestamp')
            ->maxLength('discharge_timestamp', 64)
            ->allowEmpty('discharge_timestamp');*/

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
        $rules->add($rules->existsIn(['bed_id'], 'Beds'));
        $rules->add($rules->existsIn(['patient_id'], 'Patients'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
