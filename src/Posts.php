<?php

namespace SuperMetrics;

include "src/Post.php";
/**
 * Class that calls the getPosts API and processes the pages and delivers an output
 */
class Posts
{
    /**
     * @var Config holds the configuration object
     */
    private Config $c;
    /**
     * @var string holds the token to use to get the posts
     */
    private string $token;
    /**
     * Class Constructor. Sets tthe token and config supplied as inputs and initializes weekly lookup, stats and user_posts arrays
     * @param string Contains the token
     * @param Config Contains the Config
     */
    function __construct($token, $config)
    {
        $this->c = $config;
        $this->token = $token;
        /**
         * @var array will hold monthly stats for the posts
         */
        $this->stats = [];
        /**
         * @var array will hold the weekly data for the posts
         */
        $this->weekly_lookup = [];
        /**
         * @var array will hold user wise data for the posts
         */
        $this->user_posts = [];
    }
    /**
     * gets the posts recursively for the number of pages in the config, parses the posts 
     * and breaks them down into usable functions and delivers output in the requested format
     * @return array the completed output to be strigified and displayed
     */
    function get_posts()
    {
        for ($i = 1; $i < $this->c->get_number_of_pages() + 1; $i++) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $this->c->get_post_url() . "?sl_token=" . $this->token . "&page=" . $i,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response);
            foreach ($response->data->posts as $post_entry) {
                $post = new Post($post_entry);
                $time = strtotime($post->get_created_time());
                $month = date("m", $time);
                $year = date("Y", $time);
                $tmp = (int)date("W", $time);
                $week = date("n", $time) == "1" && $tmp > 51 ? 0 : $tmp;
                /** Stats Calculation */
                if (!isset($this->stats[$year])) {
                    $this->stats[$year] = [];
                }
                if (!isset($this->stats[$year][$month])) {
                    $this->stats[$year][$month] = ["total_characters" => 0, "average_character_length" => 0, "total_posts" => 0, "longest_post_by_character_length" => null];
                }
                $this->stats[$year][$month]["total_posts"]++;
                $message_length = $post->get_message_length();
                $this->stats[$year][$month]["longest_post_by_character_length"] = $this->stats[$year][$month]["longest_post_by_character_length"] < $message_length ? $message_length : $this->stats[$year][$month]["longest_post_by_character_length"];
                $this->stats[$year][$month]["total_characters"] = $this->stats[$year][$month]["total_characters"] + $message_length;
                $this->stats[$year][$month]["average_character_length"] = (int)($this->stats[$year][$month]["total_characters"] / $this->stats[$year][$month]["total_posts"]);
                /** End Stats Calculation */
                /** Weekly Lookup Calculation */
                if (!isset($this->weekly_lookup[$year])) {
                    $this->weekly_lookup[$year] = [];
                }
                if (!isset($this->weekly_lookup[$year][$week])) {
                    $this->weekly_lookup[$year][$week] = 0;
                }
                $this->weekly_lookup[$year][$week]++;
                /** End Weekly Lookup Calculation */
                /** User Calculation */
                if (!isset($this->user_posts[$post->get_from_id()])) {
                    $this->user_posts[$post->get_from_id()] = [];
                }
                if (!isset($this->user_posts[$post->get_from_id()][$year])) {
                    $this->user_posts[$post->get_from_id()][$year] = [];
                }
                if (!isset($this->user_posts[$post->get_from_id()][$year][$month])) {
                    $this->user_posts[$post->get_from_id()][$year][$month] = 0;
                }
                $this->user_posts[$post->get_from_id()][$year][$month]++;
                /** End User Calculation */
            }
        }
        $this->average_user_posts();
        return $this->format_output();
    }
    /**
     * groups multilple class variables into a deliverable output
     */
    private function format_output()
    {
        $output = [
            "average_user_posts_per_month" => $this->user_posts,
            "total_posts_split_by_week_number" => $this->weekly_lookup,
            "monthly_stats" => $this->stats
        ];
        return $output;
    }
    /**
     * function to find the average user posts per month, is run after the get_posts is completed
     */
    private function average_user_posts()
    {
        foreach ($this->user_posts as $key => $user) {
            $sum = 0;
            $months = 0;
            foreach ($user as $year) {
                $sum = $sum + array_sum($year);
                $months = $months + sizeof($year);
            }
            $this->user_posts[$key] = (int)($sum / $months);
        }
    }
}
