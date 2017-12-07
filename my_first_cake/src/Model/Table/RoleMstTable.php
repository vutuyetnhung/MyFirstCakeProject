<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RoleMst Model
 *
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 *
 * @method \App\Model\Entity\RoleMst get($primaryKey, $options = [])
 * @method \App\Model\Entity\RoleMst newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RoleMst[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RoleMst|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RoleMst patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RoleMst[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RoleMst findOrCreate($search, callable $callback = null, $options = [])
 */
class RoleMstTable extends Table
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

        $this->setTable('role_mst');
        $this->setDisplayField('role_id');
        $this->setPrimaryKey('role_id');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
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
            ->scalar('value')
            ->requirePresence('value', 'create')
            ->notEmpty('value');

        $validator
            ->dateTime('create_time')
            ->requirePresence('create_time', 'create')
            ->notEmpty('create_time');

        $validator
            ->dateTime('update_time')
            ->requirePresence('update_time', 'create')
            ->notEmpty('update_time');

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
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }

    public function showRole(){
        $result = $this->find('list', ['keyField' => 'role_id', 'valueField' => 'value'])->toArray();
        return $result;
    }
}
