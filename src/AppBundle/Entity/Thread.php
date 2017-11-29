<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 18/01/17
 * Time: 16:36
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\CommentBundle\Entity\Thread as BaseThread;

/**
 * @ORM\Entity
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 * @ORM\Table(name="Hilo")
 */
class Thread extends BaseThread
{
    /**
     * @var string $id
     *
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    protected $id;
}
