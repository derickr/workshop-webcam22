<?php
class Worker
{
    private array $workers;

    public function obtainTask() : int
    {
        usleep( 100000 );
        $number = random_int(0, 42);
        return $number;
    }
}

$w = new Worker;

while (true)
{
    //xdebug_connect_to_client();
    $taskId = $w->obtainTask();

    echo "- ", $taskId * M_PI, "\n";
}