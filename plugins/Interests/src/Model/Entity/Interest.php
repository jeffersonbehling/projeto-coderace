<?php
namespace Interests\Model\Entity;

use Cake\ORM\Entity;

/**
 * Interest Entity
 *
 * @property int $id
 * @property string $user_id
 * @property string $event_id
 *
 * @property \Interests\Model\Entity\User $user
 * @property \Interests\Model\Entity\Event $event
 */
class Interest extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'event_id' => true,
        'user' => true,
        'event' => true
    ];
}
