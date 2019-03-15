<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Medicine Entity
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property string $description
 * @property string $price
 * @property string $manufacturing_company
 * @property string $status
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\MedicineCategory[] $medicine_categories
 */
class Medicine extends Entity
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
        'category_id' => true,
        'description' => true,
        'price' => true,
        'manufacturing_company' => true,
        'status' => true,
        'user_id' => true,
        'user' => true,
        'medicine_categories' => true
    ];
}
