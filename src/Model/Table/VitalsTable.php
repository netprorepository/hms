<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vitals Model
 *
 * @property \App\Model\Table\PatientsTable|\Cake\ORM\Association\BelongsTo $Patients
 *
 * @method \App\Model\Entity\Vital get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vital newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vital[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vital|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vital|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vital patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vital[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vital findOrCreate($search, callable $callback = null, $options = [])
 */
class VitalsTable extends Table
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

        $this->setTable('vitals');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Patients', [
            'foreignKey' => 'patient_id',
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

       // $validator
          //  ->dateTime('date_added')
          //  ->requirePresence('date_added', 'create')
          //  ->notEmpty('date_added');

        $validator
            ->numeric('temp')
            ->requirePresence('temp', 'create')
            ->notEmpty('temp');

        $validator
            ->integer('pulse')
            ->requirePresence('pulse', 'create')
            ->notEmpty('pulse');

        $validator
            ->scalar('bp')
            ->maxLength('bp', 16)
            ->requirePresence('bp', 'create')
            ->notEmpty('bp');

        $validator
            ->scalar('resp')
            ->maxLength('resp', 16)
            ->requirePresence('resp', 'create')
            ->notEmpty('resp');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmpty('description');

       // $validator
         //   ->integer('status')
          //  ->requirePresence('status', 'create')
           // ->notEmpty('status');

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

        return $rules;
    }
}
