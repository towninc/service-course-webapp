<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cherry Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $yomi_name
 * @property string|null $pref
 * @property string|null $city
 * @property float|null $lat
 * @property float|null $lng
 */
class Cherry extends Entity
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
        'yomi_name' => true,
        'pref' => true,
        'city' => true,
        'lat' => true,
        'lng' => true
    ];
}
