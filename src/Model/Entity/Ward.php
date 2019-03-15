<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ward Entity
 *
 * @property int $id
 * @property string $wardname
 *
 * @property \App\Model\Entity\Admission[] $admissions
 */
class Ward extends Entity
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
        'wardname' => true,
        'admissions' => true
    ];
}
