<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sanctuary Entity
 *
 * @property int $id
 * @property string $title
 * @property int $number
 * @property string $place
 * @property string $prefecture
 * @property string $address
 * @property float $lat
 * @property float $lng
 */
class Sanctuary extends Entity
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
        'title' => true,
        'number' => true,
        'place' => true,
        'prefecture' => true,
        'address' => true,
        'lat' => true,
        'lng' => true
    ];
}
