<?php

namespace App\Jobs;

use App\Mail\messageEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendCustomEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $attachment=null;
    public $subject=null;
    public $from=null;
    public $fromName=null;
    public $to=null;
    public $view=null;
    public $viewData=null;
    public function __construct($from,$fromName,$to,$subject,$attachment=null,$view,$viewData=[])
    {




        $this->from=$from;
        $this->fromName=$fromName;
        $this->to=$to;
        $this->viewData=$viewData;
        $this->subject=$subject;
        $this->attachment=$attachment;
        $this->view=$view;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .=$headers."Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .=$headers."From: ".$this->fromName." <".$this->from."> \r\n";


        $view= view($this->view)->with(['data'=>$this->viewData]);
        mail($this->to,$this->subject,$view, $headers);
    }
}
