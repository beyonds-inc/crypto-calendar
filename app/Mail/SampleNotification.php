<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SampleNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;
    protected $report_title;
    protected $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($name='テスト', $report_title='テストです。', $body='テストです。')
    {
      $this->title = sprintf('%sさんへの通報がありました。', $name);
      $this->report_title = $report_title;
      $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.sample_notification')
                    ->text('emails.sample_notification_plain')
                    ->subject($this->title)
                    ->with([
                        'report_title' => $this->report_title,
                        'body' => $this->body,
                      ]);
    }
}
