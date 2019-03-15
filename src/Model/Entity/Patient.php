<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Patient Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $sex
 * @property string $birth_date
 * @property string $blood_group
 * @property \Cake\I18n\FrozenTime $created_date
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Appointment[] $appointments
 * @property \App\Model\Entity\Bedallotment[] $bedallotments
 * @property \App\Model\Entity\Invoice[] $invoices
 * @property \App\Model\Entity\Payment[] $payments
 * @property \App\Model\Entity\Prescription[] $prescriptions
 * @property \App\Model\Entity\Report[] $reports
 */
class Patient extends Entity
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
        'sex' => true,
        'age' => true,
        'tribe' => true,
        'occupation' => true,
        'nokname' => true,
        'nokaddress' => true,
        'nokrelation' => true,
        'nokphone' => true,
        'religion' => true,
        'occupation' => true,
        'surname' => true,
        'birth_date' => true,
        'blood_group' => true,
        'created_date' => true,
        'user' => true,
        'emailaddress' => true,
        'appointments' => true,
        'bedallotments' => true,
        'invoices' => true,
        'payments' => true,
        'prescriptions' => true,
        'reports' => true
    ];
}
