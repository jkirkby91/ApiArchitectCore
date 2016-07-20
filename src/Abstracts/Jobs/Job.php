<?php

namespace ApiArchitect\Core\Jobs;

use Illuminate\Bus\Queueable;

/**
 * Class Job
 *
 * @package ApiArchitect\Jobs
 * @author James Kirkby <hello@jameskirkby.com>4e
 *
 */
abstract class AbstractJob
{
    use Queueable;
}
