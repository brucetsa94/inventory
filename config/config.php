<?php

  //include "dbconfig.php";

  $con = new mysqli ("localhost", "root", "") or die (mysqli_connect_error());

  $createdb = mysqli_query($con, "CREATE DATABASE IF NOT EXISTS inv");
 
  if ($createdb) {

    $select = mysqli_select_db ($con, "inv");

    $table1 = mysqli_query($con, "CREATE TABLE IF NOT EXISTS users (
                            user_id INT(10) NOT NULL AUTO_INCREMENT,
                            name VARCHAR(15) NOT NULL,
                            dob DATE,
                            phone VARCHAR(12),
                            email VARCHAR(20),
                            username VARCHAR(20),
                            passw VARCHAR(15),
                            role_id INT(10) NOT NULL,
                            status INT(10),
                            PRIMARY KEY (user_id)
                          )");

    $table2 = mysqli_query($con, "CREATE TABLE IF NOT EXISTS items (
                            item_id INT(10) NOT NULL AUTO_INCREMENT,
                            item_name VARCHAR(15) NOT NULL,
                            description VARCHAR(50),
                            category_id INT(10) NOT NULL,
                            weight VARCHAR(20), #can be removed
                            size VARCHAR(15), #can be removed
                            manufacturer VARCHAR(25),
                            type VARCHAR(20),
                            serial_number VARCHAR(30),
                            quantity INT (10),
                            status INT(10),
                            PRIMARY KEY (item_id)
                          )");

    $table3 = mysqli_query($con, "CREATE TABLE IF NOT EXISTS category (
                            category_id INT(10) AUTO_INCREMENT NOT NULL,
                            category_name VARCHAR(20) NOT NULL,
                            status INT(5),
                            PRIMARY KEY (category_id)
                          )");

    $table4 = mysqli_query($con, "CREATE TABLE IF NOT EXISTS payments (
                            pay_id INT(10) NOT NULL AUTO_INCREMENT,
                            user_id INT(10) NOT NULL,
                            customer_name VARCHAR(40) NOT NULL,
                            status INT(5),
                            date_submitted TIMESTAMP,
                            amount INT(15) NOT NULL,
                            total INT(15) NOT NULL,
                            PRIMARY KEY (pay_id)
                          )");

    $table5 = mysqli_query($con, "CREATE TABLE IF NOT EXISTS paydetails (
                            pydet_id INT(10) NOT NULL AUTO_INCREMENT,
                            quantity INT(15),
                            item_id INT(10) NOT NULL,
                            price INT(15) NOT NULL,
                            status INT(5),
                            PRIMARY KEY (pydet_id)
                          )");

    $table6 = mysqli_query($con, "CREATE TABLE IF NOT EXISTS report (
                            report_id INT(10) NOT NULL AUTO_INCREMENT,
                            name VARCHAR(20),
                            item_id INT(10) NOT NULL,
                            pay_id INT(10) NOT NULL,
                            user_id INT(10) NOT NULL,
                            status INT(5),
                            PRIMARY KEY (report_id)
                          )");
    $table7 = mysqli_query($con, "CREATE TABLE IF NOT EXISTS role (
                            role_id INT(10) NOT NULL,
                            role_type VARCHAR(15) NOT NULL,
                            PRIMARY KEY (role_id)
                        )");


      if ($table1 && $table2 && $table3 && $table4 && $table5 && $table6 && $table7) {

          $alter1 = mysqli_query($con, "ALTER TABLE users ADD CONSTRAINT fk_roleid FOREIGN KEY (role_id) REFERENCES role(role_id)");
          $alter2 = mysqli_query($con, "ALTER TABLE items ADD CONSTRAINT fk_catid FOREIGN KEY (category_id) REFERENCES category(category_id)");
          $alter3 = mysqli_query($con, "ALTER TABLE report ADD CONSTRAINT fk_itid FOREIGN KEY (item_id) REFERENCES items(item_id)");
          $alter4 = mysqli_query($con, "ALTER TABLE report ADD CONSTRAINT fk_pyid FOREIGN KEY (pay_id) REFERENCES payments(pay_id)");
          $alter5 = mysqli_query($con, "ALTER TABLE report ADD CONSTRAINT fk_usid FOREIGN KEY (user_id) REFERENCES users(user_id)");
          $alter6 = mysqli_query($con, "ALTER TABLE payments ADD CONSTRAINT fk_usrid FOREIGN KEY (user_id) REFERENCES users(user_id)");
          $alter7 = mysqli_query($con, "ALTER TABLE paydetails ADD CONSTRAINT fk_iteid FOREIGN KEY (item_id) REFERENCES items(item_id)");

          $insert1 = mysqli_query($con, "INSERT INTO role(role_id, role_type) VALUES (1, 'admin'), (2, 'manager'), (3, 'sales')");
          $fk = mysqli_query($con, "SET FOREIGN_KEY_CHECKS = 0");
          $insert2 = mysqli_query($con, "INSERT INTO category(category_name, status) VALUES ('Smartphones', 1), ('Cameras', 1), ('Power Banks', 1), ('Computers', 1), ('Cables', 1), ('Printers', 1), ('TV', 1), ('Video Games and Consoles', 1), ('Other Devices', 1)");

            } else {
              echo "failed" . mysqli_error($con);
            }
        } else {
          echo mysqli_error($con);
        }
 mysqli_close($con);
?>
