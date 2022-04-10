<?php

namespace App\Jobs;

use App\Mail\BulkMail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendBulkMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $subject;
    public $emails;
    public $content;
    public $sender;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subject, $emails, $content, $sender)
    {
        $this->subject = $subject;
        $this->emails = $emails;
        $this->content = $content;
        $this->sender = $sender;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->emails as $value) {
            Mail::to($value->email)->send(new BulkMail($this->subject, $this->content, $this->sender));
        }
    }
}
