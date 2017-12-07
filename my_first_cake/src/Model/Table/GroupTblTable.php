<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GroupTbl Model
 *
 * @property \App\Model\Table\GroupsTable|\Cake\ORM\Association\BelongsTo $Groups
 *
 * @method \App\Model\Entity\GroupTbl get($primaryKey, $options = [])
 * @method \App\Model\Entity\GroupTbl newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GroupTbl[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GroupTbl|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GroupTbl patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GroupTbl[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GroupTbl findOrCreate($search, callable $callback = null, $options = [])
 */
class GroupTblTable extends Table
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

        $this->setTable('group_tbl');
        $this->setDisplayField('name');
        $this->setPrimaryKey('group_id');

        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id',
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
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->scalar('slogan')
            ->allowEmpty('slogan');

        $validator
            ->dateTime('create_time')
            ->requirePresence('create_time', 'create')
            ->notEmpty('create_time');

        $validator
            ->dateTime('update_time')
            ->requirePresence('update_time', 'create')
            ->notEmpty('update_time');

        $validator
            ->integer('delete_status')
            ->requirePresence('delete_status', 'create')
            ->notEmpty('delete_status');

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
        $rules->add($rules->existsIn(['group_id'], 'Groups'));

        return $rules;
    }
    public function showGroup(){
        $result = $this->find('list', ['keyField' => 'group_id', 'valueField' => 'name'])->toArray();
        return $result;
    }
}
