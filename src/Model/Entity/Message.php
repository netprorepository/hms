<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Message Entity
 *
 * @property int $id
 * @property string $message
 * @property int $user_id
 * @property int $receiver_id
 * @property \Cake\I18n\FrozenTime $created_date
 * @property string $readstatus
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Receiver $receiver
 */
class Message extends Entity
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
        'message' => true,
        'user_id' => true,
        'receiver_id' => true,
        'created_date' => true,
        'readstatus' => true,
        'user' => true,
        'receiver' => true
    ];
}