--
--
-- Title:         SQL Core (base) Install File
--
-- Author:        Pierre-Henry Soria <ph7software@gmail.com>
-- Copyright:     (c) 2013-2014, Pierre-Henry Soria. All Rights Reserved.
-- Link:          http://github.com/pH-7/
-- License:       CC BY-NC-SA <http://creativecommons.org/licenses/by-nc-sa/3.0/>
--
--

CREATE TABLE IF NOT EXISTS pH7_User (
  profileId int(10) unsigned NOT NULL AUTO_INCREMENT,
  email varchar(120) NOT NULL,
  firstName varchar(20) DEFAULT NULL,
  lastName varchar(20) DEFAULT NULL,
  url varchar(120) DEFAULT NULL,
  howHearAboutSoftware varchar(255) DEFAULT NULL,
  joinDate datetime DEFAULT NULL,
  ip varchar(20) NOT NULL DEFAULT '127.0.0.1',
  PRIMARY KEY (profileId),
  UNIQUE KEY (email)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
