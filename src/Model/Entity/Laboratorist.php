<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Laboratorist Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property \Cake\I18n\FrozenTime $created_date
 * @property int $admin_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Admin $admin
 * @property \App\Model\Entity\Diagnosisreport[] $diagnosisreports
 */
class Laboratorist extends Entity
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
        'user_id' => true,
        'name' => true,
        'address' => true,
        'phone' => true,
        'created_date' => true,
        'admin_id' => true,
        'user' => true,
        'admin' => true,
        'diagnosisreports' => true
    ];
}
