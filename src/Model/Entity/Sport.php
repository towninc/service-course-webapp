<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sport Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $address
 * @property float|null $longitude
 * @property float|null $latitude
 * @property string|null $tel
 * @property string|null $url
 */
class Sport extends Entity
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
        'address' => true,
        'longitude' => true,
        'latitude' => true,
        'tel' => true,
        'url' => true
    ];
}
