<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Emailtemplate Model
 *
 * @property \App\Model\Table\AdminsTable|\Cake\ORM\Association\BelongsTo $Admins
 *
 * @method \App\Model\Entity\Emailtemplate get($primaryKey, $options = [])
 * @method \App\Model\Entity\Emailtemplate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Emailtemplate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Emailtemplate|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Emailtemplate|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Emailtemplate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Emailtemplate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Emailtemplate findOrCreate($search, callable $callback = null, $options = [])
 */
class EmailtemplateTable extends Table
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

        $this->setTable('emailtemplate');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Admins', [
            'foreignKey' => 'admin_id',
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

        $validator
            ->scalar('task')
            ->maxLength('task', 250)
            ->requirePresence('task', 'create')
            ->notEmpty('task');

        $validator
            ->scalar('subject')
            ->maxLength('subject', 250)
            ->requirePresence('subject', 'create')
            ->notEmpty('subject');

        $validator
            ->scalar('body')
            ->maxLength('body', 250)
            ->requirePresence('body', 'create')
            ->notEmpty('body');

        $validator
            ->dateTime('created_date')
            ->requirePresence('created_date', 'create')
            ->notEmpty('created_date');

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
        $rules->add($rules->existsIn(['admin_id'], 'Admins'));

        return $rules;
    }
}
