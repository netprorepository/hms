<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Noticeboard Entity
 *
 * @property int $id
 * @property string $notice_title
 * @property string $notice
 * @property \Cake\I18n\FrozenTime $created_date
 */
class Noticeboard extends Entity
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
        'notice_title' => true,
        'notice' => true,
        'created_date' => true
    ];
}
