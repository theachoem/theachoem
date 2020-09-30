<?php
    //LAZY: git add . && git commit -m "improving" && git push heroku master && git push origin master
    //GIVEN: mysql://bbde861da7b1f1:e78d0ecd@us-cdbr-east-02.cleardb.com/heroku_0d22f250ec9246f?reconnect=true

    //connect to database 
    //LOG IN: mysql -u bbde861da7b1f1 -h us-cdbr-east-02.cleardb.com -p heroku_0d22f250ec9246f
    //BACKUP: mysqldump -u bbde861da7b1f1 heroku_0d22f250ec9246f --host=us-cdbr-east-02.cleardb.com -p > portfolio.sql
    //IMPORT: mysql -u bbde861da7b1f1 -h us-cdbr-east-02.cleardb.com -p heroku_0d22f250ec9246f < testimonial.sql
    //git rm -r --cached .
    define('PASSWORD', 'e78d0ecd');  
    define('USERNAME', 'bbde861da7b1f1'); 

?>