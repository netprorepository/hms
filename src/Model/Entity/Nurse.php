<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Nurse Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $address
 * @property string $phone
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Bedallotment[] $bedallotments
 * @property \App\Model\Entity\Bed[] $beds
 * @property \App\Model\Entity\Blooddonor[] $blooddonors
 */
class Nurse extends Entity
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
        'name' => true,
        'address' => true,
        'phone' => true,
        'user' => true,
        'bedallotments' => true,
        'beds' => true,
        'blooddonors' => true
    ];
}
