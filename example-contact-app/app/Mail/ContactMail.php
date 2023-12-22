<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Request $request)
    {

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: $this->request->email,
            /**
             * 本番環境でconfig:cacheコマンドを実行した際、.envファイルを読み込まない
             * https://hiroto-k.hatenablog.com/entry/2018/03/28/213000
             */
            to: config('mail.to.address'),
            subject: 'お問い合わせメールテスト',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            // 平文
            // text: 'emails.contact',

            // かっこよくしてくれてるやつ
            markdown: 'emails.contact',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
