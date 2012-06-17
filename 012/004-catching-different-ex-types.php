<?php

/**
 * Catch and act upon different types of exceptions
 */

try {
    $user = User::saveInDb($data);

} catch (UserExistsError $ex) {
    $this->error = "User name already in use";
    return false;

} catch (InvalidDataError $ex) {
    $this->error = "Some of the provided data is invalid";
    return false;

} catch (PDOException $ex) {
    $this->error = "Unable to save data in DB - try later";
    return false;

} catch (Exception $ex) {
    $this->error = "An unknown error has occurred";
    $this->logException($ex);
    return false;
}