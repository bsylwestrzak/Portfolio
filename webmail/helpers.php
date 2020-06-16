<?php

/**
 *
 *
 *
 */

session_start();

/**
 *
 * Function checks if error array from validator has present given key.
 * If yes, echo argument's html.
 *
 * @param $key
 * @param $toPrint
 */
function hasError($key, $toPrint) {
    if(isset($_SESSION['errors'])) {

        $error = $_SESSION['errors_' . $key];

        if(count($error) > 0) {
            echo $toPrint;
            unset($_SESSION['errors_' . $key]);
        }

    }
}

/**
 *
 * Function checks if after failed form validation it should output
 * previous value to form inputs.
 *
 * @param $key
 */
function previousVal($key) {
    if(isset($_SESSION['previous_' . $key])) {
        echo $_SESSION['previous_' . $key];
        unset($_SESSION['previous_' . $key]);
    }
}

/**
 *
 * Output mail
 *
 * @param $html
 */
function mailSucceed($html) {
    if(isset($_SESSION['mail_success'])) {
        echo $html;
        unset($_SESSION['mail_success']);
    }
}