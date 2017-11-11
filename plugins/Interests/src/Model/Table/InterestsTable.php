<?php
namespace Interests\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Interests Model
 *
 * @property \Interests\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \Interests\Model\Table\EventsTable|\Cake\ORM\Association\BelongsTo $Events
 *
 * @method \Interests\Model\Entity\Interest get($primaryKey, $options = [])
 * @method \Interests\Model\Entity\Interest newEntity($data = null, array $options = [])
 * @method \Interests\Model\Entity\Interest[] newEntities(array $data, array $options = [])
 * @method \Interests\Model\Entity\Interest|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Interests\Model\Entity\Interest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Interests\Model\Entity\Interest[] patchEntities($entities, array $data, array $options = [])
 * @method \Interests\Model\Entity\Interest findOrCreate($search, callable $callback = null, $options = [])
 */
class InterestsTable extends Table
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

        $this->setTable('interests');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'Interests.Users'
        ]);
        $this->belongsTo('Events', [
            'foreignKey' => 'event_id',
            'joinType' => 'INNER',
            'className' => 'Interests.Events'
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
        $rules->add($rules->existsIn(['event_id'], 'Events'));

        return $rules;
    }
}
