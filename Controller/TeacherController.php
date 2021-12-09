<?php
declare(strict_types = 1);
//todo: form validation
//todo: check if a teacher with the same name and email already exists in the db before adding
//require 'Model/DataSource.php';
require 'Model/TeacherLoader.php';

class TeacherController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $teacherLoader = new TeacherLoader();
        $teachersArr = $teacherLoader->getTeachers();
        //var_dump($teachersArr);

//        $getTeacherById = $teacherLoader->getTeacherById(2);
//        //var_dump($getTeacherById);
//        echo implode(' - ', $getTeacherById);

        $page = $_GET['page'];
        //load view
        switch ($page) {
            case 'teachers-view':
                //add teacher
                if (isset($_POST['add'])) {
                    //refresh once the add button is clicked, so the list is immediately updated
                    echo "<meta http-equiv='refresh' content='0'>";
                    $teacherLoader->addTeacher($_POST['teacher-name'], $_POST['teacher-email']);
                }
                require 'View/teachers-view.php';
                break;
            case 'teacher-students':
                $teacher = $teacherLoader->getTeacherById((int)$_GET['id']);
                $students = $teacherLoader->getStudents((int)$_GET['id']);
                //var_dump($students);
                require 'View/teacher-students.php';
                break;
        }
    }
}