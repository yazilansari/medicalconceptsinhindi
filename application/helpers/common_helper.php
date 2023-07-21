<?php defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('dateDifference')) {

	function dateDifference($date_1, $date_2, $differenceFormat = '%R%a')
	{
		$datetime1 = date_create($date_1);
		$datetime2 = date_create($date_2);

		$interval = date_diff($datetime1, $datetime2);

		return (int) $interval->format($differenceFormat);
	}
}

if (!function_exists('arrayMapRecursive')) {
	function arrayMapRecursive($callback, $array)
	{
		$func = function ($item) use (&$func, &$callback) {
			return is_array($item) ? array_map($func, $item) : call_user_func($callback, $item);
		};

		return array_map($func, $array);
	}
}

if (!function_exists('token')) {
	function token($length = 32)
	{
		// Create random token
		$string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

		$max = strlen($string) - 1;

		$token = '';

		for ($i = 0; $i < $length; $i++) {
			$token .= $string[mt_rand(0, $max)];
		}

		return $token;
	}
}

function token($length = 32)
{
	// Create random token
	$string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

	$max = strlen($string) - 1;

	$token = '';

	for ($i = 0; $i < $length; $i++) {
		$token .= $string[mt_rand(0, $max)];
	}

	return $token;
}

function get_image_path($file_name = "")
{

	$CI = &get_instance();
	$image_folder_path = config_item('image_url');

	$image_url = $image_folder_path . $file_name;

	return $image_url;
}

function get_konnect_data_path($file_name = "", $id = "", $upload_type)
{

	$CI = &get_instance();

	$folder = config_item('upload_ho_konnect_path');

	if ($upload_type == "audio") {

		$audio_folder_path = $folder . 'ho_konnect_audio/' . $id . "/";

		$audio_url = $audio_folder_path . $file_name;

		return $audio_url;
	} else if ($upload_type == "video") {

		$video_folder_path = $folder . 'ho_konnect_video/' . $id . "/";

		$video_url = $video_folder_path . $file_name;

		return $video_url;
	} else if ($upload_type == "ppt") {

		$ppt_folder_path = $folder . 'ho_konnect_ppt/' . $id . "/";

		$ppt_url = $ppt_folder_path . $file_name;

		return $ppt_url;
	} else if ($upload_type == "pdf") {

		$pdf_folder_path = $folder . 'ho_konnect_pdf/' . $id . "/";

		$pdf_url = $pdf_folder_path . $file_name;

		return $pdf_url;
	} else if ($upload_type == "thumbnail") {

		$thumbnail_folder_path = $folder . 'ho_konnect_thumbnail/';

		$thumbnail_url = $thumbnail_folder_path . $file_name;

		return $thumbnail_url;
	}
}

function get_uploaded_time_ago($date)
{

	$given_date = $date;

	$datetime1 = new DateTime($given_date);
	$datetime2 = new DateTime(date('Y-m-d H:i:s'));
	$interval = $datetime2->diff($datetime1);

	$hours = $interval->format('%h');
	$mins = $interval->format('%i');
	$days = $interval->format('%a');

	if ($days < 1 && $hours < 24) {
		return "Released " . $hours . " Hours " . $mins . " Minutes" . " Ago";
	} else if ($days == 1) {
		return "Released " . $days . " Day Ago";
	} else {
		return "Released " . $days . " Days Ago";
	}
}

function get_uploaded_data_path($file_name = "", $id, $upload_type)
{

	$CI = &get_instance();

	$url = "";
	if ($file_name != "") {

		if ($upload_type == "audio") {

			$folder_path = config_item('posts_audio_path') . $id . '/';

			$url = $folder_path . $file_name;
		} else if ($upload_type == "video") {

			$folder_path = config_item('posts_video_path') . $id . '/';

			$url = $folder_path . $file_name;
		} else if ($upload_type == "image") {

			$folder_path = config_item('posts_images_path') . $id . '/';

			$url = $folder_path . $file_name;
		} else if ($upload_type == "pdf") {

			$folder_path = config_item('posts_pdf_path') . $id . '/';

			$url = $folder_path . $file_name;
		}
	} else {
		$file_path = config_item('no_image_path');
		$url = $file_path . "no_image.jpg";
	}


	return $url;
}

function get_thumbnail_no_image($file_name = "", $id, $upload_type)
{

	$CI = &get_instance();

	$url = "";
	if ($file_name != "") {
		$folder_path = config_item('posts_thumbnail_path') . $id . "/";

		$check_apth = config_item('posts_thumbnail_exists') . $id . "/" . $file_name;

		if (file_exists($check_apth)) {
			$url = $folder_path . $file_name;
		} else {
			$url = config_item('no_image_path') . "medicalDirectors.jpg";
		}
		//$url = $folder_path.$file_name;
	} else {
		$file_path = config_item('no_image_path');
		$url = $file_path . "no_image.jpg";
	}


	return $url;
}


function get_sub_category_image_path($filename)
{

	$CI = &get_instance();

	$folder = config_item('posts_images_path');

	$image_url = "";

	if ($filename != "") {
		$image_url = $folder . $filename;
	} else {
		$file_path = config_item('no_image_path');
		$image_url = $file_path . "no_image.jpg";
	}

	return $image_url;
}

function get_ho_appreciation_path($filename, $id)
{

	$CI = &get_instance();

	$folder = config_item('upload_ho_message_path');

	$image_url = $folder . $id . "/" . $filename;

	return $image_url;
}

function check_image_exists($file)
{
	//echo "12321213";exit;
	$image = "";

	$CI = &get_instance();

	$file_path = config_item('no_image_path');

	$file_created_path = str_replace(config_item('base_url'), "", $file);

	if (file_exists($file_created_path)) {
		$image = $file;
	} else {
		$image = $file_path . "no_image.jpg";
	}
	return $image;
}

function get_contributors_image_path($filename)
{

	$CI = &get_instance();

	$folder = config_item('contributors_data_path');

	$image_url = $folder . $filename;

	return $image_url;
}

function get_icon_path($type)
{

	$CI = &get_instance();

	$folder = config_item('icon_path');

	$image_url = "";

	if ($type == "General") {
		$image_url = $folder . "medical-education.png";
	} else if ($type == "Both") {
		$image_url = $folder . "health-education.png";
	}
	if ($type == "Student") {
		$image_url = $folder . "health-education.png";
	}
	if ($type == "Folder") {
		$image_url = $folder . "folder-icon.png";
	}

	return $image_url;
}
