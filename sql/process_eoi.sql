-- creates the table eoi, make sure to have the database mediaflare selected before running this script

CREATE TABLE `eoi` (
    `EOInumber`      INT(11)      NOT NULL AUTO_INCREMENT,
    `job_reference`  VARCHAR(5)   NOT NULL,
    `first_name`     VARCHAR(20)  NOT NULL,
    `last_name`      VARCHAR(20)  NOT NULL,
    `date_of_birth`  VARCHAR(10)  NOT NULL,
    `gender`         ENUM('male','female','prefer-not-to-say') NOT NULL,
    `street_address` VARCHAR(40)  NOT NULL,
    `suburb`         VARCHAR(40)  NOT NULL,
    `state`          ENUM('VIC','NSW','QLD','NT','WA','SA','TAS','ACT') NOT NULL,
    `postcode`       CHAR(4)      NOT NULL,
    `email`          VARCHAR(255) NOT NULL,
    `phone`          VARCHAR(12)  NOT NULL,
    `skills`         VARCHAR(255) NOT NULL,
    `other_skills`   TEXT,
    `status`         ENUM('New','Current','Final') NOT NULL DEFAULT 'New',
    PRIMARY KEY (`EOInumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;