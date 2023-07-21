define({
  "api": [
    {
      "type": "post",
      "url": "/login/get_app_vision",
      "title": "Get App Vision",
      "name": "get_app_vision",
      "group": "App_Vision",
      "parameter": {
        "fields": {
          "Parameter": [
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "token",
              "description": "<p>user Token.</p>"
            }
          ]
        }
      },
      "success": {
        "fields": {
          "Success 200": [
            {
              "group": "Success 200",
              "type": "Number",
              "optional": false,
              "field": "code",
              "description": "<p>HTTP Status Code.</p>"
            },
            {
              "group": "Success 200",
              "type": "String",
              "optional": false,
              "field": "message",
              "description": "<p>Associated Message.</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "data",
              "description": "<p>App Vision Data Object</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "error",
              "description": "<p>Error if Any.</p>"
            }
          ]
        },
        "examples": [
          {
            "title": "Success-Response:",
            "content": "    HTTP/1.1 200 OK\n    {\n\t\t\t    \"code\": 200,\n\t\t\t    \"message\": \"App Vision retreived successfully!!\",\n\t\t\t    \"data\": {\n\t\t\t        \"app_vision_id\": \"1\",\n\t\t\t        \"app_vision\": \"<p>ABCDEGHIJKLMNOPQRSTUVWXYZ</p>\",\n\t\t\t        \"is_active\": \"1\",\n\t\t\t        \"added_date_time\": \"2018-07-30 14:35:20\"\n\t\t\t    },\n\t\t\t    \"error\": \"\",\n\t\t\t    \"latest_version\": {\n\t\t\t        \"ios\": \"1.4\",\n\t\t\t        \"android\": \"1.6\"\n\t\t\t    }\n\t\t\t}",
            "type": "json"
          }
        ]
      },
      "version": "0.0.0",
      "filename": "application/modules/api/controllers/Login.php",
      "groupTitle": "App_Vision"
    },
    {
      "type": "post",
      "url": "/category/get_category",
      "title": "Get Category Data",
      "name": "get_category",
      "group": "Category",
      "parameter": {
        "fields": {
          "Parameter": [
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "token",
              "description": "<p>Token.</p>"
            }
          ]
        }
      },
      "success": {
        "fields": {
          "Success 200": [
            {
              "group": "Success 200",
              "type": "Number",
              "optional": false,
              "field": "code",
              "description": "<p>HTTP Status Code.</p>"
            },
            {
              "group": "Success 200",
              "type": "String",
              "optional": false,
              "field": "message",
              "description": "<p>Associated Message.</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "data",
              "description": "<p>Category Data Object</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "error",
              "description": "<p>Error if Any.</p>"
            }
          ]
        },
        "examples": [
          {
            "title": "Success-Response:",
            "content": "    HTTP/1.1 200 OK\n    {\n\t\t\t    \"code\": 200,\n\t\t\t    \"message\": \"Category has been retreived successfully!!\",\n\t\t\t    \"data\": [\n\t\t\t        {\n\t\t\t            \"category_id\": \"1\",\n\t\t\t            \"category_name\": \"Text\",\n\t\t\t            \"unseen_count\": 0\n\t\t\t        },\n\t\t\t        {\n\t\t\t            \"category_id\": \"2\",\n\t\t\t            \"category_name\": \"Audio\",\n\t\t\t            \"unseen_count\": 1\n\t\t\t        },\n\t\t\t        {\n\t\t\t            \"category_id\": \"3\",\n\t\t\t            \"category_name\": \"Video\",\n\t\t\t            \"unseen_count\": 7\n\t\t\t        },\n\t\t\t        {\n\t\t\t            \"category_id\": \"5\",\n\t\t\t            \"category_name\": \"Case Study\",\n\t\t\t            \"unseen_count\": 0\n\t\t\t        }\n\t\t\t    ],\n\t\t\t    \"error\": \"\",\n\t\t\t    \"latest_version\": []\n\t\t\t}",
            "type": "json"
          }
        ]
      },
      "version": "0.0.0",
      "filename": "application/modules/api/controllers/Category.php",
      "groupTitle": "Category"
    },
    {
      "type": "post",
      "url": "/category/get_sub_category",
      "title": "Get Sub Category Data",
      "name": "get_sub_category",
      "group": "Category",
      "parameter": {
        "fields": {
          "Parameter": [
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "token",
              "description": "<p>Token.</p>"
            },
            {
              "group": "Parameter",
              "type": "Number",
              "size": "1..11",
              "optional": false,
              "field": "category_id",
              "description": "<p>Category ID.</p>"
            }
          ]
        }
      },
      "success": {
        "fields": {
          "Success 200": [
            {
              "group": "Success 200",
              "type": "Number",
              "optional": false,
              "field": "code",
              "description": "<p>HTTP Status Code.</p>"
            },
            {
              "group": "Success 200",
              "type": "String",
              "optional": false,
              "field": "message",
              "description": "<p>Associated Message.</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "data",
              "description": "<p>Sub Category Data Object</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "error",
              "description": "<p>Error if Any.</p>"
            }
          ]
        },
        "examples": [
          {
            "title": "Success-Response:",
            "content": "    HTTP/1.1 200 OK\n    {\n\t\t\t    \"code\": 200,\n\t\t\t    \"message\": \"Sub Category has been retreived successfully!!\",\n\t\t\t    \"data\": [\n\t\t\t        {\n\t\t\t            \"sub_category_id\": \"1\",\n\t\t\t            \"sub_category_name\": \"Cardio\",\n\t\t\t            \"description\": \"test description\",\n\t\t\t            \"sub_category_image\": \"http://localhost/chikitsa_shastra/assets/images/upload/sub_category_images/1-1525683519.png\",\n\t\t\t            \"category_id\": \"3\",\n\t\t\t            \"unseen_count\": 5\n\t\t\t        },\n\t\t\t        {\n\t\t\t            \"sub_category_id\": \"2\",\n\t\t\t            \"sub_category_name\": \"COPD\",\n\t\t\t            \"description\": null,\n\t\t\t            \"sub_category_image\": \"http://localhost/chikitsa_shastra/assets/images/upload/sub_category_images/Medical-Camp-1525848521.jpg\",\n\t\t\t            \"category_id\": \"3\",\n\t\t\t            \"unseen_count\": 1\n\t\t\t        },\n\t\t\t        {\n\t\t\t            \"sub_category_id\": \"4\",\n\t\t\t            \"sub_category_name\": \"Testing Sub category\",\n\t\t\t            \"description\": \"Testing Sub category Testing Sub categoryTesting Sub category\",\n\t\t\t            \"sub_category_image\": \"http://localhost/chikitsa_shastra/assets/images/upload/sub_category_images/Image_5ac856ad525e2-1528719645.jpg\",\n\t\t\t            \"category_id\": \"3\",\n\t\t\t            \"unseen_count\": 1\n\t\t\t        }\n\t\t\t    ],\n\t\t\t    \"error\": \"\",\n\t\t\t    \"latest_version\": []\n\t\t\t}",
            "type": "json"
          }
        ]
      },
      "version": "0.0.0",
      "filename": "application/modules/api/controllers/Category.php",
      "groupTitle": "Category"
    },
    {
      "type": "post",
      "url": "/login/contributors_details",
      "title": "Contributors Details",
      "name": "contributors_details",
      "group": "Contributors",
      "parameter": {
        "fields": {
          "Parameter": [
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "token",
              "description": "<p>user Token.</p>"
            },
            {
              "group": "Parameter",
              "type": "Number",
              "size": "1..11",
              "optional": false,
              "field": "contributors_id",
              "description": "<p>Contributors ID.</p>"
            }
          ]
        }
      },
      "success": {
        "fields": {
          "Success 200": [
            {
              "group": "Success 200",
              "type": "Number",
              "optional": false,
              "field": "code",
              "description": "<p>HTTP Status Code.</p>"
            },
            {
              "group": "Success 200",
              "type": "String",
              "optional": false,
              "field": "message",
              "description": "<p>Associated Message.</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "data",
              "description": "<p>Contributors Data Object</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "error",
              "description": "<p>Error if Any.</p>"
            }
          ]
        },
        "examples": [
          {
            "title": "Success-Response:",
            "content": "    HTTP/1.1 200 OK\n    {\n\t\t\t    \"code\": 200,\n\t\t\t    \"message\": \"Contributors Details retreived successfully!!\",\n\t\t\t    \"data\": {\n\t\t\t        \"contributors_id\": \"3\",\n\t\t\t        \"contributors_name\": \"Pratik K\",\n\t\t\t        \"contributors_designation\": \"PHP Develeoper\",\n\t\t\t        \"contributors_image\": \"http://localhost/chikitsa_shastra/assets/uploaded_data/contributors_data/Image_5ac856ad525e2-1526038726.jpg\",\n\t\t\t        \"contributors_data\": \"adfasdfsfsf\"\n\t\t\t    },\n\t\t\t    \"error\": \"\",\n\t\t\t    \"latest_version\": []\n\t\t\t}",
            "type": "json"
          }
        ]
      },
      "version": "0.0.0",
      "filename": "application/modules/api/controllers/Login.php",
      "groupTitle": "Contributors"
    },
    {
      "type": "post",
      "url": "/login/get_contributors",
      "title": "Get Contributors",
      "name": "get_contributors",
      "group": "Contributors",
      "parameter": {
        "fields": {
          "Parameter": [
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "token",
              "description": "<p>user Token.</p>"
            }
          ]
        }
      },
      "success": {
        "fields": {
          "Success 200": [
            {
              "group": "Success 200",
              "type": "Number",
              "optional": false,
              "field": "code",
              "description": "<p>HTTP Status Code.</p>"
            },
            {
              "group": "Success 200",
              "type": "String",
              "optional": false,
              "field": "message",
              "description": "<p>Associated Message.</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "data",
              "description": "<p>Contributors Data Object</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "error",
              "description": "<p>Error if Any.</p>"
            }
          ]
        },
        "examples": [
          {
            "title": "Success-Response:",
            "content": "    HTTP/1.1 200 OK\n    {\n\t\t\t    \"code\": 200,\n\t\t\t    \"message\": \"Contributors List retreived successfully!!\",\n\t\t\t    \"data\": [\n\t\t\t        {\n\t\t\t            \"contributors_id\": \"1\",\n\t\t\t            \"contributors_name\": \"Manthan SHAH\",\n\t\t\t            \"contributors_designation\": \"TL\",\n\t\t\t            \"contributors_image\": \"http://localhost/chikitsa_shastra/assets/uploaded_data/contributors_data/Image_5ac856ad525e2-1526035533.jpg\",\n\t\t\t            \"contributors_data\": \"asdasdasdasddddddddddddddasdadad\"\n\t\t\t        },\n\t\t\t        {\n\t\t\t            \"contributors_id\": \"2\",\n\t\t\t            \"contributors_name\": \"Prajakta Panchal\",\n\t\t\t            \"contributors_designation\": \"Sr PHP developer\",\n\t\t\t            \"contributors_image\": \"http://localhost/chikitsa_shastra/assets/uploaded_data/contributors_data/Image_5ac856ad525e2-1526038710.jpg\",\n\t\t\t            \"contributors_data\": \"sdfasssfsdafsdf\"\n\t\t\t        },\n\t\t\t        {\n\t\t\t            \"contributors_id\": \"3\",\n\t\t\t            \"contributors_name\": \"Pratik K\",\n\t\t\t            \"contributors_designation\": \"PHP Develeoper\",\n\t\t\t            \"contributors_image\": \"http://localhost/chikitsa_shastra/assets/uploaded_data/contributors_data/Image_5ac856ad525e2-1526038726.jpg\",\n\t\t\t            \"contributors_data\": \"adfasdfsfsf\"\n\t\t\t        }\n\t\t\t    ],\n\t\t\t    \"error\": \"\",\n\t\t\t    \"latest_version\": []\n\t\t\t}",
            "type": "json"
          }
        ]
      },
      "version": "0.0.0",
      "filename": "application/modules/api/controllers/Login.php",
      "groupTitle": "Contributors"
    },
    {
      "type": "post",
      "url": "/upload_data/add_comment",
      "title": "Add Comment",
      "name": "add_comment",
      "group": "Feedback",
      "parameter": {
        "fields": {
          "Parameter": [
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "token",
              "description": "<p>user Token.</p>"
            },
            {
              "group": "Parameter",
              "type": "Number",
              "size": "1..11",
              "optional": false,
              "field": "upload_data_id",
              "description": "<p>Upload Data ID</p>"
            },
            {
              "group": "Parameter",
              "type": "String",
              "optional": false,
              "field": "users_name",
              "description": "<p>Users Name</p>"
            },
            {
              "group": "Parameter",
              "type": "String",
              "optional": false,
              "field": "users_email",
              "description": "<p>Users Email</p>"
            },
            {
              "group": "Parameter",
              "type": "String",
              "optional": false,
              "field": "comment",
              "description": "<p>comment</p>"
            }
          ]
        }
      },
      "success": {
        "fields": {
          "Success 200": [
            {
              "group": "Success 200",
              "type": "Number",
              "optional": false,
              "field": "code",
              "description": "<p>HTTP Status Code.</p>"
            },
            {
              "group": "Success 200",
              "type": "String",
              "optional": false,
              "field": "message",
              "description": "<p>Associated Message.</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "data",
              "description": "<p>Feedback Data Object</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "error",
              "description": "<p>Error if Any.</p>"
            }
          ]
        },
        "examples": [
          {
            "title": "Success-Response:",
            "content": "    HTTP/1.1 200 OK\n    {\n\t\t\t    \"code\": 200,\n\t\t\t    \"message\": \"Comment has been saved successfully!! It will be shown once it is approved from Admin!!\",\n\t\t\t    \"data\": {},\n\t\t\t    \"error\": \"\",\n\t\t\t    \"latest_version\": []\n\t\t\t}",
            "type": "json"
          }
        ]
      },
      "version": "0.0.0",
      "filename": "application/modules/api/controllers/Upload_data.php",
      "groupTitle": "Feedback"
    },
    {
      "type": "post",
      "url": "/feedback/get_feedback",
      "title": "Get Feedback",
      "name": "get_feedback",
      "group": "Feedback",
      "parameter": {
        "fields": {
          "Parameter": [
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "token",
              "description": "<p>user Token.</p>"
            }
          ]
        }
      },
      "success": {
        "fields": {
          "Success 200": [
            {
              "group": "Success 200",
              "type": "Number",
              "optional": false,
              "field": "code",
              "description": "<p>HTTP Status Code.</p>"
            },
            {
              "group": "Success 200",
              "type": "String",
              "optional": false,
              "field": "message",
              "description": "<p>Associated Message.</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "data",
              "description": "<p>Feedback Data Object</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "error",
              "description": "<p>Error if Any.</p>"
            }
          ]
        },
        "examples": [
          {
            "title": "Success-Response:",
            "content": "    HTTP/1.1 200 OK\n    {\n\t\t\t    \"code\": 200,\n\t\t\t    \"message\": \"Feedback List retreived successfully!!\",\n\t\t\t    \"data\": [\n\t\t\t        {\n\t\t\t            \"feedback_id\": \"3\",\n\t\t\t            \"feedback_question\": \"Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.adadada\",\n\t\t\t            \"feedback_datetime\": \"2018-06-12 11:28:36\",\n\t\t\t            \"is_active\": \"1\",\n\t\t\t            \"users_feedback\": \"\"\n\t\t\t        },\n\t\t\t        {\n\t\t\t            \"feedback_id\": \"4\",\n\t\t\t            \"feedback_question\": \"Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.adadada\",\n\t\t\t            \"feedback_datetime\": \"2018-06-12 11:28:36\",\n\t\t\t            \"is_active\": \"1\",\n\t\t\t            \"users_feedback\": \"\"\n\t\t\t        }\n\t\t\t    ],\n\t\t\t    \"error\": \"\",\n\t\t\t    \"latest_version\": []\n\t\t\t}",
            "type": "json"
          }
        ]
      },
      "version": "0.0.0",
      "filename": "application/modules/api/controllers/Feedback.php",
      "groupTitle": "Feedback"
    },
    {
      "type": "post",
      "url": "/feedback/submit_feedback",
      "title": "Submit Feedback",
      "name": "submit_feedback",
      "group": "Feedback",
      "parameter": {
        "fields": {
          "Parameter": [
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "token",
              "description": "<p>user Token.</p>"
            },
            {
              "group": "Parameter",
              "type": "Number",
              "size": "1..11",
              "optional": false,
              "field": "user_id",
              "description": "<p>User ID</p>"
            },
            {
              "group": "Parameter",
              "type": "String",
              "optional": false,
              "field": "feedback_arr",
              "description": "<p>Feedback Array containing feedback_id and users_feedback. Example {&quot;user_id&quot; : &quot;1&quot;,&quot;feedback_arr&quot; : [{&quot;feedback_id&quot;:&quot;3&quot;,&quot;users_feedback&quot;:&quot;Pratik&quot;},{&quot;feedback_id&quot;:&quot;4&quot;,&quot;users_feedback&quot;:&quot;Kamble&quot;}]}</p>"
            }
          ]
        }
      },
      "success": {
        "fields": {
          "Success 200": [
            {
              "group": "Success 200",
              "type": "Number",
              "optional": false,
              "field": "code",
              "description": "<p>HTTP Status Code.</p>"
            },
            {
              "group": "Success 200",
              "type": "String",
              "optional": false,
              "field": "message",
              "description": "<p>Associated Message.</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "data",
              "description": "<p>Feedback Data Object</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "error",
              "description": "<p>Error if Any.</p>"
            }
          ]
        },
        "examples": [
          {
            "title": "Success-Response:",
            "content": "    HTTP/1.1 200 OK\n    {\n\t\t\t    \"code\": 200,\n\t\t\t    \"message\": \"Your Feedback has been submitted successfully!!\",\n\t\t\t    \"data\": {},\n\t\t\t    \"error\": \"\",\n\t\t\t    \"latest_version\": []\n\t\t\t}",
            "type": "json"
          }
        ]
      },
      "version": "0.0.0",
      "filename": "application/modules/api/controllers/Feedback.php",
      "groupTitle": "Feedback"
    },
    {
      "type": "post",
      "url": "/login/register",
      "title": "User Register",
      "name": "register",
      "group": "Login",
      "parameter": {
        "fields": {
          "Parameter": [
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "number",
              "description": "<p>User Number.</p>"
            },
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": true,
              "field": "user_type",
              "defaultValue": "general,student",
              "description": "<p>User Type.</p>"
            },
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..15",
              "optional": false,
              "field": "email_id",
              "description": "<p>Email ID.</p>"
            },
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "users_name",
              "description": "<p>Users Name</p>"
            },
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "qualification",
              "description": "<p>Student Qualification</p>"
            },
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "medical_college",
              "description": "<p>Medical College</p>"
            },
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "os",
              "description": "<p>Device OS.</p>"
            },
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "os_version",
              "description": "<p>Device OS Version.</p>"
            },
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "app_version",
              "description": "<p>App Version.</p>"
            }
          ]
        }
      },
      "success": {
        "fields": {
          "Success 200": [
            {
              "group": "Success 200",
              "type": "Number",
              "optional": false,
              "field": "code",
              "description": "<p>HTTP Status Code.</p>"
            },
            {
              "group": "Success 200",
              "type": "String",
              "optional": false,
              "field": "message",
              "description": "<p>Associated Message.</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "data",
              "description": "<p>User Data Object</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "error",
              "description": "<p>Error if Any.</p>"
            }
          ]
        },
        "examples": [
          {
            "title": "Success-Response:",
            "content": "    HTTP/1.1 200 OK\n    {\n\t\t\t    \"code\": 200,\n\t\t\t    \"message\": \"User has logged in successfully.\",\n\t\t\t    \"data\": {\n\t\t\t        \"users_id\": \"1\",\n\t\t\t        \"users_name\": \"pratik\",\n\t\t\t        \"users_type\": \"General\",\n\t\t\t        \"number\": \"1212121212\",\n\t\t\t        \"email_id\": \"ajhd@gmail.com\",\n\t\t\t        \"student_qualification\": \"\",\n\t\t\t        \"medical_college\": \"\",\n\t\t\t        \"added_date_time\": \"2018-05-08 19:00:51\",\n\t\t\t        \"is_active\": \"1\",\n\t\t\t        \"access_token\": \"Ka0AHJpUsoyaYpWoYYJG2z0a3MnuOyVx1525841523\",\n\t\t\t        \"os\": \"ad\",\n\t\t\t        \"os_version\": \"ads\",\n\t\t\t        \"app_version\": \"ada\"\n\t\t\t    },\n\t\t\t    \"error\": \"\",\n\t\t\t    \"latest_version\": []\n\t\t\t}",
            "type": "json"
          }
        ]
      },
      "version": "0.0.0",
      "filename": "application/modules/api/controllers/Login.php",
      "groupTitle": "Login"
    },
    {
      "type": "post",
      "url": "/login/user_login",
      "title": "User Login",
      "name": "user_login",
      "group": "Login",
      "parameter": {
        "fields": {
          "Parameter": [
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "username",
              "description": "<p>User Name.</p>"
            },
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..15",
              "optional": false,
              "field": "password",
              "description": "<p>Password</p>"
            },
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "os",
              "description": "<p>Device OS</p>"
            },
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "os_version",
              "description": "<p>Device OS Version</p>"
            },
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "app_version",
              "description": "<p>App Version</p>"
            }
          ]
        }
      },
      "success": {
        "fields": {
          "Success 200": [
            {
              "group": "Success 200",
              "type": "Number",
              "optional": false,
              "field": "code",
              "description": "<p>HTTP Status Code.</p>"
            },
            {
              "group": "Success 200",
              "type": "String",
              "optional": false,
              "field": "message",
              "description": "<p>Associated Message.</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "data",
              "description": "<p>User Data Object</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "error",
              "description": "<p>Error if Any.</p>"
            }
          ]
        },
        "examples": [
          {
            "title": "Success-Response:",
            "content": "    HTTP/1.1 200 OK\n    {\n\t\t\t    \"code\": 200,\n\t\t\t    \"message\": \"User has logged in successfully.\",\n\t\t\t    \"data\": {\n\t\t\t        \"users_id\": \"1\",\n\t\t\t        \"users_name\": \"pratik\",\n\t\t\t        \"users_type\": \"General\",\n\t\t\t        \"number\": \"1212121212\",\n\t\t\t        \"email_id\": \"ajhd@gmail.com\",\n\t\t\t        \"student_qualification\": \"\",\n\t\t\t        \"medical_college\": \"\",\n\t\t\t        \"added_date_time\": \"2018-05-08 19:00:51\",\n\t\t\t        \"is_active\": \"1\",\n\t\t\t        \"access_token\": \"Ka0AHJpUsoyaYpWoYYJG2z0a3MnuOyVx1525841523\",\n\t\t\t        \"os\": \"ad\",\n\t\t\t        \"os_version\": \"ads\",\n\t\t\t        \"app_version\": \"ada\"\n\t\t\t    },\n\t\t\t    \"error\": \"\",\n\t\t\t    \"latest_version\": []\n\t\t\t}",
            "type": "json"
          }
        ]
      },
      "version": "0.0.0",
      "filename": "application/modules/api/controllers/Login.php",
      "groupTitle": "Login"
    },
    {
      "type": "post",
      "url": "/upload_data/get_notifications_lists",
      "title": "Get Notifications lists Of Uploaded Data",
      "name": "get_notifications_lists",
      "group": "Notifications_lists_Of_Upload_Data",
      "parameter": {
        "fields": {
          "Parameter": [
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "token",
              "description": "<p>Token.</p>"
            }
          ]
        }
      },
      "success": {
        "fields": {
          "Success 200": [
            {
              "group": "Success 200",
              "type": "Number",
              "optional": false,
              "field": "code",
              "description": "<p>HTTP Status Code.</p>"
            },
            {
              "group": "Success 200",
              "type": "String",
              "optional": false,
              "field": "message",
              "description": "<p>Associated Message.</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "data",
              "description": "<p>Upload Data Object</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "error",
              "description": "<p>Error if Any.</p>"
            }
          ]
        },
        "examples": [
          {
            "title": "Success-Response:",
            "content": "    HTTP/1.1 200 OK\n    {\n\t\t\t    \"code\": 200,\n\t\t\t    \"message\": \"Data has been retreived successfully!!\",\n\t\t\t    \"data\": [\n\t\t\t        {\n\t\t\t            \"notification_id\": \"1\",\n\t\t\t            \"register_id\": \"cTHTd2TO71w:APA91bFcTa2Ip-tl8xEyfEAYPCaGEIaHhbm9QilbDKsrQxp32hvDmMulLBAKgvKhVfPyh5QjEl_GU1iq6pkMkq4aTqQsi6cwpiZ7pf2sHj_rfEsYJo_d_o32bZxplUEO6gMU7o5sR-6-\",\n\t\t\t            \"status\": \"0:1561444623007609%628162b9f9fd7ecd\",\n\t\t\t            \"upload_data_id\": \"95\",\n\t\t\t            \"upload_path\": \"medicalDirectors.jpg\",\n\t\t\t            \"upload_type\": \"video\",\n\t\t\t            \"video_type\": \"inhouse\",\n\t\t\t            \"upload_for_user_type\": \"Both\",\n\t\t\t            \"youtube_video_id\": \"0\",\n\t\t\t            \"title\": \"19 ??? ?? ??? ?? - ??? ??? ?? ?? ?? !\",\n\t\t\t            \"desc\": \"New Content Uploaded\",\n\t\t\t            \"date\": null,\n\t\t\t            \"insert_dt\": \"2019-06-25 12:07:03\",\n\t\t\t            \"insert_user_id\": \"8436\",\n\t\t\t            \"ip_address\": null\n\t\t\t        },\n\t\t\t        {\n\t\t\t            \"notification_id\": \"2\",\n\t\t\t            \"register_id\": \"cTHTd2TO71w:APA91bFcTa2Ip-tl8xEyfEAYPCaGEIaHhbm9QilbDKsrQxp32hvDmMulLBAKgvKhVfPyh5QjEl_GU1iq6pkMkq4aTqQsi6cwpiZ7pf2sHj_rfEsYJo_d_o32bZxplUEO6gMU7o5sR-6-\",\n\t\t\t            \"status\": \"0:1561444661565884%628162b9f9fd7ecd\",\n\t\t\t            \"upload_data_id\": \"95\",\n\t\t\t            \"upload_path\": \"medicalDirectors.jpg\",\n\t\t\t            \"upload_type\": \"video\",\n\t\t\t            \"video_type\": \"inhouse\",\n\t\t\t            \"upload_for_user_type\": \"Both\",\n\t\t\t            \"youtube_video_id\": \"0\",\n\t\t\t            \"title\": \"19 ??? ?? ??? ?? - ??? ??? ?? ?? ?? !\",\n\t\t\t            \"desc\": \"New Content Uploaded\",\n\t\t\t            \"date\": null,\n\t\t\t            \"insert_dt\": \"2019-06-25 12:07:41\",\n\t\t\t            \"insert_user_id\": \"8436\",\n\t\t\t            \"ip_address\": null\n\t\t\t        }\n\t\t\t    ],\n\t\t\t    \"error\": \"\",\n\t\t\t    \"latest_version\": {\n\t\t\t        \"ios\": \"2.1\",\n\t\t\t        \"android\": \"2.7\"\n\t\t\t    }\n\t\t\t}",
            "type": "json"
          }
        ]
      },
      "version": "0.0.0",
      "filename": "application/modules/api/controllers/Upload_data.php",
      "groupTitle": "Notifications_lists_Of_Upload_Data"
    },
    {
      "type": "post",
      "url": "/upload_data/get_details_of_upload_data",
      "title": "Get Details Of Upload Data",
      "name": "get_details_of_upload_data",
      "group": "Upload_Data",
      "parameter": {
        "fields": {
          "Parameter": [
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "token",
              "description": "<p>Token.</p>"
            },
            {
              "group": "Parameter",
              "type": "Number",
              "size": "1..11",
              "optional": false,
              "field": "upload_data_id",
              "description": "<p>Upload Data ID.</p>"
            }
          ]
        }
      },
      "success": {
        "fields": {
          "Success 200": [
            {
              "group": "Success 200",
              "type": "Number",
              "optional": false,
              "field": "code",
              "description": "<p>HTTP Status Code.</p>"
            },
            {
              "group": "Success 200",
              "type": "String",
              "optional": false,
              "field": "message",
              "description": "<p>Associated Message.</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "data",
              "description": "<p>Upload Data Object</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "error",
              "description": "<p>Error if Any.</p>"
            }
          ]
        },
        "examples": [
          {
            "title": "Success-Response:",
            "content": "    HTTP/1.1 200 OK\n    {\n\t\t\t    \"code\": 200,\n\t\t\t    \"message\": \"Sub Category Data has been retreived successfully!!\",\n\t\t\t    \"data\": [\n\t\t\t        {\n\t\t\t            \"upload_data_id\": \"437\",\n\t\t\t            \"upload_title\": \"Arterial pulsations in neck\",\n\t\t\t            \"upload_type\": \"video\",\n\t\t\t            \"video_type\": \"inhouse\",\n\t\t\t            \"upload_for_user_type\": \"Student\",\n\t\t\t            \"short_description\": \"Arterial pulsations in neck\",\n\t\t\t            \"upload_description\": \"\",\n\t\t\t            \"category_id\": \"8\",\n\t\t\t            \"sub_category_id\": \"47\",\n\t\t\t            \"upload_path\": \"http://localhost/mch-new/uploads/assets/uploaded_data/posts_video/47/Arterial_pulsations_in_neck-1539673557.mp4\",\n\t\t\t            \"thumbnail\": \"http://localhost/mch-new/assets/images/medicalDirectors.jpg\",\n\t\t\t            \"icon_path\": \"http://localhost/mch-new/assets/images/upload/icons/medical-education.png\",\n\t\t\t            \"tags\": \"Arterial,pulsations,neck\",\n\t\t\t            \"sub_category_name\": \"Clinical examination\",\n\t\t\t            \"sub_category_image\": \"http://localhost/mch-new/uploads/assets/uploaded_data/posts_img/medical-education-1534239907-1539673367.png\",\n\t\t\t            \"added_date_time\": \"16 Oct 2018\",\n\t\t\t            \"uploaded_ago\": \"Released 119 Days Ago\",\n\t\t\t            \"youtube_video_id\": \"jAMZngNIRVE\",\n\t\t\t            \"view_count\": \"52\",\n            \t\t\t\"comment_count\": 4,\n\t\t\t            \"comment_arr\": [\n\t\t\t                {\n\t\t\t                    \"comments_id\": \"33\",\n\t\t\t                    \"comment\": \"Testing Add Comment Functionality\",\n\t\t\t                    \"upload_data_id\": \"478\",\n\t\t\t                    \"users_name\": \"Mr.xyz\",\n\t\t\t                    \"users_email\": \"xyz@techizer.in\",\n\t\t\t                    \"comments_dt\": \"2019-02-18 18:48:21\"\n\t\t\t                },\n\t\t\t                {\n\t\t\t                    \"comments_id\": \"32\",\n\t\t\t                    \"comment\": \"Testing Add Comment Functionality\",\n\t\t\t                    \"upload_data_id\": \"478\",\n\t\t\t                    \"users_name\": \"pratik k\",\n\t\t\t                    \"users_email\": \"pratik@techizer.in\",\n\t\t\t                    \"comments_dt\": \"2019-02-18 18:43:22\"\n\t\t\t                },\n\t\t\t                {\n\t\t\t                    \"comments_id\": \"30\",\n\t\t\t                    \"comment\": \"Testing Add Comment Functionality\",\n\t\t\t                    \"upload_data_id\": \"478\",\n\t\t\t                    \"users_name\": \"Tejauka\",\n\t\t\t                    \"users_email\": \"tejuaka@techizer.in\",\n\t\t\t                    \"comments_dt\": \"2019-02-18 16:50:35\"\n\t\t\t                },\n\t\t\t                {\n\t\t\t                    \"comments_id\": \"28\",\n\t\t\t                    \"comment\": \"Testing Add Comment Functionality\",\n\t\t\t                    \"upload_data_id\": \"478\",\n\t\t\t                    \"users_name\": \"pratik 121212\",\n\t\t\t                    \"users_email\": \"pratik1212@gmail.com\",\n\t\t\t                    \"comments_dt\": \"2019-01-16 15:49:23\"\n\t\t\t                }\n\t\t\t            ]\n\t\t\t        }\n\t\t\t    ],\n\t\t\t    \"error\": \"\",\n\t\t\t    \"latest_version\": {\n\t\t\t        \"ios\": \"2.1\",\n\t\t\t        \"android\": \"2.6\"\n\t\t\t    }\n\t\t\t}",
            "type": "json"
          }
        ]
      },
      "version": "0.0.0",
      "filename": "application/modules/api/controllers/Upload_data.php",
      "groupTitle": "Upload_Data"
    },
    {
      "type": "post",
      "url": "/upload_data/get_upload_data",
      "title": "Get Upload Data",
      "name": "get_upload_data",
      "group": "Upload_Data",
      "parameter": {
        "fields": {
          "Parameter": [
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "token",
              "description": "<p>Token.</p>"
            },
            {
              "group": "Parameter",
              "type": "Number",
              "size": "1..11",
              "optional": false,
              "field": "category_id",
              "description": "<p>Category ID.</p>"
            },
            {
              "group": "Parameter",
              "type": "Number",
              "size": "1..11",
              "optional": false,
              "field": "sub_category_id",
              "description": "<p>Sub Category ID.</p>"
            },
            {
              "group": "Parameter",
              "type": "String",
              "size": "1..149",
              "optional": false,
              "field": "tags",
              "description": "<p>Tags.</p>"
            }
          ]
        }
      },
      "success": {
        "fields": {
          "Success 200": [
            {
              "group": "Success 200",
              "type": "Number",
              "optional": false,
              "field": "code",
              "description": "<p>HTTP Status Code.</p>"
            },
            {
              "group": "Success 200",
              "type": "String",
              "optional": false,
              "field": "message",
              "description": "<p>Associated Message.</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "data",
              "description": "<p>Upload Data Object</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "error",
              "description": "<p>Error if Any.</p>"
            }
          ]
        },
        "examples": [
          {
            "title": "Success-Response:",
            "content": "    HTTP/1.1 200 OK\n    {\n\t\t\t    \"code\": 200,\n\t\t\t    \"message\": \"Sub Category Data has been retreived successfully!!\",\n\t\t\t    \"data\": [\n\t\t\t        {\n\t\t\t            \"upload_data_id\": \"437\",\n\t\t\t            \"upload_title\": \"Arterial pulsations in neck\",\n\t\t\t            \"upload_type\": \"video\",\n\t\t\t            \"video_type\": \"inhouse\",\n\t\t\t            \"upload_for_user_type\": \"Student\",\n\t\t\t            \"short_description\": \"Arterial pulsations in neck\",\n\t\t\t            \"upload_description\": \"\",\n\t\t\t            \"category_id\": \"8\",\n\t\t\t            \"sub_category_id\": \"47\",\n\t\t\t            \"upload_path\": \"http://localhost/mch-new/uploads/assets/uploaded_data/posts_video/47/Arterial_pulsations_in_neck-1539673557.mp4\",\n\t\t\t            \"thumbnail\": \"http://localhost/mch-new/assets/images/medicalDirectors.jpg\",\n\t\t\t            \"icon_path\": \"http://localhost/mch-new/assets/images/upload/icons/medical-education.png\",\n\t\t\t            \"tags\": \"Arterial,pulsations,neck\",\n\t\t\t            \"sub_category_name\": \"Clinical examination\",\n\t\t\t            \"sub_category_image\": \"http://localhost/mch-new/uploads/assets/uploaded_data/posts_img/medical-education-1534239907-1539673367.png\",\n\t\t\t            \"added_date_time\": \"16 Oct 2018\",\n\t\t\t            \"uploaded_ago\": \"Released 119 Days Ago\",\n\t\t\t            \"youtube_video_id\": \"jAMZngNIRVE\",\n\t\t\t            \"view_count\": \"52\",\n            \t\t\t\"comment_count\": 4,\n\t\t\t            \"comment_arr\": [\n\t\t\t                {\n\t\t\t                    \"comments_id\": \"33\",\n\t\t\t                    \"comment\": \"Testing Add Comment Functionality\",\n\t\t\t                    \"upload_data_id\": \"478\",\n\t\t\t                    \"users_name\": \"Mr.xyz\",\n\t\t\t                    \"users_email\": \"xyz@techizer.in\",\n\t\t\t                    \"comments_dt\": \"2019-02-18 18:48:21\"\n\t\t\t                },\n\t\t\t                {\n\t\t\t                    \"comments_id\": \"32\",\n\t\t\t                    \"comment\": \"Testing Add Comment Functionality\",\n\t\t\t                    \"upload_data_id\": \"478\",\n\t\t\t                    \"users_name\": \"pratik k\",\n\t\t\t                    \"users_email\": \"pratik@techizer.in\",\n\t\t\t                    \"comments_dt\": \"2019-02-18 18:43:22\"\n\t\t\t                },\n\t\t\t                {\n\t\t\t                    \"comments_id\": \"30\",\n\t\t\t                    \"comment\": \"Testing Add Comment Functionality\",\n\t\t\t                    \"upload_data_id\": \"478\",\n\t\t\t                    \"users_name\": \"Tejauka\",\n\t\t\t                    \"users_email\": \"tejuaka@techizer.in\",\n\t\t\t                    \"comments_dt\": \"2019-02-18 16:50:35\"\n\t\t\t                },\n\t\t\t                {\n\t\t\t                    \"comments_id\": \"28\",\n\t\t\t                    \"comment\": \"Testing Add Comment Functionality\",\n\t\t\t                    \"upload_data_id\": \"478\",\n\t\t\t                    \"users_name\": \"pratik 121212\",\n\t\t\t                    \"users_email\": \"pratik1212@gmail.com\",\n\t\t\t                    \"comments_dt\": \"2019-01-16 15:49:23\"\n\t\t\t                }\n\t\t\t            ]\n\t\t\t        },\n\t\t\t        {\n\t\t\t            \"upload_data_id\": \"438\",\n\t\t\t            \"upload_title\": \"Nystagmus\",\n\t\t\t            \"upload_type\": \"video\",\n\t\t\t            \"video_type\": \"inhouse\",\n\t\t\t            \"upload_for_user_type\": \"Student\",\n\t\t\t            \"short_description\": \"Nystagmus\",\n\t\t\t            \"upload_description\": \"\",\n\t\t\t            \"category_id\": \"8\",\n\t\t\t            \"sub_category_id\": \"47\",\n\t\t\t            \"upload_path\": \"http://localhost/mch-new/uploads/assets/uploaded_data/posts_video/47/Nystagmus-1539673779.mp4\",\n\t\t\t            \"thumbnail\": \"http://localhost/mch-new/assets/images/medicalDirectors.jpg\",\n\t\t\t            \"icon_path\": \"http://localhost/mch-new/assets/images/upload/icons/medical-education.png\",\n\t\t\t            \"tags\": \"Nystagmus\",\n\t\t\t            \"sub_category_name\": \"Clinical examination\",\n\t\t\t            \"sub_category_image\": \"http://localhost/mch-new/uploads/assets/uploaded_data/posts_img/medical-education-1534239907-1539673367.png\",\n\t\t\t            \"added_date_time\": \"16 Oct 2018\",\n\t\t\t            \"uploaded_ago\": \"Released 119 Days Ago\",\n\t\t\t            \"youtube_video_id\": null,\n\t\t\t            \"view_count\": \"52\",\n            \t\t\t\"comment_count\": 0,\n\t\t\t            \"comment_arr\": []\n\t\t\t        },\n\t\t\t        {\n\t\t\t            \"upload_data_id\": \"439\",\n\t\t\t            \"upload_title\": \"Solitary thyroid nodule\",\n\t\t\t            \"upload_type\": \"video\",\n\t\t\t            \"video_type\": \"inhouse\",\n\t\t\t            \"upload_for_user_type\": \"Student\",\n\t\t\t            \"short_description\": \"Solitary thyroid nodule\",\n\t\t\t            \"upload_description\": \"\",\n\t\t\t            \"category_id\": \"8\",\n\t\t\t            \"sub_category_id\": \"47\",\n\t\t\t            \"upload_path\": \"http://localhost/mch-new/uploads/assets/uploaded_data/posts_video/47/Solitary thyroid nodule-1539674006.mp4\",\n\t\t\t            \"thumbnail\": \"http://localhost/mch-new/assets/images/medicalDirectors.jpg\",\n\t\t\t            \"icon_path\": \"http://localhost/mch-new/assets/images/upload/icons/medical-education.png\",\n\t\t\t            \"tags\": \"Solitary thyroid nodule,Solitary,thyroid,nodule\",\n\t\t\t            \"sub_category_name\": \"Clinical examination\",\n\t\t\t            \"sub_category_image\": \"http://localhost/mch-new/uploads/assets/uploaded_data/posts_img/medical-education-1534239907-1539673367.png\",\n\t\t\t            \"added_date_time\": \"16 Oct 2018\",\n\t\t\t            \"uploaded_ago\": \"Released 119 Days Ago\",\n\t\t\t            \"youtube_video_id\": null,\n\t\t\t            \"view_count\": \"52\",\n            \t\t\t\"comment_count\": 0,\n\t\t\t            \"comment_arr\": []\n\t\t\t        },\n\t\t\t        {\n\t\t\t            \"upload_data_id\": \"440\",\n\t\t\t            \"upload_title\": \"Prominent arterial pulsations\",\n\t\t\t            \"upload_type\": \"video\",\n\t\t\t            \"video_type\": \"inhouse\",\n\t\t\t            \"upload_for_user_type\": \"Student\",\n\t\t\t            \"short_description\": \"Prominent arterial pulsations\",\n\t\t\t            \"upload_description\": \"\",\n\t\t\t            \"category_id\": \"8\",\n\t\t\t            \"sub_category_id\": \"47\",\n\t\t\t            \"upload_path\": \"http://localhost/mch-new/uploads/assets/uploaded_data/posts_video/47/Prominent arterial pulsations-1539674213.mp4\",\n\t\t\t            \"thumbnail\": \"http://localhost/mch-new/assets/images/medicalDirectors.jpg\",\n\t\t\t            \"icon_path\": \"http://localhost/mch-new/assets/images/upload/icons/medical-education.png\",\n\t\t\t            \"tags\": \"Prominent arterial pulsations,Prominent,arterial,pulsations\",\n\t\t\t            \"sub_category_name\": \"Clinical examination\",\n\t\t\t            \"sub_category_image\": \"http://localhost/mch-new/uploads/assets/uploaded_data/posts_img/medical-education-1534239907-1539673367.png\",\n\t\t\t            \"added_date_time\": \"16 Oct 2018\",\n\t\t\t            \"uploaded_ago\": \"Released 119 Days Ago\",\n\t\t\t            \"youtube_video_id\": null,\n\t\t\t            \"view_count\": \"52\",\n            \t\t\t\"comment_count\": 0,\n\t\t\t            \"comment_arr\": []\n\t\t\t        },\n\t\t\t        {\n\t\t\t            \"upload_data_id\": \"441\",\n\t\t\t            \"upload_title\": \"Examination of breast\",\n\t\t\t            \"upload_type\": \"video\",\n\t\t\t            \"video_type\": \"inhouse\",\n\t\t\t            \"upload_for_user_type\": \"Student\",\n\t\t\t            \"short_description\": \"Examination of breast\",\n\t\t\t            \"upload_description\": \"\",\n\t\t\t            \"category_id\": \"8\",\n\t\t\t            \"sub_category_id\": \"47\",\n\t\t\t            \"upload_path\": \"http://localhost/mch-new/uploads/assets/uploaded_data/posts_video/47/Examination_of_breast-1539680109.mp4\",\n\t\t\t            \"thumbnail\": \"http://localhost/mch-new/assets/images/medicalDirectors.jpg\",\n\t\t\t            \"icon_path\": \"http://localhost/mch-new/assets/images/upload/icons/medical-education.png\",\n\t\t\t            \"tags\": \"Examination of breast; using flat hand,breast tissue is rolled to appreciate presence of any breast bud (a distinct firm mass,Examination of breast,breast,examination\",\n\t\t\t            \"sub_category_name\": \"Clinical examination\",\n\t\t\t            \"sub_category_image\": \"http://localhost/mch-new/uploads/assets/uploaded_data/posts_img/medical-education-1534239907-1539673367.png\",\n\t\t\t            \"added_date_time\": \"16 Oct 2018\",\n\t\t\t            \"uploaded_ago\": \"Released 119 Days Ago\",\n\t\t\t            \"youtube_video_id\": null,\n\t\t\t            \"view_count\": \"52\",\n            \t\t\t\"comment_count\": 0,\n\t\t\t            \"comment_arr\": []\n\t\t\t        }\n\t\t\t    ],\n\t\t\t    \"error\": \"\",\n\t\t\t    \"latest_version\": {\n\t\t\t        \"ios\": \"2.1\",\n\t\t\t        \"android\": \"2.6\"\n\t\t\t    }\n\t\t\t}",
            "type": "json"
          }
        ]
      },
      "version": "0.0.0",
      "filename": "application/modules/api/controllers/Upload_data.php",
      "groupTitle": "Upload_Data"
    },
    {
      "type": "post",
      "url": "/upload_data/user_data_seen",
      "title": "User Data Seen",
      "name": "user_data_seen",
      "group": "Upload",
      "parameter": {
        "fields": {
          "Parameter": [
            {
              "group": "Parameter",
              "type": "Number",
              "size": "1..149",
              "optional": false,
              "field": "users_id",
              "description": "<p>Users ID.</p>"
            },
            {
              "group": "Parameter",
              "type": "Number",
              "size": "1..149",
              "optional": false,
              "field": "category_id",
              "description": "<p>Category ID.</p>"
            },
            {
              "group": "Parameter",
              "type": "Number",
              "size": "1..149",
              "optional": false,
              "field": "sub_category_id",
              "description": "<p>Sub Category ID.</p>"
            },
            {
              "group": "Parameter",
              "type": "Number",
              "size": "1..149",
              "optional": false,
              "field": "upload_data_id",
              "description": "<p>Upload Data ID.</p>"
            }
          ]
        }
      },
      "success": {
        "fields": {
          "Success 200": [
            {
              "group": "Success 200",
              "type": "Number",
              "optional": false,
              "field": "code",
              "description": "<p>HTTP Status Code.</p>"
            },
            {
              "group": "Success 200",
              "type": "String",
              "optional": false,
              "field": "message",
              "description": "<p>Associated Message.</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "data",
              "description": "<p>User Data Object</p>"
            },
            {
              "group": "Success 200",
              "type": "Object",
              "optional": false,
              "field": "error",
              "description": "<p>Error if Any.</p>"
            }
          ]
        },
        "examples": [
          {
            "title": "Success-Response:",
            "content": "    HTTP/1.1 200 OK\n    {\n\t\t\t    \"code\": 200,\n\t\t\t    \"message\": \"Upload data seen.\",\n\t\t\t    \"data\": {},\n\t\t\t    \"error\": \"\",\n\t\t\t    \"latest_version\": []\n\t\t\t}",
            "type": "json"
          }
        ]
      },
      "version": "0.0.0",
      "filename": "application/modules/api/controllers/Upload_data.php",
      "groupTitle": "Upload"
    }
  ]
});
