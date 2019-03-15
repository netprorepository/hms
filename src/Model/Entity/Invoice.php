<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Invoice Entity
 *
 * @property int $id
 * @property int $patient_id
 * @property string $title
 * @property string $description
 * @property int $amount
 * @property \Cake\I18n\FrozenTime $created_date
 * @property string $status
 * @property int $user_id
 *
 * @property \App\Model\Entity\Patient $patient
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Payment[] $payments
 */
class Invoice extends Entity
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
        'patient_id' => true,
        'title' => true,
        'description' => true,
        'amount' => true,
        'created_date' => true,
        'status' => true,
        'user_id' => true,
        'patient' => true,
        'user' => true,
        'payments' => true
    ];
}
