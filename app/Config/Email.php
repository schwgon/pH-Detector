<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = '';
    public string $fromName   = '';
    public string $recipients = '';

    /**
     * The "user agent"
     */
    public string $userAgent = 'CodeIgniter';

    /**
     * The mail sending protocol: mail, sendmail, smtp
     */
    public string $protocol = 'smtp';

    /**
     * The server path to Sendmail.
     */
    public string $mailPath = '/usr/sbin/sendmail';

    /**
     * SMTP Server Hostname
     */
    public string $SMTPHost = 'smtp.gmail.com';

    /**
     * SMTP Username
     */
    public string $SMTPUser = 'gasparschwartz@alumnos.itr3.edu.ar';

    /**
     * SMTP Password
     */
    public string $SMTPPass = 'njkv gspa eunb huwp';

    /**
     * SMTP Port
     */
    public int $SMTPPort = 587;
    //public int $SMTPPort = 25; // anterior

    /**
     * SMTP Timeout (in seconds)
     */
    public int $SMTPTimeout = 5;

    /**
     * Enable persistent SMTP connections
     */
    public bool $SMTPKeepAlive = false;

    /**
     * SMTP Encryption.
     *
     * @var string '', 'tls' or 'ssl'. 'tls' will issue a STARTTLS command
     *             to the server. 'ssl' means implicit SSL. Connection on port
     *             465 should set this to ''.
     */
    public string $SMTPCrypto = 'tls';

    /**
     * Enable word-wrap
     */
    public bool $wordWrap = true;

    /**
     * Character count to wrap at
     */
    public int $wrapChars = 76;

    /**
     * Type of mail, either 'text' or 'html'
     */
    public string $mailType = 'text';

    /**
     * Character set (utf-8, iso-8859-1, etc.)
     */
    public string $charset = 'iso-8859-1';

    /**
     * Whether to validate the email address
     */
    public bool $validate = false;

    /**
     * Email Priority. 1 = highest. 5 = lowest. 3 = normal
     */
    public int $priority = 3;

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     */
    public string $CRLF = "\r\n";

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     */
    public string $newline = "\r\n";

    /**
     * Enable BCC Batch Mode.
     */
    public bool $BCCBatchMode = false;

    /**
     * Number of emails in each BCC batch
     */
    public int $BCCBatchSize = 200;

    /**
     * Enable notify message from server
     */
    public bool $DSN = false;


    // public $SMTPHost = 'smtp.gmail.com';
    // public $SMTPUser = 'tu_email@gmail.com';
    // public $SMTPPass = 'tu_contraseña';
    // public $SMTPPort = 587;
    // public $SMTPCrypto = 'tls';  // Para TLS
    // public $mailType = 'text';
    // public $Charset = 'iso-8859-1';
    // public $WordWrap = true;

    // public $fromEmail  = 'gasparschwartz@alumnos.itr3.edu.ar';
    // public $fromName   = 'pH-Detector';
    // public $SMTPHost   = 'smtp.example.com'; // Cambia por tu servidor SMTP
    // public $SMTPUser   = 'tu_usuario@example.com'; // Cambia por tu usuario de correo
    // public $SMTPPass   = 'tu_contraseña'; // Cambia por tu contraseña de correo
    // public $SMTPPort   = 587; // Cambia por el puerto SMTP correcto, 587 o 465 para SSL
    // public $SMTPCrypto = 'tls'; // tls o ssl dependiendo de tu servidor
    // public $protocol   = 'smtp';
    // public $mailType   = 'html'; // Puedes cambiarlo a 'text' si no quieres HTML
    // public $charset    = 'utf-8';
    // public $wordWrap   = true;
}
