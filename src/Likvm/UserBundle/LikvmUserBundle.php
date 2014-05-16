<?php

namespace Likvm\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class LikvmUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }

}