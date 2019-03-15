<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Report Entity
 *
 * @property int $id
 * @property string $type
 * @property string $description
 * @property int $timestamp
 * @property int $doctor_id
 * @property int $patient_id
 *
 * @property \App\Model\Entity\Doctor $doctor
 * @property \App\Model\Entity\Patient $patient
 */
class Report extends Entity
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
        'type' => true,
        'description' => true,
        'timestamp' => true,
        'user_id' => true,
        'patient_id' => true,
        'user' => true,
        'patient' => true
    ];
}
