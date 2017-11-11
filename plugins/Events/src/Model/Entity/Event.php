<?php
namespace Events\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity
 *
 * @property string $id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $time_inicial
 * @property string $location
 * @property string $description
 * @property \Cake\I18n\Time $created
 */
class Event extends Entity
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
        'name' => true,
        'time_inicial' => true,
        'location' => true,
        'description' => true,
        'created' => true
    ];
}
