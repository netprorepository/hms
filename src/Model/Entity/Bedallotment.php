<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bedallotment Entity
 *
 * @property int $id
 * @property int $bed_id
 * @property int $patient_id
 * @property \Cake\I18n\FrozenTime $allotment_timestamp
 * @property string $discharge_timestamp
 * @property int $user_id
 *
 * @property \App\Model\Entity\Bed $bed
 * @property \App\Model\Entity\Patient $patient
 * @property \App\Model\Entity\User $user
 */
class Bedallotment extends Entity
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
        'bed_id' => true,
        'patient_id' => true,
        'allotment_timestamp' => true,
        'discharge_timestamp' => true,
        'user_id' => true,
        'bed' => true,
        'patient' => true,
        'user' => true
    ];
}
