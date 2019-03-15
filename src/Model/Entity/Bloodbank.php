<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bloodbank Entity
 *
 * @property int $id
 * @property string $blood_group
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created_date
 * @property int $admin_id
 *
 * @property \App\Model\Entity\Admin $admin
 */
class Bloodbank extends Entity
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
        'blood_group' => true,
        'status' => true,
        'created_date' => true,
        'admin_id' => true,
        'admin' => true
    ];
}
