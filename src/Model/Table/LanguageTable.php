<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Language Model
 *
 * @method \App\Model\Entity\Language get($primaryKey, $options = [])
 * @method \App\Model\Entity\Language newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Language[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Language|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Language|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Language patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Language[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Language findOrCreate($search, callable $callback = null, $options = [])
 */
class LanguageTable extends Table
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

        $this->setTable('language');
        $this->setDisplayField('phrase_id');
        $this->setPrimaryKey('phrase_id');
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
            ->integer('phrase_id')
            ->allowEmpty('phrase_id', 'create');

        $validator
            ->scalar('phrase')
            ->maxLength('phrase', 250)
            ->requirePresence('phrase', 'create')
            ->notEmpty('phrase');

        $validator
            ->scalar('english')
            ->maxLength('english', 250)
            ->requirePresence('english', 'create')
            ->notEmpty('english');

        $validator
            ->scalar('bengali')
            ->maxLength('bengali', 250)
            ->requirePresence('bengali', 'create')
            ->notEmpty('bengali');

        $validator
            ->scalar('spanish')
            ->maxLength('spanish', 250)
            ->requirePresence('spanish', 'create')
            ->notEmpty('spanish');

        $validator
            ->scalar('arabic')
            ->maxLength('arabic', 250)
            ->requirePresence('arabic', 'create')
            ->notEmpty('arabic');

        $validator
            ->scalar('dutch')
            ->maxLength('dutch', 250)
            ->requirePresence('dutch', 'create')
            ->notEmpty('dutch');

        $validator
            ->scalar('russian')
            ->maxLength('russian', 250)
            ->requirePresence('russian', 'create')
            ->notEmpty('russian');

        $validator
            ->scalar('chinese')
            ->maxLength('chinese', 250)
            ->requirePresence('chinese', 'create')
            ->notEmpty('chinese');

        $validator
            ->scalar('turkish')
            ->maxLength('turkish', 250)
            ->requirePresence('turkish', 'create')
            ->notEmpty('turkish');

        $validator
            ->scalar('portuguese')
            ->maxLength('portuguese', 250)
            ->requirePresence('portuguese', 'create')
            ->notEmpty('portuguese');

        $validator
            ->scalar('hungarian')
            ->maxLength('hungarian', 250)
            ->requirePresence('hungarian', 'create')
            ->notEmpty('hungarian');

        $validator
            ->scalar('french')
            ->maxLength('french', 250)
            ->requirePresence('french', 'create')
            ->notEmpty('french');

        $validator
            ->scalar('greek')
            ->maxLength('greek', 250)
            ->requirePresence('greek', 'create')
            ->notEmpty('greek');

        $validator
            ->scalar('german')
            ->maxLength('german', 250)
            ->requirePresence('german', 'create')
            ->notEmpty('german');

        $validator
            ->scalar('italian')
            ->maxLength('italian', 250)
            ->requirePresence('italian', 'create')
            ->notEmpty('italian');

        $validator
            ->scalar('thai')
            ->maxLength('thai', 250)
            ->requirePresence('thai', 'create')
            ->notEmpty('thai');

        $validator
            ->scalar('urdu')
            ->maxLength('urdu', 250)
            ->requirePresence('urdu', 'create')
            ->notEmpty('urdu');

        $validator
            ->scalar('hindi')
            ->maxLength('hindi', 250)
            ->requirePresence('hindi', 'create')
            ->notEmpty('hindi');

        $validator
            ->scalar('latin')
            ->maxLength('latin', 250)
            ->requirePresence('latin', 'create')
            ->notEmpty('latin');

        $validator
            ->scalar('indonesian')
            ->maxLength('indonesian', 250)
            ->requirePresence('indonesian', 'create')
            ->notEmpty('indonesian');

        $validator
            ->scalar('japanese')
            ->maxLength('japanese', 250)
            ->requirePresence('japanese', 'create')
            ->notEmpty('japanese');

        $validator
            ->scalar('korean')
            ->maxLength('korean', 250)
            ->requirePresence('korean', 'create')
            ->notEmpty('korean');

        return $validator;
    }
}
