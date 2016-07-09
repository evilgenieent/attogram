<?php // Attogram Framework - event_logger class v0.0.3

namespace Attogram;

use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;

class event_logger extends AbstractProcessingHandler
{
    private $database;

    /**
     * start the event Logger
    * @param object $database     Attogram Database object
    * @param string $level  (optional) Minimum reporting level, Defaults to debug
    * @param bool   $bubble (optional) Bubble up, Defaults to true
    * @return void
    */
    public function __construct( $database, $level = Logger::DEBUG, $bubble = true )
    {
        $this->database = $database;
        parent::__construct( $level, $bubble );
    }

    /**
     * write an event to the Database
     * @param array $record
     * @return void
     */
    protected function write( array $record )
    {
        $this->database->queryb(
        'INSERT INTO event (channel,level,message,time) VALUES (:channel,:level,:message,:time)',
        array('channel' => $record['channel'],
              'level' => $record['level'],
              'message' => $record['formatted'],
              'time' => $record['datetime']->format('U')
        )
      );
    }

} // end class class event_logger
