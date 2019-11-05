<?php
   session_start();

    $messages = array();
    $presets = $_POST;
    $sentiment = '';



    if (empty($_POST['comment'])) {
    $messages[] = "Please leave a comment. THANKS!";
    unset($presets['comment']);
    }

    #if (count($messages) > 0) {
    #   $_SESSION['messages'] = $messages;
    #   $_SESSION['form_data'] = $presets;
    #   $_SESSION['sentiment'] = 'bad';
    #header("Location: Chat.php");
    #exit();
    #}
    #unset($_SESSION['messages']);
    #unset($_SESSION['form_data']);

    require_once 'Dao.php';
    $dao = new Dao();
    $dao->saveComment($_POST['comment']);
    $_SESSION['messages'] = array("Your comment has been posted");
    $_SESSION['sentiment'] = 'good';
    header("Location: Chat.php");
?>
