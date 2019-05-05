<?php 
namespace System;

/**
* Response
*/
class Response
{
    /**
     * The content of the response.
     * @var mixed
     */
    public $content;

    /**
     * The HTTP status code.
     * @var int
     */
    public $status;

    /**
     * The response headers.
     * @var array
     */
    private $headers = [];

    /**
     * HTTP status codes.
     * @var array
     */
    private $statuses = [
        100 => 'Continue',
        101 => 'Switching Protocols',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-Status',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        307 => 'Temporary Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        422 => 'Unprocessable Entity',
        423 => 'Locked',
        424 => 'Failed Dependency',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        507 => 'Insufficient Storage',
        509 => 'Bandwidth Limit Exceeded'
    ];

    /**
     * Create a new response instance.
     * @param mixed $content 
     * @param int $status
     */
    public function __construct($content, $status = 200)
    {
        $this->content = $content;
        $this->status = $status;
    }

    /**
     * Send the response to the browser.
     * @return void 
     */
    public function send()
    {
        // Set the content type if it has not been set.
        if (! array_key_exists('Content-Type', $this->headers)) {
            $this->header('Content-Type', 'text/html; charset=utf-8');
        }
        
        if (! headers_sent()) {
            // Send the HTTP protocol and status code.
            $protocol = (isset($_SERVER['SERVER_PROTOCOL'])) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.1';
            $protocol = 'HTTP/1.0';

            header($protocol.' '.$this->status.' '.$this->statuses[$this->status]);
            // header("HTTP/1.0 404 Not Found");
            
            // Send the rest of the headers.
            foreach ($this->headers as $name => $value) {
                header($name.': '.$value, true);
            }
            // header('WWW-Authenticate: Negotiate');
            // header('WWW-Authenticate: NTLM', false);
            // header("HTTP/1.0 200 OK", false);
            // var_dump(headers_list());
        }

        // Send the content of the response to the browser.
        echo (string) $this->content;
    }

    /**
     * Add a header to the response.
     * @param  string $name  
     * @param  string $value 
     * @return Response        
     */
    public function header($name, $value)
    {
        $this->headers[$name] = $value;
        return $this;
    }
}
