<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bed Entity
 *
 * @property int $id
 * @property string $bed_number
 * @property string $type
 * @property int $status
 * @property string $description
 * @property int $nurse_id
 * @property \Cake\I18n\FrozenTime $created_date
 *
 * @property \App\Model\Entity\Nurse $nurse
 * @property \App\Model\Entity\Bedallotment[] $bedallotments
 */
class Bed extends Entity
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
        'bed_number' => true,
        'type' => true,
        'status' => true,
        'description' => true,
        'user_id' => true,
        'created_date' => true,
        'user' => true,
        'bedallotments' => true
    ];
}
