<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Blooddonor Entity
 *
 * @property int $id
 * @property string $name
 * @property string $blood_group
 * @property string $sex
 * @property int $age
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property \Cake\I18n\FrozenTime $last_donation_timestamp
 * @property int $nurse_id
 *
 * @property \App\Model\Entity\Nurse $nurse
 */
class Blooddonor extends Entity
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
        'blood_group' => true,
        'sex' => true,
        'age' => true,
        'phone' => true,
        'email' => true,
        'address' => true,
        'last_donation_timestamp' => true,
        'user_id' => true,
        'user' => true
    ];
}
