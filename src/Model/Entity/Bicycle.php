<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bicycle Entity
 *
 * @property int $id
 * @property string $name
 * @property string $location
 * @property float|null $latitude
 * @property float|null $longitude
 * @property string $utilization_time
 * @property string $price_per_day
 * @property string $phone_number
 * @property int|null $capacity
 * @property string $url
 */
class Bicycle extends Entity
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
        'location' => true,
        'latitude' => true,
        'longitude' => true,
        'utilization_time' => true,
        'price_per_day' => true,
        'phone_number' => true,
        'capacity' => true,
        'url' => true
    ];
}
