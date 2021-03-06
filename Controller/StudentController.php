<?php

declare(strict_types=1);

class StudentController {
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST) {

        //get the list of all the students
        $studentLoader = new StudentLoader();
        $students = $studentLoader->getStudents();
        // var_dump($students);

        //get the list with all the classes
        $classesLoader = new ClassesLoader();
        $classes = $classesLoader->getClasses();
        // var_dump($classes);

        // add student to database
        if (isset($POST['add'])) {
            $studentLoader->addStudent($POST['student-name'], $POST['student-email'], (int)$POST['student-class']);
            $referer = $_SERVER['HTTP_REFERER'];
            header("Location: $referer");
        }

        require 'View/students-view.php';
    }
}
