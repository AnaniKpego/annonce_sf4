<?php
/**
 * Created by PhpStorm.
 * User: PKDTECHNOLOGIESINC-K
 * Date: 13/08/2019
 * Time: 16:10
 */

namespace App\Events;


use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Advertiser;
use App\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PasswordEncoderSubscriber implements EventSubscriberInterface
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;

    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * ['eventName' => 'methodName']
     *  * ['eventName' => ['methodName', $priority]]
     *  * ['eventName' => [['methodName1', $priority], ['methodName2']]]
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {

        // TODO: Implement getSubscribedEvents() method.

        return [
            kernelEvents::VIEW => ['encoderPassword', EventPriorities::PRE_WRITE]
        ];
        
    }

    /**
     * @param ViewEvent $event
     */
    public function encoderPassword(ViewEvent $event)
    {
       $advertisers =  $event->getControllerResult();
       $users = $event->getControllerResult();

       $method = $event->getRequest()->getMethod(); // POST, GET, PUT...

       if ($advertisers instanceof Advertiser  && $method === "POST"){
            $hash = $this->encoder->encodePassword($advertisers, $advertisers->getPassword());
            $advertisers->setPassword($hash);
            //dd($result);
       }
        if ( $users instanceof User && $method === "POST"){
            $hash = $this->encoder->encodePassword($users, $users->getPassword());
            $users->setPassword($hash);
            //dd($result);
        }

    }

}