<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

INFO - 2020-12-11 12:49:34 --> Config Class Initialized
INFO - 2020-12-11 12:49:34 --> Hooks Class Initialized
DEBUG - 2020-12-11 12:49:34 --> UTF-8 Support Enabled
INFO - 2020-12-11 12:49:34 --> Utf8 Class Initialized
INFO - 2020-12-11 12:49:35 --> URI Class Initialized
DEBUG - 2020-12-11 12:49:35 --> No URI present. Default controller set.
INFO - 2020-12-11 12:49:35 --> Router Class Initialized
INFO - 2020-12-11 12:49:35 --> Output Class Initialized
INFO - 2020-12-11 12:49:35 --> Security Class Initialized
DEBUG - 2020-12-11 12:49:35 --> Global POST, GET and COOKIE data sanitized
INFO - 2020-12-11 12:49:35 --> Input Class Initialized
INFO - 2020-12-11 12:49:35 --> Language Class Initialized
INFO - 2020-12-11 12:49:36 --> Language Class Initialized
INFO - 2020-12-11 12:49:36 --> Config Class Initialized
INFO - 2020-12-11 12:49:36 --> Loader Class Initialized
INFO - 2020-12-11 12:49:37 --> Helper loaded: url_helper
INFO - 2020-12-11 12:49:37 --> Helper loaded: form_helper
INFO - 2020-12-11 12:49:37 --> Helper loaded: html_helper
INFO - 2020-12-11 12:49:37 --> Helper loaded: security_helper
INFO - 2020-12-11 12:49:37 --> Database Driver Class Initialized
DEBUG - 2020-12-11 12:49:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2020-12-11 12:49:37 --> Session: Class initialized using 'files' driver.
INFO - 2020-12-11 12:49:37 --> Controller Class Initialized
INFO - 2020-12-11 12:49:38 --> Helper loaded: upload_helper
INFO - 2020-12-11 12:49:38 --> Helper loaded: image_upload_helper
INFO - 2020-12-11 12:49:38 --> Helper loaded: upload_pdf_helper
INFO - 2020-12-11 12:49:38 --> Helper loaded: upload_audio_video_helper
DEBUG - 2020-12-11 12:49:38 --> File loaded: C:\xampp\htdocs\medicalconceptsinhindi\application\modules/front/models/Mdl_front.php
INFO - 2020-12-11 12:49:38 --> Helper loaded: common_helper
INFO - 2020-12-11 12:49:38 --> Helper loaded: send_email_helper
ERROR - 2020-12-11 12:49:38 --> Query error: Table 'medical.upload_data' doesn't exist - Invalid query: SELECT `ud`.*, `sc`.`sub_category_id`, `sc`.`sub_category_name`, `md`.`meta_slug`
FROM `upload_data` `ud`
JOIN `sub_category` `sc` ON `sc`.`sub_category_id` = `ud`.`sub_category_id`
JOIN `category` `c` ON `c`.`category_id` = `sc`.`category_id`
LEFT JOIN `meta_tag_details` `md` ON `md`.`meta_upload_data_id` = `ud`.`upload_data_id` and `md`.`is_active` = 1
WHERE `sc`.`is_active` = '1'
AND `ud`.`is_active` = '1'
AND `ud`.`upload_type` = 'video'
AND `ud`.`is_active` = '1'
ORDER BY `ud`.`sort_order` asc
 LIMIT 3
ERROR - 2020-12-11 12:49:38 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\medicalconceptsinhindi\application\modules\front\models\Mdl_front.php 122
