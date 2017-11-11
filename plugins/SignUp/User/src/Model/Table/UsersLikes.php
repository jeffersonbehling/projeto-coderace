<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 11/11/17
 * Time: 02:37
 */

namespace SignUp\User\Model\Table;


class UsersLikes
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

        $this->setTable('likes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'Users'
        ]);
      $this->belongsTo('Likes', [
            'foreignKey' => 'likes_id',
            'joinType' => 'INNER',
            'className' => 'Likes'
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
}