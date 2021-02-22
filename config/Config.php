<?php

namespace SmartMetrics;

/**
 * Class providing the configuration variables required in the project, and provides getter-setter methods
 */
class Config
{
    /**
     * @var string contains the client-id to be supplied in the request token API
     */
    private $client_id = "ju16a6m81mhid5ue1z3v2g0uh";
    /**
     * @var string contains the email to be supplied in the request token API
     */
    private $email = "chitkosarvesh@gmail.com";
    /**
     * @var string contains the name to be supplied in the request token API
     */
    private $name = "Sarvesh Chitko";
    /**
     * @var string The base url to be used for all APIs in the project
     */
    private $base_url = "https://api.supermetrics.com/assignment/";
    /**
     * @var string the URI for registering a token, suffixed to the base URL
     */
    private $register_url = "register";
    /**
     * @var string the URI for getting posts, suffixed to the base URL
     */
    private $post_url = "posts";
    /**
     * @var int number of pages that will be supplied (documentation indicates 10)
     */
    private $number_of_pages = 10;
    /**
     * Returns the client id
     * @return string
     */
    public function get_client_id()
    {
        return $this->client_id;
    }
    /**
     * Returns the email
     * @return string
     */
    public function get_email()
    {
        return $this->email;
    }
    /**
     * Returns the name
     * @return string
     */
    public function get_name()
    {
        return $this->name;
    }
    /**
     * Returns the complete register URL, prefixed with the base URL
     * @return string
     */
    public function get_register_url()
    {
        return $this->base_url . $this->register_url;
    }
    /**
     * Returns the complete getPosts URL, prefixed with the base URL
     * @return string
     */
    public function get_post_url()
    {
        return $this->base_url . $this->post_url;
    }
    /**
     * Returns the number of pages
     * @return int
     */
    public function get_number_of_pages()
    {
        return $this->number_of_pages;
    }
}
