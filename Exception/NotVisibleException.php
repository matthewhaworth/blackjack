<?php
namespace Cards\Exception;

use Exception;

class NotVisibleException extends \Exception
{
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        if ($message === "") {
            $message = 'You are trying to view a card that is not currently visible.';
        }

        parent::__construct($message, $code, $previous);
    }


}