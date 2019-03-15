<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Treatment Entity
 *
 * @property int $id
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $treatedon
 * @property string $treatmentgiven
 * @property string $nexttreatmentdate
 * @property string $comment
 * @property int $consultation_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Consultation $consultation
 */
class Treatment extends Entity
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
        'user_id' => true,
        'treatedon' => true,
        'treatmentgiven' => true,
        'nexttreatmentdate' => true,
        'comment' => true,
        'consultation_id' => true,
        'user' => true,
        'consultation' => true
    ];
}
