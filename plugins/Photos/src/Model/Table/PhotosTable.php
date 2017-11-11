<?php
namespace Photos\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Photos Model
 *
 * @property \Photos\Model\Table\EventsTable|\Cake\ORM\Association\BelongsTo $Events
 * @property \Photos\Model\Table\PhinxlogTable|\Cake\ORM\Association\BelongsToMany $Phinxlog
 *
 * @method \Photos\Model\Entity\Photo get($primaryKey, $options = [])
 * @method \Photos\Model\Entity\Photo newEntity($data = null, array $options = [])
 * @method \Photos\Model\Entity\Photo[] newEntities(array $data, array $options = [])
 * @method \Photos\Model\Entity\Photo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Photos\Model\Entity\Photo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Photos\Model\Entity\Photo[] patchEntities($entities, array $data, array $options = [])
 * @method \Photos\Model\Entity\Photo findOrCreate($search, callable $callback = null, $options = [])
 */
class PhotosTable extends Table
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

        $this->setTable('photos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Events', [
            'foreignKey' => 'events_id',
            'joinType' => 'INNER',
            'className' => 'Events.Events'
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
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('directory')
            ->requirePresence('directory', 'create')
            ->notEmpty('directory');

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
        $rules->add($rules->existsIn(['events_id'], 'Events'));

        return $rules;
    }
}
