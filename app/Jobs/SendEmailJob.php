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

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $attachment=null;
    public $subject=null;
    public $contentdata=null;
    public $from=null;
    public $to=null;
    public function __construct($from,$to,$subject,$contentdata,$attachment)
    {




        $this->from=$from;
        $this->to=$to;
        $this->subject=$subject;
        $this->contentdata=$contentdata;
        $this->attachment=$attachment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->to)->send(new messageEmail($this->from,$this->subject,$this->contentdata,$this->attachment));

    }
}
