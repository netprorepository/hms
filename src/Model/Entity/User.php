<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $role_id
 * @property string $fname
 * @property string $lname
 * @property string $mname
 * @property string $gender
 * @property string $address
 * @property int $country_id
 * @property int $state_id
 * @property string $phone
 * @property int $department_id
 * @property string $profile
 * @property string $photo
 * @property string $dob
 * @property \Cake\I18n\FrozenTime $created_date
 * @property int $created_by
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Accountant[] $accountants
 * @property \App\Model\Entity\Admin[] $admins
 * @property \App\Model\Entity\Doctor[] $doctors
 * @property \App\Model\Entity\Frontdesk[] $frontdesks
 * @property \App\Model\Entity\Invoice[] $invoices
 * @property \App\Model\Entity\Laboratorist[] $laboratorists
 * @property \App\Model\Entity\Log[] $log
 * @property \App\Model\Entity\Message[] $messages
 * @property \App\Model\Entity\Nurse[] $nurses
 * @property \App\Model\Entity\Patient[] $patients
 * @property \App\Model\Entity\Pharmacist[] $pharmacists
 * @property \App\Model\Entity\Staff[] $staffs
 * @property \App\Model\Entity\Userlogin[] $userlogins
 */
class User extends Entity
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
        'username' => true,
        'password' => true,
        'role_id' => true,
        'fname' => true,
        'lname' => true,
        'mname' => true,
        'gender' => true,
        'address' => true,
        'country_id' => true,
        'state_id' => true,
        'phone' => true,
        'department_id' => true,
        'profile' => true,
        'photo' => true,
        'dob' => true,
        'created_date' => true,
        'created_by' => true,
        'role' => true,
        'country' => true,
        'state' => true,
        'department' => true,
        'accountants' => true,
        'admins' => true,
        'doctors' => true,
        'frontdesks' => true,
        'invoices' => true,
        'laboratorists' => true,
        'logs' => true,
        'messages' => true,
        'nurses' => true,
        'patients' => true,
        'pharmacists' => true,
        'staffs' => true,
        'userlogins' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    //password hashing method
    protected function _setPassword($value){
            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($value);
    }
}
