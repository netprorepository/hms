<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Diagnosistypes Model
 *
 * @method \App\Model\Entity\Diagnosistype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Diagnosistype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Diagnosistype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Diagnosistype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Diagnosistype|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Diagnosistype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Diagnosistype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Diagnosistype findOrCreate($search, callable $callback = null, $options = [])
 */
class DiagnosistypesTable extends Table
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

        $this->setTable('diagnosistypes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->scalar('name')
            ->maxLength('name', 120)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
