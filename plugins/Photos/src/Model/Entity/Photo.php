<?php
namespace Photos\Model\Entity;

use Cake\ORM\Entity;

/**
 * Photo Entity
 *
 * @property string $id
 * @property string $directory
 * @property string $events_id
 *
 * @property \Photos\Model\Entity\Event $event
 * @property \Photos\Model\Entity\Phinxlog[] $phinxlog
 */
class Photo extends Entity
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
        'directory' => true,
        'events_id' => true,
        'event' => true,
        'phinxlog' => true
    ];
}
