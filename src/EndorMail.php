<?php

namespace Endor\MailSdk;

class EndorMail
{
    const API_URL = 'https://email.endor.digital';

    const API_ENDPOINT = '/api/email/send';

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var array
     */
    protected $to = [];

    /**
     * @var string
     */
    protected $from;

    /**
     * @var array
     */
    protected $bcc = [];

    /**
     * @var string
     */
    protected $subject;

    /**
     * @var string
     */
    protected $content;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return mixed
     */
    public function send()
    {
        $request = curl_init(self::API_URL . self::API_ENDPOINT);
        $data = [
            'to' => $this->to,
            'from' => $this->from,
            'bcc' => $this->bcc,
            'subject' => $this->subject,
            'content' => $this->content
        ];
        curl_setopt( $request, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt( $request, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->apiKey
        ]);
        curl_setopt( $request, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($request);
        curl_close($request);

        return json_decode($response);
    }

    /**
     * @param $to
     * @return $this
     */
    public function to($to)
    {
        if (!is_array($to)) {
            $to = [$to];
        }
        $this->to = $to;
        return $this;
    }

    /**
     * @param $from
     * @return $this
     */
    public function from($from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @param $bcc
     * @return $this
     */
    public function bcc($bcc)
    {
        if (!is_array($bcc)) {
            $bcc = [$bcc];
        }
        $this->bcc = $bcc;
        return $this;
    }

    /**
     * @param $subject
     * @return $this
     */
    public function subject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @param $content
     * @return $this
     */
    public function content($content)
    {
        $this->content = $content;
        return $this;
    }
}
