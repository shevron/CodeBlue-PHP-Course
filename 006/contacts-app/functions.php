<?php

/**
 * Simple Contact Management App
 *
 * functions.php - Shared functions
 *
 */

/**
 * Get DB connection
 *
 * @return PDO
 */
function getDbConnection()
{

}

/**
 * Get contacts list from DB
 *
 * Returns an array of the form (contact ID => contact name)
 *
 * @return array
 */
function getContactsList()
{
    $dbh = getDbConnection();
}

/**
 * Get full contact information
 *
 * @param  integer $contactId
 * @return array
 */
function getContactInfo($contactId)
{
    $dbh = getDbConnection();
}

/**
 * Add a contact to the DB
 *
 * Will return TRUE if the contact was saved
 *
 * @param  string $name
 * @param  string $email
 * @param  string $phone Phone is optional
 * @return boolean
 */
function addContact($name, $email, $phone = null)
{
    $dbh = getDbConnection();
}

/**
 * Print the HTML page header, with a given title
 *
 * @param string $pageTitle
 */
function printHtmlHeader($pageTitle)
{
    $pageTitle = htmlspecialchars($pageTitle);

    echo <<<EOHTML
<!DOCTYPE html>
<html>
    <head>
        <title>$pageTitle</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>

    <body>
        <header>
            <h1>$pageTitle</h1>
        </header>

        <div id="main-content">

EOHTML;

}

/**
 * Print the HTML page footer
 *
 */
function printHtmlFooter()
{
    echo <<<EOHTML
        </div> <!-- end of main-content -->
    </body>
</html>

EOHTML;
}