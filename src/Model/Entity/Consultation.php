<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Consultation Entity
 *
 * @property int $id
 * @property int $patient_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $consultationday
 * @property string $pc
 * @property string $hpc
 * @property string $pmh
 * @property string $psh
 * @property string $dh
 * @property string $allergies
 * @property string $socialhistory
 * @property string $impression
 * @property string $hop
 * @property string $poh
 * @property string $pgh
 * @property string $lmp
 * @property string $ga
 * @property string $edd
 * @property int $parity
 * @property int $diagnosis
 * @property int $treatmentplan_id
 *
 * @property \App\Model\Entity\Patient $patient
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Treatmentplan[] $treatmentplans
 */
class Consultation extends Entity
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
        'user_id' => true,
        'consultationday' => true,
        'pc' => true,
        'hpc' => true,
        'pmh' => true,
        'psh' => true,
        'dh' => true,
        'allergies' => true,
        'socialhistory' => true,
        'impression' => true,
        'hop' => true,
        'poh' => true,
        'pgh' => true,
        'lmp' => true,
        'ga' => true,
        'edd' => true,
        'parity' => true,
        'diagnosis' => true,
        'treatmentplan_id' => true,
        'patient' => true,
        'user' => true,
        'treatmentplans' => true
    ];
}
