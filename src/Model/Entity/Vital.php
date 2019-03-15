<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vital Entity
 *
 * @property int $id
 * @property int $patient_id
 * @property \Cake\I18n\FrozenTime $date_added
 * @property float $temp
 * @property int $pulse
 * @property string $bp
 * @property string $resp
 * @property string $description
 * @property int $status
 *
 * @property \App\Model\Entity\Patient $patient
 */
class Vital extends Entity
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
        'date_added' => true,
        'temp' => true,
        'pulse' => true,
        'bp' => true,
        'apgar2' => true,
        'apgar1' => true,
        'blength' => true,
        'hcm' => true,
        'resp' => true,
        'description' => true,
        'status' => true,
        'height' => true,
        'weight' => true,
        'bmi' => true,
        'patient' => true
    ];
}
