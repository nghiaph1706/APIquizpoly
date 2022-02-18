<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../config/db.php');
    include_once('../model/course.php');

    $db = new db();
    $connect = $db->connect();

    $course = new Course($connect);

    $course->courseName = isset($_GET['courseName']) ? $_GET['courseName'] : die();

    $course->show();

    $course_item = array(
        'courseName' => $course->courseName,
        'data' => $course->data 
    );

    print_r($course->data);
?>