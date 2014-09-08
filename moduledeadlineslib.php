<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Check the deadlines depending on the module
function block_risk_monitor_missed_quiz_deadline($userid, $cm) {
    
}

function block_risk_monitor_missed_assignment_deadline($userid, $cm) {
    //Get the assignment.
    global $DB;
    $assignment_instance = $DB->get_record('assignment', array('id' => $cm->instance));
    
    //check due date
    $time_due = $assignment_instance->timedue;
    if(!$DB->record_exists('assignment_submissions', array('userid' => $userid, 'assignment' => $assignment_instance->id)) && $time_due != 0 && time() > $time_due) {
        return true;
    }
    return false;
}

function block_risk_monitor_missed_assign_deadline($userid, $cm) {
    //Get the assign
    global $DB;
    $assign_instance = $DB->get_record('assign', array('id' => $cm->instance));
    
    //check due date
    $time_due = $assign_instance->duedate;
    if(!$DB->record_exists('assign_submission', array('userid' => $userid, 'assignment' => $assign_instance->id)) && $time_due != 0 && time() > $time_due) {
        return true;
    }
    return false;    
}

function block_risk_monitor_missed_lesson_deadline($userid, $cm) {
    
}