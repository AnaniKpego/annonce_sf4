<?php
/**
 * Created by PhpStorm.
 * User: PKDTECHNOLOGIESINC-K
 * Date: 09/08/2019
 * Time: 14:12
 */

namespace App\Controller;
use App\Entity\Ad;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing;
use Symfony\Component\Routing\Annotation\Route;

class AdIncrementationController
{
    /**
     * AdIncrementationController constructor.
     * @param ObjectManager $manager
     */
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }
    public function __invoke(Ad $data)
    {
        $data->setChrono($data->getChrono()+1);
        $this->manager->flush();
        return $data;
    }

}