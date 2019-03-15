<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Admission Entity
 *
 * @property int $id
 * @property int $patient_id
 * @property \Cake\I18n\FrozenTime $admissiondate
 * @property int $ward_id
 * @property int $bed_id
 * @property string $dischargedate
 * @property int $user_id
 *
 * @property \App\Model\Entity\Patient $patient
 * @property \App\Model\Entity\Ward $ward
 * @property \App\Model\Entity\Bed $bed
 * @property \App\Model\Entity\User $user
 */
class Admission extends Entity
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
        'admissiondate' => true,
        'ward_id' => true,
        'bed_id' => true,
        'dischargedate' => true,
        'user_id' => true,
        'patient' => true,
        'dischargerequested' => true,
        'ward' => true,
        'bed' => true,
        'user' => true
    ];
}
