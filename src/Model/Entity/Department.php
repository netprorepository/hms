<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Department Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created_date
 * @property int $admin_id
 *
 * @property \App\Model\Entity\Admin $admin
 * @property \App\Model\Entity\Doctor[] $doctors
 * @property \App\Model\Entity\Frontdesk[] $frontdesks
 */
class Department extends Entity
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
        'description' => true,
        'created_date' => true,
        'user_id' => true,
        //'admin' => true,
        'users' => true,
        //'frontdesks' => true
    ];
}
