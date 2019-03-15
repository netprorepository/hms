<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Noticeboards Model
 *
 * @method \App\Model\Entity\Noticeboard get($primaryKey, $options = [])
 * @method \App\Model\Entity\Noticeboard newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Noticeboard[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Noticeboard|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Noticeboard|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Noticeboard patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Noticeboard[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Noticeboard findOrCreate($search, callable $callback = null, $options = [])
 */
class NoticeboardsTable extends Table
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

        $this->setTable('noticeboards');
        $this->setDisplayField('id');
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
            ->scalar('notice_title')
            ->maxLength('notice_title', 250)
            ->requirePresence('notice_title', 'create')
            ->notEmpty('notice_title');

        $validator
            ->scalar('notice')
            ->maxLength('notice', 250)
            ->requirePresence('notice', 'create')
            ->notEmpty('notice');

        $validator
            ->dateTime('created_date')
            ->requirePresence('created_date', 'create')
            ->notEmpty('created_date');

        return $validator;
    }
}
