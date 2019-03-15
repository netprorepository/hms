<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MedicineCategory Entity
 *
 * @property int $id
 * @property int $medicine_id
 * @property int $category_id
 *
 * @property \App\Model\Entity\Medicine $medicine
 * @property \App\Model\Entity\Category $category
 */
class MedicineCategory extends Entity
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
        'medicine_id' => true,
        'category_id' => true,
        'medicine' => true,
        'category' => true
    ];
}
