<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Labtest Entity
 *
 * @property int $id
 * @property int $prescription_id
 * @property \Cake\I18n\FrozenTime $date_added
 * @property int $user_id
 * @property string $description
 * @property int $status
 *
 * @property \App\Model\Entity\Prescription $prescription
 * @property \App\Model\Entity\User $user
 */
class Labtest extends Entity
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
        'prescription_id' => true,
        'date_added' => true,
        'user_id' => true,
        'description' => true,
        'status' => true,
        'comment' => true,
        'result' => true,
        'prescription' => true,
        'user' => true
    ];
}
