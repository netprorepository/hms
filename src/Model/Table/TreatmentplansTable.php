<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Treatmentplans Model
 *
 * @property \App\Model\Table\ConsultationsTable|\Cake\ORM\Association\BelongsTo $Consultations
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ConsultationsTable|\Cake\ORM\Association\HasMany $Consultations
 *
 * @method \App\Model\Entity\Treatmentplan get($primaryKey, $options = [])
 * @method \App\Model\Entity\Treatmentplan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Treatmentplan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Treatmentplan|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Treatmentplan|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Treatmentplan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Treatmentplan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Treatmentplan findOrCreate($search, callable $callback = null, $options = [])
 */
class TreatmentplansTable extends Table
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

        $this->setTable('treatmentplans');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Consultations', [
            'foreignKey' => 'consultation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Consultations', [
            'foreignKey' => 'treatmentplan_id'
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
            ->scalar('plan')
            ->requirePresence('plan', 'create')
            ->notEmpty('plan');

//        $validator
//            ->dateTime('datecreated')
//            ->requirePresence('datecreated', 'create')
//            ->notEmpty('datecreated');

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
        $rules->add($rules->existsIn(['consultation_id'], 'Consultations'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
