<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Wards Model
 *
 * @property \App\Model\Table\AdmissionsTable|\Cake\ORM\Association\HasMany $Admissions
 *
 * @method \App\Model\Entity\Ward get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ward newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ward[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ward|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ward|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ward patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ward[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ward findOrCreate($search, callable $callback = null, $options = [])
 */
class WardsTable extends Table
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

        $this->setTable('wards');
        $this->setDisplayField('wardname');
        $this->setPrimaryKey('id');

        $this->hasMany('Admissions', [
            'foreignKey' => 'ward_id'
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
            ->scalar('wardname')
            ->maxLength('wardname', 160)
            ->requirePresence('wardname', 'create')
            ->notEmpty('wardname');

        return $validator;
    }
}
