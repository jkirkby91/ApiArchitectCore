<?php

namespace ApiArchitect\Core\Abstracts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use ApiArchitect\Log\Repositories\RequestLogRepository;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * Class ControllerAbstract
 *
 * @package ApiArchitect
 * @author James Kirkby <hello@jameskirkby.com>
 */
abstract class ControllerAbstract extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var
     */
    public $requestLogRepository;

    /**
     * ControllerAbstract constructor.
     *
     * @param RequestLogRepository $requestLogRepository
     * @param Request $request
     */
    public function __construct(RequestLogRepository $requestLogRepository,Request $request)
    {
        $this->beforeFilter(function ($requestLogRepository,$request) {
            //if request is a get check cache for response first
            if($request->getMethod() == 'get')
            {
                //@TODO Check if response is cached and return
            }
        });
    }
}