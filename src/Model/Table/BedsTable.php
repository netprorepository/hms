<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Beds Model
 *
 * @property \App\Model\Table\NursesTable|\Cake\ORM\Association\BelongsTo $Nurses
 * @property \App\Model\Table\BedallotmentsTable|\Cake\ORM\Association\HasMany $Bedallotments
 *
 * @method \App\Model\Entity\Bed get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bed newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bed[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bed|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bed|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bed patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bed[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bed findOrCreate($search, callable $callback = null, $options = [])
 */
class BedsTable extends Table
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

        $this->setTable('beds');
        $this->setDisplayField('bed_number');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Bedallotments', [
            'foreignKey' => 'bed_id'
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
            ->scalar('bed_number')
            ->maxLength('bed_number', 250)
            ->requirePresence('bed_number', 'create')
            ->notEmpty('bed_number');

        $validator
            ->scalar('type')
            ->maxLength('type', 250)
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->scalar('description')
            ->maxLength('description', 250)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->dateTime('created_date')
            ->requirePresence('created_date', 'create')
            ->notEmpty('created_date');*/

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
