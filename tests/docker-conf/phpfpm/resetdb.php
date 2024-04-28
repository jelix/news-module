<?php

echo "Delete all tables from the postgresql database\n";
$tryAgain = true;

while($tryAgain) {

    $cnx = @pg_connect("host='pgsql' port='5432' dbname='newsmodule' user='usertest' password='test1234' ");
    if (!$cnx) {
        echo "  postgresql is not ready yet\n";
        sleep(1);
        continue;
    }
    $tryAgain = false;
    pg_query($cnx, 'drop table if exists news cascade');
    pg_close($cnx);
}

echo "  tables deleted\n";

