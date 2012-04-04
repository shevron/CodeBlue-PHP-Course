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

$questionId = 0;

if (isset($_GET['q']) && $_GET['q'] > 0 && $_GET['q'] <= count($questions)) {
    $questionId = (int) $_GET['q'];
}

$result = null;
if ($questionId == count($questions)) {
    // We have answers to all questions
    $result = true;
    foreach($answers as $questId => $answer) {
        if (! isset($_POST["question-$questId"])) {
            $result = false;
            break;
        }

        if ($_POST["question-$questId"] != $answer) {
            $result = false;
            break;
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Bridge Of Death</title>
</head>

<body>
    <h1>Welcome to the Bridge of Death</h1>
<?php if ($result === null): ?>
    <h2>Question <?php echo $questionId + 1 ?> out of <?php echo count($questions); ?></h2>
    <form method="post" action="?q=<?php echo $questionId + 1; ?>">
<?php foreach($questions as $qId => $question): ?>
<?php if ($qId == $questionId): ?>
        <label>Q: <?php echo $questions[$questionId]; ?></label><br />
        A:
<?php if (isset($choices[$questionId])): ?>
        <select name="question-<?php echo $questionId ?>">
<?php foreach($choices[$questionId] as $choiceId => $choice): ?>
            <option value="<?php echo $choiceId ?>"><?php echo $choice ?></option>
<?php endforeach; ?>
        </select><br />
<?php else: ?>
        <input type="text" name="question-<?php echo $questionId ?>" />
<?php endif; ?>
<?php else: ?>
        <input type="hidden" name="question-<?php echo $qId; ?>" value="<?php echo (isset($_POST["question-$qId"]) ? $_POST["question-$qId"] : '') ?>" />
<?php endif; ?>
<?php endforeach; ?>
        <input type="submit" value="Next &raquo;" />
    </form>
<?php elseif ($result): ?>
    <div class="result-correct">
        <h2>Correct, off you go!</h2>
    </div>
<?php else: ?>
    <div class="result-wrong">
        <h2>Wrong! you don't cross!</h2>
    </div>
<?php endif; ?>
</body>
</html>