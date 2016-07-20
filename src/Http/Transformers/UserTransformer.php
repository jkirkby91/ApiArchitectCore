<?php

namespace ApiArchitect\Core\Http\Transformers;

use ApiArchitect\Core\Entities\User;
use ApiArchitect\Core\Abstracts\Http\Transformers\TransformerAbstract;

/**
 * Class UserTransformer
 *
 * @package ApiArchitect\Transformers
 * @author James Kirkby <hello@jameskirkby.com>
 */
class UserTransformer extends TransformerAbstract
{
    /**
     * @param User $user
     * @return UserTransformer
     */
    public function transform(User $user)
    {
        return $this->doTransform($user);
    }

    /**
     * @param $object
     * @return static
     */
    protected function doTransform($object)
    {
        return $this->abstractResponseFormat([
            'user' => [
                'id' 	=> $object->getId(),
                'name'  => $object->getName(),
                'email'	=> $object->getEmail()
            ],
        ]);
    }
}