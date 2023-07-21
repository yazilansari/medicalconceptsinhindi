<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');



class User_login extends CI_Model
{



    /*

     * Get rows from the users table

     */

    public function getuserinfo($number, $otp)
    {



        $q = $this->db->where('user_number', $number)

            ->where('inactive', '1')

            ->get('user_info');



        if ($q->num_rows() > 0) {
            foreach ($q->row_array() as $value) {
                $id = $value['user_id'];

                $data = array(

                    "otp" => "$otp",

                    "otp_status" => "0",

                    "created_at" => date("Y-m-d H:i:s"),
                );

                $data = $this->security->xss_clean($data);

                if ($this->db->where('user_id', $id)
                    ->update('otp_table', $data)
                ) {
                    return true;
                } else {

                    return false;
                }
            }
        } else {

            $data = array(

                "user_number" => "$number",

                "number_verify" => "0",

                "created_on" => date("Y-m-d H:i:s"),

                "inactive" => "1",

            );
            $data = $this->security->xss_clean($data);
            if ($this->db->insert('user_info', $data)) {
                $data = array(

                    "user_id" => $this->db->insert_id(),

                    "otp" => "$otp",

                    "otp_status" => "0",

                    "created_at" => date("Y-m-d H:i:s"),
                );

                $data = $this->security->xss_clean($data);

                if ($this->db->insert('otp_table', $data)) {
                    return true;
                } else {

                    return false;
                }
            } else {

                return false;
            }
        }
    }

    public function check_otp_verify($number1, $password)
    {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE number = '" . $number1 . "' AND password = '" . $password . "'";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach ($q->row_array() as $value) {

                return $q->result_array();
            }
        } else {
            return '';
        }
    }

    public function update_user_login($number1)
    {
        $q = $this->db->where('number', $number1)

            ->where('is_active', '1')

            ->get('users');
        if ($q->num_rows() > 0) {

            foreach ($q->row_array() as $value) {

                return $q->result_array();
            }
        } else {
            return false;
        }
    }

    public function update_user_otp_get_details($number, $otp)
    {
        $q = $this->db->where('user_number', $number)

            ->get('user_info');
        if ($q->num_rows() > 0) {

            foreach ($q->row_array() as $value) {
                $id = $value;
                //echo $otp;
                $data = array(
                    "otp" => $otp
                );

                $data = $this->security->xss_clean($data);

                if ($this->db->where('user_id', $id)
                    ->update('otp_table', $data)
                ) {
                    return $q->result_array();
                } else {

                    return false;
                }
            }
        } else {
            return false;
        }
    }
    /*

     * Update user data

     */

    public function getuserupdate($user_id, $users_name, $email_id, $qualification, $medical_college)
    {

        $qqq = $this->db->where('users_id', $user_id)

            ->where('is_active', "1")

            ->get('users');

        if ($qqq->num_rows() > 0) {

            $data = array(

                "users_name" => "$users_name",
                "email_id" => "$email_id",
                "student_qualification" => "$qualification",
                "medical_college" => "$medical_college"

            );

            $data = $this->security->xss_clean($data);

            if ($this->db->where('users_id', $user_id)->update('users', $data)) {

                $q = $this->db->where('users_id', $user_id)

                    ->where('is_active', "1")

                    ->get('users');
                if ($q->num_rows() > 0) {
                    return $q->result_array();
                }
            } else {

                return '';
            }
        } else {
            return '';
        }
    }



    //this function for insert live data for driver   

    public function driverlivedetails_model($user_id, $vahicle_type, $capacity, $longitude, $latitude, $distance, $price)
    {

        $qqq = $this->db->where('user_id', $user_id)

            ->where('inactive', "1")
            ->where('user_type', "Seller")
            ->get('user_info');

        if ($qqq->num_rows() > 0) {
            return array("msg" => "You are a seller so not go to live");
        } else {
            $qqqq = $this->db->where('user_id', $user_id)

                ->where('status', "1")
                ->get('driver_table');

            if ($qqqq->num_rows() > 0) {

                return array("msg" => "Your already live");
            } else {
                $data = array(
                    "user_id" => "$user_id",

                    "driver_vahicle_type" => "$vahicle_type",

                    "driver_capacity" => "$capacity",

                    "driver_longitude" => "$longitude",

                    "driver_latitude" => "$latitude",

                    "driver_distance" => "$distance",

                    "driver_price" => "$price",

                    "status" => "1",

                    "created_on" => date("Y-m-d H:i:s"),

                    "created_by" => $user_id

                );

                $data = $this->security->xss_clean($data);

                if ($this->db->insert('driver_table', $data)) {

                    $qq = $this->db->where('driver_live_id', $this->db->insert_id())
                        ->get('driver_table');
                    if ($qq->num_rows() > 0) {
                        return $qq->row_array();
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        }
    }

    public function driverlivedetailswithload_model($user_id, $vahicle_type, $capacity, $longitude, $latitude, $distance, $price, $item_name, $metal_category)
    {

        $qqq = $this->db->where('user_id', $user_id)

            ->where('inactive', "1")
            ->where('user_type', "Seller")
            ->get('user_info');

        if ($qqq->num_rows() > 0) {

            return array("msg" => "You are a seller so not go to live");
        } else {
            $qqqq = $this->db->where('user_id', $user_id)

                ->where('status', "1")
                ->get('driver_table');

            if ($qqqq->num_rows() > 0) {

                return array("msg" => "Your already live");
            } else {
                $data = array(
                    "user_id" => "$user_id",

                    "driver_vahicle_type" => "$vahicle_type",

                    "driver_capacity" => "$capacity",

                    "driver_longitude" => "$longitude",

                    "driver_latitude" => "$latitude",

                    "driver_distance" => "$distance",

                    "driver_price" => "$price",

                    "item_name" => "$item_name",

                    "metal_category" => "$metal_category",

                    "status" => "1",

                    "created_on" => date("Y-m-d H:i:s"),

                    "created_by" => $user_id
                );
                $data = $this->security->xss_clean($data);
                if ($this->db->insert('driver_table', $data)) {

                    $qq = $this->db->where('driver_live_id', $this->db->insert_id())
                        ->get('driver_table');
                    if ($qq->num_rows() > 0) {
                        return $qq->row_array();
                    } else {
                        return array("msg" => "No data available");
                    }
                }
            }
        }
    }

    public function check_driver_status_model($user_id)
    {
        $qqqq = $this->db->where('user_id', $user_id)
            ->where('status', "1")
            ->get('driver_table');

        if ($qqqq->num_rows() > 0) {
            return "1";
        } else {
            return "0";
        }
    }


    //for get according to user get driver live info

    public function get_driver_live_and_done_record_model($user_id)
    {
        $qqq = $qqq = $this->db->query("SELECT * FROM driver_table WHERE user_id = '$user_id' && seller_id ='' ORDER BY driver_live_id DESC");

        if ($qqq->num_rows() > 0) {

            //return $qqq->result_array();
            $data = $qqq->result_array();

            foreach ($data as $main) {
                $user = $main['user_id'];
                //Get Driver ID
                $data_driver = $this->db->where('user_id', $user)
                    ->get('user_info');
                $driver_data = $data_driver->result_array();
                if (!empty($driver_data)) {
                    $name_name = $driver_data[0]['user_name'];
                } else {
                    $name_name = "";
                }


                $response[] = array("driver_live_id" => $main['driver_live_id'], "user_id" => $main['user_id'], "driver_name" => $name_name, "driver_vahicle_type" => $main['driver_vahicle_type'], "driver_capacity" => $main['driver_capacity'], "driver_longitude" => $main['driver_longitude'], "driver_latitude" => $main['driver_latitude'], "driver_distance" => $main['driver_distance'], "driver_price" => $main['driver_price'], "item_name" => $main['item_name'], "metal_category" => $main['metal_category'], "status" => $main['status'], "created_on" => $main['created_on'], "created_by" => $main['created_by'], "updated_on" => $main['updated_on'], "updated_by" => $main['updated_by']);
            }
            return $response;
        } else {
            return false;
        }
    }


    //    buyer bid section 

    public function buyer_bid_model($user_id, $driver_live_id, $bid_price, $note)
    {


        //Get Driver ID
        $data_driver = $this->db->where('driver_live_id', $driver_live_id)


            ->get('driver_table');

        $driver_data = $data_driver->result_array();
        //print_r($driver_data);
        $driver_id = $driver_data[0]['user_id'];
        //exit();
        $qqq = $this->db->where('user_id', $user_id)
            ->where('driver_live_id', $driver_live_id)
            ->where('status', '1')
            ->get('buyer_bid_table');

        if ($qqq->num_rows() > 0) {
            return array("msg" => "already bid this driver");
        } else {
            $aaa = $this->db->where('user_id', $user_id)
                ->where('inactive', "1")
                ->where('user_type', 'Seller')
                ->get('user_info');

            if ($aaa->num_rows() > 0) {

                $data = array(
                    "user_id" => "$user_id",

                    "driver_live_id" => "$driver_live_id",

                    "bid_price" => "$bid_price",

                    "bid_notes" => "$note",

                    "status" => "1",

                    "created_on" => date("Y-m-d H:i:s"),

                    "created_by" => $user_id
                );
                $data = $this->security->xss_clean($data);
                if ($this->db->insert('buyer_bid_table', $data)) {

                    $qq = $this->db->where('bid_id', $this->db->insert_id())
                        ->get('buyer_bid_table');
                    if ($qq->num_rows() > 0) {

                        //Update notification

                        $notification_data = array(
                            "from_user" => "$user_id",

                            "to_user" => "$driver_id",

                            "job_id" => "$driver_live_id",

                            "type" => "bid_request",

                            "seen" => "0",

                            "added_date" => date("Y-m-d H:i:s")
                        );
                        $notification_data = $this->security->xss_clean($notification_data);
                        $this->db->insert('tbl_notification', $notification_data);

                        return $qq->row_array();
                    } else {
                        return array("msg" => "Bid data not fatch");
                    }
                } else {
                    return array("msg" => "Bid not inserted");
                }
            } else {
                return array("msg" => "This user not a seller");
            }
        }
    }



    //    buyer Hire section 

    public function buyer_hire_model($user_id, $driver_live_id, $bid_price, $note, $date_time)
    {

        //Get Driver ID
        $data_driver = $this->db->where('driver_live_id', $driver_live_id)


            ->get('driver_table');

        $driver_data = $data_driver->result_array();
        //print_r($driver_data);
        $driver_id = $driver_data[0]['user_id'];
        //exit();
        $qqq = $this->db->where('user_id', $user_id)
            ->where('driver_live_id', $driver_live_id)
            ->where('status', '1')
            ->get('buyer_hire_table');

        if ($qqq->num_rows() > 0) {
            return array("msg" => "already hired this driver");
        } else {
            $aaa = $this->db->where('user_id', $user_id)
                ->where('inactive', "1")
                ->where('user_type', 'Seller')
                ->get('user_info');

            if ($aaa->num_rows() > 0) {

                $data = array(
                    "user_id" => "$user_id",

                    "driver_live_id" => "$driver_live_id",

                    "bid_price" => "$bid_price",

                    "bid_notes" => "$note",

                    "date_time" => "$date_time",

                    "status" => "1",

                    "created_on" => date("Y-m-d H:i:s"),

                    "created_by" => $user_id
                );
                $data = $this->security->xss_clean($data);
                if ($this->db->insert('buyer_hire_table', $data)) {

                    $qq = $this->db->where('id', $this->db->insert_id())
                        ->get('buyer_hire_table');
                    if ($qq->num_rows() > 0) {

                        //Update notification

                        $notification_data = array(
                            "from_user" => "$user_id",

                            "to_user" => "$driver_id",

                            "job_id" => "$driver_live_id",

                            "type" => "hire_request",

                            "seen" => "0",

                            "added_date" => date("Y-m-d H:i:s")
                        );
                        $notification_data = $this->security->xss_clean($notification_data);
                        $this->db->insert('tbl_notification', $notification_data);

                        return $qq->row_array();
                    } else {
                        return array("msg" => "Hire data not fatch");
                    }
                } else {
                    return array("msg" => "Hire not inserted");
                }
            } else {
                return array("msg" => "This user not a seller");
            }
        }
    }


    public function selected_bid_model($driver_id, $seller_id, $bid_id, $action, $type, $job_id)
    {

        if ($type == 'bid') {
            $qqq = $this->db->where('user_id', $seller_id)
                ->where('bid_id', $bid_id)
                ->where('action', '1')
                ->get('buyer_bid_table');

            if ($qqq->num_rows() > 0) {
                return array("msg" => "Already selected");
            } else {

                //Update status of Accetance or Rejection 
                $buyer_bid_table = array(
                    "status" => "0",
                    "action" => $action,
                    "updated_on" => date("Y-m-d H:i:s"),
                    "updated_by" => $driver_id
                );
                $buyer_bid_table = $this->security->xss_clean($buyer_bid_table);

                $this->db->where('driver_live_id', $job_id)->update('buyer_bid_table', $buyer_bid_table);


                if ($action == '1') {

                    //Make driver free
                    $driver_live = array(

                        "seller_id" => $seller_id,
                        "status" => "0",
                        "updated_on" => date("Y-m-d H:i:s"),
                        "updated_by" => $driver_id
                    );
                    $driver_live = $this->security->xss_clean($driver_live);

                    $this->db->where('driver_live_id', $job_id)->update('driver_table', $driver_live);
                }

                $qq = $this->db->select('user_name, user_number, email, user_type')
                    ->where('user_id', $seller_id)
                    ->get('user_info');
                if ($qq->num_rows() > 0) {
                    return $qq->row_array();
                } else {
                    return array("msg" => "Seller data not fatch");
                }
            }
        } else if ($type == 'hire') {
            $qqq = $this->db->where('seller_id', $seller_id)
                ->where('id', $bid_id)
                ->where('action', '1')
                ->get('buyer_hire_table');

            if ($qqq->num_rows() > 0) {
                return array("msg" => "Already selected");
            } else {

                $buyer_bid_table = array(

                    "status" => "0",
                    "action" => $action,
                    "updated_on" => date("Y-m-d H:i:s"),
                    "updated_by" => $driver_id
                );
                $buyer_bid_table = $this->security->xss_clean($buyer_bid_table);

                $this->db->where('driver_live_id', $job_id)->update('buyer_hire_table', $buyer_bid_table);

                if ($action == '1') {
                    $driver_live = array(
                        "seller_id" => $seller_id,
                        "status" => "0",
                        "updated_on" => date("Y-m-d H:i:s"),
                        "updated_by" => $driver_id
                    );
                    $driver_live = $this->security->xss_clean($driver_live);

                    $this->db->where('user_id', $driver_id)->update('driver_table', $driver_live);
                }

                $qq = $this->db->select('user_name, user_number, email, user_type')
                    ->where('user_id', $seller_id)
                    ->get('user_info');
                if ($qq->num_rows() > 0) {
                    return $qq->row_array();
                } else {
                    return array("msg" => "Seller data not fatch");
                }
            }
        } else {
            return array("msg" => "Please select valid action type!");
        }
    }

    ///get live data
    public function get_live_list_model($lat, $lng, $distance)
    {
        $response = array();
        $qqq = $this->db->where('status', '1')
            //->where('driver_distance >=', $start_distance)
            //->where('driver_distance <=', $end_distance)
            ->get('driver_table');

        if ($qqq->num_rows() > 0) {
            //return $qqq->result_array();
            $data = $qqq->result_array();

            foreach ($data as $main) {
                $user = $main['user_id'];
                //Get Driver ID
                $data_driver = $this->db->where('user_id', $user)
                    ->get('user_info');
                $driver_data = $data_driver->result_array();
                if (!empty($driver_data)) {
                    $name_name = $driver_data[0]['user_name'];
                } else {
                    $name_name = "";
                }


                $response[] = array("driver_live_id" => $main['driver_live_id'], "user_id" => $main['user_id'], "driver_name" => $name_name, "driver_vahicle_type" => $main['driver_vahicle_type'], "driver_capacity" => $main['driver_capacity'], "driver_longitude" => $main['driver_longitude'], "driver_latitude" => $main['driver_latitude'], "driver_distance" => $main['driver_distance'], "driver_price" => $main['driver_price'], "item_name" => $main['item_name'], "metal_category" => $main['metal_category'], "status" => $main['status'], "created_on" => $main['created_on'], "created_by" => $main['created_by'], "updated_on" => $main['updated_on'], "updated_by" => $main['updated_by']);
            }
            return $response;
        } else {
            return $response;
        }
    }

    /*

     * Delete user data

     */

    /*public function delete($id){

        //update user from users table

        $delete = $this->db->delete('users',array('id'=>$id));

        //return the status

        return $delete?true:false;

    }*/

    //this function for update profile data

    public function update_user_profile_model($user_id)
    {
        $q = $this->db->where('user_id', $user_id)

            ->where('inactive', '1')

            ->get('user_info');
        if ($q->num_rows() > 0) {

            $data = array(
                "user_name" => $this->input->post('user_name'),
                "user_number" => $this->input->post('user_number'),
                "email" => $this->input->post('email'),
                "updated_on" => date("Y-m-d H:i:s"),
                "updated_by" => $user_id,

            );
            $data = $this->security->xss_clean($data);
            if ($qq = $this->db->where('user_id', $user_id)

                ->where('inactive', '1')

                ->update('user_info', $data)
            ) {

                $qqq = $this->db->where('user_id', $user_id)

                    ->where('inactive', '1')

                    ->get('user_info');
                if ($qqq->num_rows() > 0) {
                    return $qqq->result_array();
                }
            } else {

                return false;
            }
        } else {
            return false;
        }
    }


    //this function for get particular user live data

    public function get_particular_user_live_data_model($user_id)
    {
        $q = $this->db->query("SELECT user_info.*, driver_table.* FROM user_info LEFT JOIN driver_table ON driver_table.user_id = user_info.user_id WHERE user_info.user_id = '$user_id' AND user_info.inactive = '1' AND driver_table.status = '1'");
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
    }

    //this function for get particular user live data

    public function get_notification_data_model($user_id)
    {
        //echo $user_id;
        $response = array();
        $q = $this->db->query("SELECT * FROM tbl_notification WHERE to_user = '$user_id'");
        if ($q->num_rows() > 0) {
            $data = $q->result_array();

            foreach ($data as $main) {
                $user = $main['from_user'];
                //Get Driver ID
                $data_driver = $this->db->where('user_id', $user)
                    ->get('user_info');
                $driver_data = $data_driver->result_array();
                //print_r($driver_data);
                $name_name = $driver_data[0]['user_name'];
                if ($main["type"] == 'bid_request') {
                    $message = $name_name . ' Send a bid request for your job';
                } else if ($main["type"] == 'hire_request') {
                    $message = $name_name . ' Send a hire request for your job';
                } else if ($main["type"] == 'bid_request_accepted') {
                    $message = $name_name . ' Accepted your bid request';
                } else if ($main["type"] == 'job_completed') {
                    $message = $name_name . ' Completed your Job';
                } else {
                    $message = $name_name . ' Sends some notification to you';
                }


                $response[] = array("id" => $main['id'], "job_id" => $main['job_id'], "type" => $main['type'], "added_date" => $main['added_date'], "message" => $message);
            }
            return $response;
            //print_r($data);

        } else {
            return array("msg" => "No notification found!");
        }
    }

    //this function for get_vehicle_type_data_model

    public function get_vehicle_type_data_model()
    {
        $q = $this->db->query("SELECT * from tbl_vehicle_type WHERE 1 order by id ASC");
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
    }

    //this function for get_metal_category_data_model

    public function get_metal_category_data_model()
    {
        $q = $this->db->query("SELECT * from tbl_metal_category WHERE 1 order by id ASC");
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
    }

    //this function for update profile data

    public function update_user_offline_data_model($user_id)
    {

        $qqq = $this->db->where('user_id', $user_id)

            ->where('inactive', "1")
            ->where('user_type', "Seller")
            ->get('user_info');
        //echo $user_id;
        if ($qqq->num_rows() > 0) {
            //echo "hi";
            return array("msg" => "You are a seller ,so can't perform any action!");
        } else {
            $qqqq = $this->db->where('user_id', $user_id)

                ->where('status', "1")
                ->get('driver_table');

            if ($qqqq->num_rows() > 0) {
                //echo "hi";

                $data = array(
                    "status" => '0'
                );
                $data = $this->security->xss_clean($data);
                if ($qq = $this->db->where('user_id', $user_id)

                    ->where('status', '1')

                    ->update('driver_table', $data)
                ) {

                    $qqq = $this->db->where('user_id', $user_id)

                        ->where('inactive', '1')

                        ->get('user_info');
                    if ($qqq->num_rows() > 0) {
                        return $qqq->result_array();
                    }
                } else {

                    return array("msg" => "Error occor, please try again!");
                }
            } else {

                return array("msg" => "You'r already Offline");
            }
        }
    }


    //Get BID list

    public function get_all_bid($job_id)
    {
        $response = array();

        $q = $this->db->query("SELECT * FROM buyer_bid_table WHERE driver_live_id = '$job_id' order by bid_id DESC");
        if ($q->num_rows() > 0) {
            $data = $q->result_array();

            foreach ($data as $main) {
                $user = $main['user_id'];
                //Get Driver ID
                $data_user = $this->db->where('user_id', $user)
                    ->get('user_info');
                $user_data = $data_user->result_array();
                //print_r($driver_data);
                $name_name = $user_data[0]['user_name'];
                $name_mob = $user_data[0]['user_number'];


                $response[] = array("bid_id" => $main['bid_id'], "user_id" => $main['user_id'], "user_name" => $name_name, "name_mob" => $name_mob, "bid_price" => $main['bid_price'], "bid_notes" => $main['bid_notes'], "created_on" => $main['created_on'], "created_by" => $main['created_by'], "updated_on" => $main['updated_on'], "updated_by" => $main['updated_by'], "status" => $main['action']);
            }
            return $response;
        } else {
            return $response;
        }
    }

    //Get BID list

    public function get_all_hire($job_id)
    {
        $response = array();

        $q = $this->db->query("SELECT * FROM buyer_hire_table WHERE driver_live_id = '$job_id' order by id DESC");
        if ($q->num_rows() > 0) {
            $data = $q->result_array();

            foreach ($data as $main) {
                $user = $main['user_id'];
                //Get Driver ID
                $data_user = $this->db->where('user_id', $user)
                    ->get('user_info');
                $user_data = $data_user->result_array();
                //print_r($driver_data);
                $name_name = $user_data[0]['user_name'];
                $name_mob = $user_data[0]['user_number'];


                $response[] = array("bid_id" => $main['id'], "user_id" => $main['user_id'], "user_name" => $name_name, "name_mob" => $name_mob, "bid_price" => $main['bid_price'], "bid_notes" => $main['bid_notes'], "created_on" => $main['created_on'], "created_by" => $main['created_by'], "updated_on" => $main['updated_on'], "updated_by" => $main['updated_by'], "status" => $main['action']);
            }
            return $response;
        } else {
            return $response;
        }
    }



    //Get BID list

    public function get_all_bid_by_seller($user_id, $job_id)
    {
        $response = array();

        $q = $this->db->query("SELECT * FROM buyer_bid_table WHERE driver_live_id = '$job_id'  && user_id='$user_id' LIMIT 1");
        if ($q->num_rows() > 0) {
            $data = $q->result_array();

            foreach ($data as $main) {
                $user = $main['user_id'];
                //Get Driver ID
                $data_user = $this->db->where('user_id', $user)
                    ->get('user_info');
                $user_data = $data_user->result_array();
                //print_r($driver_data);
                $name_name = $user_data[0]['user_name'];
                $name_mob = $user_data[0]['user_number'];


                $response[] = array("bid_id" => $main['bid_id'], "user_id" => $main['user_id'], "user_name" => $name_name, "name_mob" => $name_mob, "bid_price" => $main['bid_price'], "bid_notes" => $main['bid_notes'], "created_on" => $main['created_on'], "created_by" => $main['created_by'], "updated_on" => $main['updated_on'], "updated_by" => $main['updated_by'], "status" => $main['action']);
            }
            return $response;
        } else {
            return $response;
        }
    }

    //Get BID list

    public function get_all_hire_by_seller($user_id, $job_id)
    {
        $response = array();

        $q = $this->db->query("SELECT * FROM buyer_hire_table WHERE driver_live_id = '$job_id' && user_id='$user_id' LIMIT 1");
        if ($q->num_rows() > 0) {
            $data = $q->result_array();

            foreach ($data as $main) {
                $user = $main['user_id'];
                //Get Driver ID
                $data_user = $this->db->where('user_id', $user)
                    ->get('user_info');
                $user_data = $data_user->result_array();
                //print_r($driver_data);
                $name_name = $user_data[0]['user_name'];
                $name_mob = $user_data[0]['user_number'];


                $response[] = array("bid_id" => $main['id'], "user_id" => $main['user_id'], "user_name" => $name_name, "name_mob" => $name_mob, "bid_price" => $main['bid_price'], "bid_notes" => $main['bid_notes'], "created_on" => $main['created_on'], "created_by" => $main['created_by'], "updated_on" => $main['updated_on'], "updated_by" => $main['updated_by'], "status" => $main['action']);
            }
            return $response;
        } else {
            return $response;
        }
    }

    //this function for get Driver Job details

    public function get_driver_job_details_data_model($user_id, $job_id)
    {
        $response = array();

        $q = $this->db->query("SELECT * FROM driver_table WHERE driver_live_id = '$job_id' AND user_id = '$user_id' LIMIT 1");
        if ($q->num_rows() > 0) {
            $data = $q->result_array();

            foreach ($data as $main) {
                $user = $main['user_id'];
                //Get Driver ID
                $data_driver = $this->db->where('user_id', $user)
                    ->get('user_info');
                $driver_data = $data_driver->result_array();
                //print_r($driver_data);
                $name_name = $driver_data[0]['user_name'];
                $user_mob = $driver_data[0]['user_number'];
                $bid = $this->User_login->get_all_bid($job_id);
                $hire = $this->User_login->get_all_hire($job_id);

                $response[] = array("driver_live_id" => $main['driver_live_id'], "user_id" => $main['user_id'], "driver_name" => $name_name, "driver_mob" => $user_mob, "driver_vahicle_type" => $main['driver_vahicle_type'], "driver_capacity" => $main['driver_capacity'], "driver_longitude" => $main['driver_longitude'], "driver_latitude" => $main['driver_latitude'], "driver_distance" => $main['driver_distance'], "driver_price" => $main['driver_price'], "item_name" => $main['item_name'], "metal_category" => $main['metal_category'], "status" => $main['status'], "created_on" => $main['created_on'], "created_by" => $main['created_by'], "updated_on" => $main['updated_on'], "updated_by" => $main['updated_by'], "bid" => $bid, "hire" => $hire);
            }
            return $response;
        } else {
            return array("msg" => "No Job details found!");
        }
    }



    //this function for get Seller Job details

    public function get_seller_job_details_data_model($user_id, $job_id)
    {
        $response = array();

        $q = $this->db->query("SELECT * FROM driver_table WHERE driver_live_id = '$job_id' LIMIT 1");
        if ($q->num_rows() > 0) {
            $data = $q->result_array();

            foreach ($data as $main) {
                $user = $main['user_id'];
                //Get Driver ID
                $data_driver = $this->db->where('user_id', $user)
                    ->get('user_info');
                $driver_data = $data_driver->result_array();
                //print_r($driver_data);
                $name_name = $driver_data[0]['user_name'];
                $user_mob = $driver_data[0]['user_number'];
                $bid = $this->User_login->get_all_bid_by_seller($user_id, $job_id);
                $hire = $this->User_login->get_all_hire_by_seller($user_id, $job_id);

                $response[] = array("driver_live_id" => $main['driver_live_id'], "user_id" => $main['user_id'], "driver_name" => $name_name, "driver_mob" => $user_mob, "driver_vahicle_type" => $main['driver_vahicle_type'], "driver_capacity" => $main['driver_capacity'], "driver_longitude" => $main['driver_longitude'], "driver_latitude" => $main['driver_latitude'], "driver_distance" => $main['driver_distance'], "driver_price" => $main['driver_price'], "item_name" => $main['item_name'], "metal_category" => $main['metal_category'], "status" => $main['status'], "created_on" => $main['created_on'], "created_by" => $main['created_by'], "updated_on" => $main['updated_on'], "updated_by" => $main['updated_by'], "bid" => $bid, "hire" => $hire);
            }
            return $response;
        } else {
            return array("msg" => "No Job details found!");
        }
    }



    //for Driver Assigned Job info

    public function get_driver_assigned_job_model($user_id)
    {
        $qqq = $this->db->query("SELECT * FROM driver_table WHERE user_id = '$user_id' && seller_id !='' ORDER BY driver_live_id DESC");

        if ($qqq->num_rows() > 0) {

            //return $qqq->result_array();
            $data = $qqq->result_array();

            foreach ($data as $main) {
                $user = $main['user_id'];
                //Get Driver ID
                $data_driver = $this->db->where('user_id', $user)
                    ->get('user_info');
                $driver_data = $data_driver->result_array();
                if (!empty($driver_data)) {
                    $name_name = $driver_data[0]['user_name'];
                } else {
                    $name_name = "";
                }


                $response[] = array("driver_live_id" => $main['driver_live_id'], "user_id" => $main['user_id'], "driver_name" => $name_name, "driver_vahicle_type" => $main['driver_vahicle_type'], "driver_capacity" => $main['driver_capacity'], "driver_longitude" => $main['driver_longitude'], "driver_latitude" => $main['driver_latitude'], "driver_distance" => $main['driver_distance'], "driver_price" => $main['driver_price'], "item_name" => $main['item_name'], "metal_category" => $main['metal_category'], "status" => $main['status'], "created_on" => $main['created_on'], "created_by" => $main['created_by'], "updated_on" => $main['updated_on'], "updated_by" => $main['updated_by']);
            }
            return $response;
        } else {
            return false;
        }
    }


    //for Driver Assigned Job info

    public function get_seller_job_model($user_id)
    {
        $sq = "SELECT * FROM driver_table WHERE seller_id ='$user_id' ORDER BY driver_live_id DESC";
        $qqq = $this->db->query($sq);

        if ($qqq->num_rows() > 0) {

            //return $qqq->result_array();
            $data = $qqq->result_array();

            foreach ($data as $main) {
                $user = $main['user_id'];
                //Get Driver ID
                $data_driver = $this->db->where('user_id', $user)
                    ->get('user_info');
                $driver_data = $data_driver->result_array();
                if (!empty($driver_data)) {
                    $name_name = $driver_data[0]['user_name'];
                } else {
                    $name_name = "";
                }


                $response[] = array("driver_live_id" => $main['driver_live_id'], "user_id" => $main['user_id'], "driver_name" => $name_name, "driver_vahicle_type" => $main['driver_vahicle_type'], "driver_capacity" => $main['driver_capacity'], "driver_longitude" => $main['driver_longitude'], "driver_latitude" => $main['driver_latitude'], "driver_distance" => $main['driver_distance'], "driver_price" => $main['driver_price'], "item_name" => $main['item_name'], "metal_category" => $main['metal_category'], "status" => $main['status'], "created_on" => $main['created_on'], "created_by" => $main['created_by'], "updated_on" => $main['updated_on'], "updated_by" => $main['updated_by']);
            }
            return $response;
        } else {
            return false;
        }
    }


    //Get BID list

    public function get_bid_details($job_id)
    {
        $response = array();

        $q = $this->db->query("SELECT * FROM buyer_bid_table WHERE driver_live_id = '$job_id' && action='1' order by bid_id DESC");
        if ($q->num_rows() > 0) {
            $data = $q->result_array();

            foreach ($data as $main) {
                $user = $main['user_id'];
                //Get Driver ID
                $data_user = $this->db->where('user_id', $user)
                    ->get('user_info');
                $user_data = $data_user->result_array();
                //print_r($driver_data);
                $name_name = $user_data[0]['user_name'];
                $name_mob = $user_data[0]['user_number'];


                $response[] = array("bid_id" => $main['bid_id'], "user_id" => $main['user_id'], "user_name" => $name_name, "name_mob" => $name_mob, "bid_price" => $main['bid_price'], "bid_notes" => $main['bid_notes'], "created_on" => $main['created_on'], "created_by" => $main['created_by'], "updated_on" => $main['updated_on'], "updated_by" => $main['updated_by'], "status" => $main['action']);
            }
            return $response;
        } else {
            return $response;
        }
    }

    //Get BID list

    public function get_hire_details($job_id)
    {
        $response = array();

        $q = $this->db->query("SELECT * FROM buyer_hire_table WHERE driver_live_id = '$job_id' && action='1' order by id DESC");
        if ($q->num_rows() > 0) {
            $data = $q->result_array();

            foreach ($data as $main) {
                $user = $main['user_id'];
                //Get Driver ID
                $data_user = $this->db->where('user_id', $user)
                    ->get('user_info');
                $user_data = $data_user->result_array();
                //print_r($driver_data);
                $name_name = $user_data[0]['user_name'];
                $name_mob = $user_data[0]['user_number'];


                $response[] = array("bid_id" => $main['id'], "user_id" => $main['user_id'], "user_name" => $name_name, "name_mob" => $name_mob, "bid_price" => $main['bid_price'], "bid_notes" => $main['bid_notes'], "created_on" => $main['created_on'], "created_by" => $main['created_by'], "updated_on" => $main['updated_on'], "updated_by" => $main['updated_by'], "status" => $main['action']);
            }
            return $response;
        } else {
            return $response;
        }
    }



    //My Job details

    public function get_my_job_details_model($user_id, $job_id)
    {
        $response = array();

        $q = $this->db->query("SELECT * FROM driver_table WHERE driver_live_id = '$job_id' LIMIT 1");
        if ($q->num_rows() > 0) {
            $data = $q->result_array();

            foreach ($data as $main) {
                $user = $main['user_id'];
                //Get Driver ID
                $data_driver = $this->db->where('user_id', $user)
                    ->get('user_info');
                $driver_data = $data_driver->result_array();
                //print_r($driver_data);
                $name_name = $driver_data[0]['user_name'];
                $user_mob = $driver_data[0]['user_number'];
                $bid = $this->User_login->get_bid_details($job_id);
                $hire = $this->User_login->get_hire_details($job_id);

                $response[] = array("driver_live_id" => $main['driver_live_id'], "user_id" => $main['user_id'], "driver_name" => $name_name, "driver_mob" => $user_mob, "driver_vahicle_type" => $main['driver_vahicle_type'], "driver_capacity" => $main['driver_capacity'], "driver_longitude" => $main['driver_longitude'], "driver_latitude" => $main['driver_latitude'], "driver_distance" => $main['driver_distance'], "driver_price" => $main['driver_price'], "item_name" => $main['item_name'], "metal_category" => $main['metal_category'], "status" => $main['status'], "created_on" => $main['created_on'], "created_by" => $main['created_by'], "updated_on" => $main['updated_on'], "updated_by" => $main['updated_by'], "bid" => $bid, "hire" => $hire);
            }
            return $response;
        } else {
            return array("msg" => "No Job details found!");
        }
    }

    public function getposttype($upload_type, $sub_category_id, $uploadpath, $video_type, $youtube_video_id)
    {
        if (!empty($upload_type) && !empty($sub_category_id)) {
            $posttypearray = array('pdf', 'image', 'audio', 'video', 'ppt', 'word', 'text');
            if (in_array($upload_type, $posttypearray)) {
                if ($upload_type == 'pdf') {
                    $postpath = base_url('uploads/assets/uploaded_data/posts_pdf/' . $sub_category_id . "/" . $uploadpath);
                }
                if ($upload_type == 'image') {
                    $postpath = base_url('uploads/assets/uploaded_data/posts_image/' . $sub_category_id . "/" . $uploadpath);
                }
                if ($upload_type == 'audio') {
                    $postpath = base_url('uploads/assets/uploaded_data/posts_audio/' . $sub_category_id . "/" . $uploadpath);
                }
                if ($upload_type == 'video' && $video_type = "inhouse") {
                    $postpath = base_url('uploads/assets/uploaded_data/posts_video/' . $sub_category_id . "/" . $uploadpath);
                }
                if ($upload_type == 'video' && $video_type = "youtube") {
                    $postpath = "https://www.youtube.com/watch?v=" . $youtube_video_id;
                }
                if ($upload_type == 'ppt') {
                    $postpath = "";
                }
                if ($upload_type == 'word') {
                    $postpath = "";
                }
                if ($upload_type == 'text') {
                    $postpath = "";
                }

                return $postpath;
            } else {
                return "invalid upload type";
            }
        } else {
            return "missing upload type";
        }
    }


    public function get_upcomming_event_data($start_from = "", $limit = "")
    {
        $indiatimezone = new DateTimeZone("Asia/Kolkata");
        $date = new DateTime();
        $date->setTimezone($indiatimezone);
        $added_date =  $date->format("Y-m-d");

        $response = array();

        $q = $this->db->query("SELECT * FROM upload_data WHERE is_active='1' && event_date >='$added_date' order by event_date DESC LIMIT $start_from,$limit");
        if ($q->num_rows() > 0) {
            $data = $q->result_array();

            //print_r($data);

            foreach ($data as $main) {

                $upload_data_id = $main['upload_data_id'];
                $upload_title = $main['upload_title'];
                $video_type = $main['video_type'];
                $upload_for_user_type = $main['upload_for_user_type'];
                $short_description = $main['short_description'];
                $upload_description = $main['upload_description'];
                $category_id = $main['category_id'];
                $sub_category_id = $main['sub_category_id'];
                $upload_type = $main['upload_type'];
                $uploadpath = $main['upload_path'];
                $youtube_video_id = $main['youtube_video_id'];
                $upload_path = $this->getposttype($upload_type, $sub_category_id, $uploadpath, $video_type, $youtube_video_id);
                $thumbnail = $main['thumbnail'];
                if (!empty($thumbnail)) {
                    $thumbnail = base_url('uploads/assets/uploaded_data/posts_thumbnail/') . $sub_category_id . "/" . $thumbnail;
                } else {
                    if ($main['upload_for_user_type'] == 'Student') {
                        $thumbnail = base_url('assets/images/upload/no_images/medicaledu_no_image.jpg');
                    } else {
                        $thumbnail = base_url('assets/images/upload/no_images/healthedu_no_image.jpg');
                    }
                }

                $tags = $main['tags'];
                $event_date = $main['event_date'];
                $event_time = $main['event_time'];
                $event_link = $main['event_link'];
                if (!empty($event_link)) {
                    $event_link = $event_link;
                } else {
                    $event_link = '';
                }
                $added_date_time = $main['added_date_time'];
                $user = $main['contributors_id'];
                $contributors_info = $this->db->where('contributors_id', $user)
                    ->get('contributors');
                $contributors_data = $contributors_info->result_array();
                if (!empty($contributors_data)) {
                    $contributors_name = $contributors_data[0]['contributors_name'];
                } else {
                    $contributors_name = "";
                }

                $response[] = array("upload_data_id" => $upload_data_id, "upload_title" => $upload_title, "video_type" => $video_type, "upload_for_user_type" => $upload_for_user_type, "short_description" => $short_description, "upload_description" => $upload_description, "category_id" => $category_id, "sub_category_id" => $sub_category_id, "upload_path" => $upload_path, "upload_type" => $upload_type, "youtube_video_id" => $youtube_video_id, "thumbnail" => $thumbnail, "tags" => $tags, "event_date" => $event_date, "event_time" => $event_time, "added_date_time" => $added_date_time, "contributors_name" => $contributors_name, "event_link" => $event_link);
            }
            return $response;
        } else {
            return '';
        }
    }

    //Ends of code my job details


    public function get_past_event_data($start_from = "", $limit = "")
    {
        $indiatimezone = new DateTimeZone("Asia/Kolkata");
        $date = new DateTime();
        $date->setTimezone($indiatimezone);
        $added_date =  $date->format("Y-m-d");
        $currentdate =  date("Y-m-d");

        $response = array();

        $q = $this->db->query("SELECT * FROM upload_data WHERE is_active='1' && category_id ='18' && event_date < '$currentdate' order by event_date DESC LIMIT $start_from,$limit");
        if ($q->num_rows() > 0) {
            $data = $q->result_array();

            //print_r($data);

            foreach ($data as $main) {

                $upload_data_id = $main['upload_data_id'];
                $upload_title = $main['upload_title'];
                $video_type = $main['video_type'];
                $upload_for_user_type = $main['upload_for_user_type'];
                $short_description = $main['short_description'];
                $upload_description = $main['upload_description'];
                $category_id = $main['category_id'];
                $sub_category_id = $main['sub_category_id'];
                $upload_type = $main['upload_type'];
                $uploadpath = $main['upload_path'];
                $youtube_video_id = $main['youtube_video_id'];
                $upload_path = $this->getposttype($upload_type, $sub_category_id, $uploadpath, $video_type, $youtube_video_id);
                $thumbnail = $main['thumbnail'];
                if (!empty($thumbnail)) {
                    $thumbnail = base_url('uploads/assets/uploaded_data/posts_thumbnail/') . $sub_category_id . "/" . $thumbnail;
                } else {
                    if ($main['upload_for_user_type'] == 'Student') {
                        $thumbnail = base_url('assets/images/upload/no_images/medicaledu_no_image.jpg');
                    } else {
                        $thumbnail = base_url('assets/images/upload/no_images/healthedu_no_image.jpg');
                    }
                }

                $tags = $main['tags'];
                $event_date = $main['event_date'];
                $event_time = $main['event_time'];
                $added_date_time = $main['added_date_time'];
                $event_link = $main['event_link'];
                if (!empty($event_link)) {
                    $event_link = $event_link;
                } else {
                    $event_link = '';
                }

                $user = $main['contributors_id'];
                $contributors_info = $this->db->where('contributors_id', $user)
                    ->get('contributors');
                $contributors_data = $contributors_info->result_array();
                if (!empty($contributors_data)) {
                    $contributors_name = $contributors_data[0]['contributors_name'];
                } else {
                    $contributors_name = "";
                }

                $response[] = array("upload_data_id" => $upload_data_id, "upload_title" => $upload_title, "video_type" => $video_type, "upload_for_user_type" => $upload_for_user_type, "short_description" => $short_description, "upload_description" => $upload_description, "category_id" => $category_id, "sub_category_id" => $sub_category_id, "upload_path" => $upload_path, "upload_type" => $upload_type, "youtube_video_id" => $youtube_video_id, "thumbnail" => $thumbnail, "tags" => $tags, "event_date" => $event_date, "event_time" => $event_time, "added_date_time" => $added_date_time, "contributors_name" => $contributors_name, "event_link" => $event_link);
            }
            return $response;
        } else {
            return '';
        }
    }

    //Ends of code my job details

    public function get_all_event_data($start_from = "", $limit = "")
    {
        $indiatimezone = new DateTimeZone("Asia/Kolkata");
        $date = new DateTime();
        $date->setTimezone($indiatimezone);
        $added_date =  $date->format("Y-m-d");

        $response = array();

        $q = $this->db->query("SELECT * FROM upload_data WHERE is_active='1' && category_id ='18' order by event_date DESC LIMIT $start_from,$limit");
        if ($q->num_rows() > 0) {
            $data = $q->result_array();

            //print_r($data);

            foreach ($data as $main) {

                $upload_data_id = $main['upload_data_id'];
                $upload_title = $main['upload_title'];
                $video_type = $main['video_type'];
                $upload_for_user_type = $main['upload_for_user_type'];
                $short_description = $main['short_description'];
                $upload_description = $main['upload_description'];
                $category_id = $main['category_id'];
                $sub_category_id = $main['sub_category_id'];
                $upload_type = $main['upload_type'];
                $uploadpath = $main['upload_path'];
                $youtube_video_id = $main['youtube_video_id'];
                $upload_path = $this->getposttype($upload_type, $sub_category_id, $uploadpath, $video_type, $youtube_video_id);
                $thumbnail = $main['thumbnail'];
                if (!empty($thumbnail)) {
                    $thumbnail = base_url('uploads/assets/uploaded_data/posts_thumbnail/') . $sub_category_id . "/" . $thumbnail;
                } else {
                    if ($main['upload_for_user_type'] == 'Student') {
                        $thumbnail = base_url('assets/images/upload/no_images/medicaledu_no_image.jpg');
                    } else {
                        $thumbnail = base_url('assets/images/upload/no_images/healthedu_no_image.jpg');
                    }
                }

                $tags = $main['tags'];
                $event_date = $main['event_date'];
                $event_time = $main['event_time'];
                $event_link = $main['event_link'];
                if (!empty($event_link)) {
                    $event_link = $event_link;
                } else {
                    $event_link = '';
                }
                $added_date_time = $main['added_date_time'];
                $user = $main['contributors_id'];
                $contributors_info = $this->db->where('contributors_id', $user)
                    ->get('contributors');
                $contributors_data = $contributors_info->result_array();
                if (!empty($contributors_data)) {
                    $contributors_name = $contributors_data[0]['contributors_name'];
                } else {
                    $contributors_name = "";
                }

                $response[] = array("upload_data_id" => $upload_data_id, "upload_title" => $upload_title, "video_type" => $video_type, "upload_for_user_type" => $upload_for_user_type, "short_description" => $short_description, "upload_description" => $upload_description, "category_id" => $category_id, "sub_category_id" => $sub_category_id, "upload_path" => $upload_path, "upload_type" => $upload_type, "youtube_video_id" => $youtube_video_id, "thumbnail" => $thumbnail, "tags" => $tags, "event_date" => $event_date, "event_time" => $event_time, "added_date_time" => $added_date_time, "contributors_name" => $contributors_name, "event_link" => $event_link);
            }
            return $response;
        } else {
            return '';
        }
    }

    public function delete_user($userid)
	{
		$this->db->where('users_id', $userid);
		$isuser = $this->db->get('users');

		if ($isuser->num_rows() > 0) {
			$this->db->where('users_id', $userid);
			$q= $this->db->delete("users");
			return true;
		}else{
			return false;
		}
	}
}
