<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE board(";
    $sql .= "boardID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "memberID int(10) NOT NULL,";
    $sql .= "boardTitle varchar(100) NOT NULL,";
    $sql .= "boardContents longtext NOT NULL,";
    $sql .= "boardView int(10) NOT NULL,";
    $sql .= "regTime int(40) NOT NULL,";
    $sql .= "PRIMARY KEY(boardID)";
    $sql .= ") charset=utf8";

    $connect -> query($sql);

    // 이전 게시물 삭제 및 AUTO_INCREMENT 값을 재설정
    $connect->query("DELETE FROM board WHERE boardID <= 3");
    $connect->query("ALTER TABLE board AUTO_INCREMENT = 1");

    // 새 게시물 추가
    $connect->query("INSERT INTO board (memberID, boardTitle, boardContents, boardView, regTime) VALUES (1, '제목', '내용', 0, UNIX_TIMESTAMP(NOW()))");
?>