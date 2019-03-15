<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Labtests Model
 *
 * @property \App\Model\Table\PrescriptionsTable|\Cake\ORM\Association\BelongsTo $Prescriptions
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Labtest get($primaryKey, $options = [])
 * @method \App\Model\Entity\Labtest newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Labtest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Labtest|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Labtest|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Labtest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Labtest[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Labtest findOrCreate($search, callable $callback = null, $options = [])
 */
class LabtestsTable extends Table
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

        $this->setTable('labtests');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Prescriptions', [
            'foreignKey' => 'prescription_id',
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

      //  $validator
          //  ->dateTime('date_added')
          //  ->requirePresence('date_added', 'create')
          //  ->notEmpty('date_added');

        $validator
            ->scalar('description')
            ->maxLength('description', 256)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

      //  $validator
          //  ->integer('status')
           // ->requirePresence('status', 'create')
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
        $rules->add($rules->existsIn(['prescription_id'], 'Prescriptions'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
