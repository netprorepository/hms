<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Emailtemplate Entity
 *
 * @property int $id
 * @property string $task
 * @property string $subject
 * @property string $body
 * @property \Cake\I18n\FrozenTime $created_date
 * @property int $admin_id
 *
 * @property \App\Model\Entity\Admin $admin
 */
class Emailtemplate extends Entity
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
        'task' => true,
        'subject' => true,
        'body' => true,
        'created_date' => true,
        'admin_id' => true,
        'admin' => true
    ];
}
