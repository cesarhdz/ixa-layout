<?php namespace Ixa\Layout;


class LayoutNotFoundException extends \Exception{

	protected $paths;

	const DEFAULT_MESSAGE = "No layout found in folders [%1s], Ixa Layout needs at least one file collaed `default.php`";

    // Redefine the exception so message isn't optional
    public function __construct(array $paths, $code = 0, Exception $previous = null) {
        $this->paths = $paths;
        $message = $this->parseMessage();
    
        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }

    protected function parseMessage(){
    	return sprintf(static::DEFAULT_MESSAGE, implode(',', $this->paths));
    }

    // custom string representation of object
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}