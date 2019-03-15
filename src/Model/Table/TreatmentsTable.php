<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Treatments Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ConsultationsTable|\Cake\ORM\Association\BelongsTo $Consultations
 *
 * @method \App\Model\Entity\Treatment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Treatment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Treatment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Treatment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Treatment|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Treatment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Treatment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Treatment findOrCreate($search, callable $callback = null, $options = [])
 */
class TreatmentsTable extends Table
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

        $this->setTable('treatments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
//            ->dateTime('treatedon')
//            ->requirePresence('treatedon', 'create')
//            ->notEmpty('treatedon');

        $validator
            ->scalar('treatmentgiven')
            ->maxLength('treatmentgiven', 900)
            ->requirePresence('treatmentgiven', 'create')
            ->notEmpty('treatmentgiven');

        $validator
            ->scalar('nexttreatmentdate')
            ->maxLength('nexttreatmentdate', 100)
            ->requirePresence('nexttreatmentdate', 'create')
            ->notEmpty('nexttreatmentdate');

        $validator
            ->scalar('comment')
            ->maxLength('comment', 500)
            ->allowEmpty('comment');

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
