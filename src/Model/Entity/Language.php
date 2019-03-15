<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Language Entity
 *
 * @property int $phrase_id
 * @property string $phrase
 * @property string $english
 * @property string $bengali
 * @property string $spanish
 * @property string $arabic
 * @property string $dutch
 * @property string $russian
 * @property string $chinese
 * @property string $turkish
 * @property string $portuguese
 * @property string $hungarian
 * @property string $french
 * @property string $greek
 * @property string $german
 * @property string $italian
 * @property string $thai
 * @property string $urdu
 * @property string $hindi
 * @property string $latin
 * @property string $indonesian
 * @property string $japanese
 * @property string $korean
 */
class Language extends Entity
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
        'phrase' => true,
        'english' => true,
        'bengali' => true,
        'spanish' => true,
        'arabic' => true,
        'dutch' => true,
        'russian' => true,
        'chinese' => true,
        'turkish' => true,
        'portuguese' => true,
        'hungarian' => true,
        'french' => true,
        'greek' => true,
        'german' => true,
        'italian' => true,
        'thai' => true,
        'urdu' => true,
        'hindi' => true,
        'latin' => true,
        'indonesian' => true,
        'japanese' => true,
        'korean' => true
    ];
}
