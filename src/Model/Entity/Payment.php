<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property int $id
 * @property string $payment_for
 * @property int $invoice_id
 * @property int $patient_id
 * @property string $payment_method
 * @property string $description
 * @property int $amount
 * @property \Cake\I18n\FrozenTime $created_date
 *
 * @property \App\Model\Entity\Invoice $invoice
 * @property \App\Model\Entity\Patient $patient
 */
class Payment extends Entity
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
        'payment_for' => true,
        'invoice_id' => true,
        'patient_id' => true,
        'payment_method' => true,
        'description' => true,
        'amount' => true,
        'created_date' => true,
        'invoice' => true,
        'patient' => true
    ];
}
