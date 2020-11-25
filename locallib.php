<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Local Library file for additional Functions
 *
 * @package    block_leeloo_subscriptions
 * @copyright  2020 Leeloo LXP (https://leeloolxp.com)
 * @author     Leeloo LXP <info@leeloolxp.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Fetch and Update Configration From L
 */
function updateconfleeloo_subscriptions(){
    $leeloolxplicense = get_config('block_leeloo_subscriptions')->license;
    
    $url = 'https://leeloolxp.com/api_moodle.php/?action=page_info';
    $postdata = '&license_key=' . $leeloolxplicense;
    $curl = new curl;
    $options = array(
        'CURLOPT_RETURNTRANSFER' => true,
        'CURLOPT_HEADER' => false,
        'CURLOPT_POST' => 1,
    );
    if (!$output = $curl->post($url, $postdata, $options)) {
        
    }
    $infoleeloolxp = json_decode($output);
    if ($infoleeloolxp->status != 'false') {
        $leeloolxpurl = $infoleeloolxp->data->install_url;
    } else {
        
    }
    $url = $leeloolxpurl . '/admin/Theme_setup/get_subscriptions';
    $postdata = '&license_key=' . $leeloolxplicense;
    $curl = new curl;
    $options = array(
        'CURLOPT_RETURNTRANSFER' => true,
        'CURLOPT_HEADER' => false,
        'CURLOPT_POST' => 1,
    );
    if (!$output = $curl->post($url, $postdata, $options)) {
        
    }
    set_config('settingsjson', base64_encode($output), 'block_leeloo_subscriptions');
}