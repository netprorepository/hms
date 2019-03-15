<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Admin Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $address
 * @property string $phone
 *
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Accountant[] $accountants
 * @property \App\Model\Entity\Bloodbank[] $bloodbank
 * @property \App\Model\Entity\Category[] $categories
 * @property \App\Model\Entity\Department[] $departments
 * @property \App\Model\Entity\Doctor[] $doctors
 * @property \App\Model\Entity\Emailtemplate[] $emailtemplate
 * @property \App\Model\Entity\Frontdesk[] $frontdesks
 * @property \App\Model\Entity\Laboratorist[] $laboratorists
 */
class Admin extends Entity
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
        'users' => true,
        'accountants' => true,
        'bloodbank' => true,
        'categories' => true,
        'departments' => true,
        'doctors' => true,
        'emailtemplate' => true,
        'frontdesks' => true,
        'laboratorists' => true
    ];
}
