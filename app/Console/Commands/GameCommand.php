<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GameCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:play';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $randomNumber = random_int(0,10);
        $userNumber = $this->ask('Enter the number from 0 to 10');
        if($userNumber>10 || $userNumber<0){
        $this->error('Enter the number from 0 to 10');
        } else{
            switch ($userNumber){
            case $userNumber>$randomNumber:
                $this->info("Congrats, $randomNumber less then your number $userNumber");
                break;
            case $userNumber < $randomNumber:
                $this->error("Sorry but $randomNumber > $userNumber");
                break;
            case $userNumber==$randomNumber:
                $this->info("It is equal");
                break;
        }}
        return 0;
    }
}
