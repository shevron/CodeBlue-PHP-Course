<?php

/**
 * Your Homework:
 *
 * - Create a simple 3 step wizard
 * - On each step, we ask the user a single question
 * - Answers to previous questions are remembered during next steps but are
 *   not presented again
 * - Upon completion, the wizard will check all 3 answers and will tell the
 *   user if they are right or wrong
 * - Questions can be multiple choice (use radio buttons or a pulldown menu)
 *   or free text
 * - You do not need to implement a "back" functionality (the browser's "back"
 *   button should work)
 * - You should be able to implement this in a single file, but you do not
 *   have to
 *   - If you use more than a single file, do not repeat code
 * - Each step of the wizard should be in it's own request (no CSS or JavaScript
 *   tricks please!)
 * - Hint: preserving data between form pages can be done by using
 *   <input type="hidden" fields>
 */

// Array of questions
$questions = array(
    'What is your name?',
    'What is your favorite color?',
    'What is your quest?',
);

// Array of possible choices for multie-choice questions
$choices = array(
    1 => array('Blue', 'Yellow', 'Red', 'I don\'t know')
);

// Correct answers
$answers = array('Arthur', 0, 'To seek the holly grail');
