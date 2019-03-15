<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Treatmentplan Entity
 *
 * @property int $id
 * @property int $consultation_id
 * @property string $plan
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $datecreated
 *
 * @property \App\Model\Entity\Consultation[] $consultations
 * @property \App\Model\Entity\User $user
 */
class Treatmentplan extends Entity
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
        'consultation_id' => true,
        'plan' => true,
        'user_id' => true,
        'datecreated' => true,
        'comment' => true,
        'consultations' => true,
        'user' => true
    ];
}
