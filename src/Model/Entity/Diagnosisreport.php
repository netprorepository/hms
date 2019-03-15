<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Diagnosisreport Entity
 *
 * @property int $id
 * @property int $diagnosistype_id
 * @property string $document_type
 * @property string $file_name
 * @property int $prescription_id
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created_date
 * @property int $user_id
 * @property string $report
 * @property string $status
 * @property int $consultation_id
 *
 * @property \App\Model\Entity\Prescription $prescription
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Diagnosistype $diagnosistype
 * @property \App\Model\Entity\Consultation $consultation
 */
class Diagnosisreport extends Entity
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
        'diagnosistype_id' => true,
        'document_type' => true,
        'file_name' => true,
        'prescription_id' => true,
        'description' => true,
        'created_date' => true,
        'user_id' => true,
        'report' => true,
        'status' => true,
        'consultation_id' => true,
        'prescription' => true,
        'user' => true,
        'diagnosistype' => true,
        'consultation' => true
    ];
}
