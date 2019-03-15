<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Prescription Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $date_created
 * @property int $user_id
 * @property int $consultation_id
 * @property string $medication
 * @property string $medication_from_pharmacist
 * @property string $description
 * @property string $medication_by
 * @property string $medication_date
 * @property int $status
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Consultation $consultation
 * @property \App\Model\Entity\Diagnosisreport[] $diagnosisreports
 * @property \App\Model\Entity\Labtest[] $labtests
 */
class Prescription extends Entity
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
        'date_created' => true,
        'user_id' => true,
        'consultation_id' => true,
        'medication' => true,
        'medication_from_pharmacist' => true,
        'description' => true,
        'medication_by' => true,
        'medication_date' => true,
        'status' => true,
        'user' => true,
        'consultation' => true,
        'diagnosisreports' => true,
        'labtests' => true
    ];
}
