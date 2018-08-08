DROP TABLE azmun;
CREATE TABLE azmun (
  ID int NOT NULL AUTO_INCREMENT,
  title VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci,
  type int,
  ostan VARCHAR(300),
  state int,
  dateAzmun VARCHAR(300),
  dateKart VARCHAR(300),
  dateNatayej VARCHAR(300),
  englishName VARCHAR(300),
  xmlAdress VARCHAR(300),
  PRIMARY KEY (ID)) DEFAULT CHARSET=utf8;

DROP TABLE news;
CREATE TABLE news (
  ID int NOT NULL AUTO_INCREMENT,
  title VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci,
  date VARCHAR(300),
  englishName VARCHAR(300),
  xmlAdress VARCHAR(300),
  PRIMARY KEY (ID)) DEFAULT CHARSET=utf8;

INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName,xmlAdress) VALUES ('دریافت کارت ورود به جلسه آزمون فولاد سیرجان ایرانیان', '1','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladsirjan','azmun/test.xml');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName,xmlAdress) VALUES ('زمان اعلام نتایج آزمون آگهی جذب سرمایه انسانی شرکت فولاد بوتیای ایرانیان', '1','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'bootia','azmun/test.xml');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName,xmlAdress) VALUES ('زمان اعلام نتایج آزمون آگهی جذب سرمایه انسانی شرکت فولاد سیرجان ایرانیان', '1','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladSirjan2','azmun/test.xml');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName,xmlAdress) VALUES ('آگهی جذب نیروی انسانی شرکت فولاد زرند ایرانیان', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand','azmun/test.xml');

INSERT INTO news(title, date, englishName) VALUES ('دریافت کارت ورود به جلسه آزمون فولاد سیرجان ایرانیان','1397/05/02' , 'fuladSirjan');
INSERT INTO news(title, date, englishName) VALUES ('دریافت کارت ورود به جلسه آزمون فولاد سیرجان ایرانیان','1397/05/02' , 'fuladSirjan');
INSERT INTO news(title, date, englishName) VALUES ('دریافت کارت ورود به جلسه آزمون فولاد سیرجان ایرانیان','1397/05/02' , 'fuladSirjan');
INSERT INTO news(title, date, englishName) VALUES ('دریافت کارت ورود به جلسه آزمون فولاد سیرجان ایرانیان','1397/05/02' , 'fuladSirjan');


#
# INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('دریافت کارت ورود به جلسه آزمون فولاد سیرجان ایرانیان', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladSirjan');
# INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('زمان اعلام نتایج آزمون آگهی جذب سرمایه انسانی شرکت فولاد بوتیای ایرانیان', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'bootia');
# INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('زمان اعلام نتایج آزمون آگهی جذب سرمایه انسانی شرکت فولاد سیرجان ایرانیان', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladSirjan2');
# INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('آگهی جذب نیروی انسانی شرکت فولاد زرند ایرانیان', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
# INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('دریافت کارت ورود به جلسه آزمون فولاد سیرجان ایرانیان', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladSirjan');
# INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('زمان اعلام نتایج آزمون آگهی جذب سرمایه انسانی شرکت فولاد بوتیای ایرانیان', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'bootia');
# INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('زمان اعلام نتایج آزمون آگهی جذب سرمایه انسانی شرکت فولاد سیرجان ایرانیان', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladSirjan2');
# INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('آگهی جذب نیروی انسانی شرکت فولاد زرند ایرانیان', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
# INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('دریافت کارت ورود به جلسه آزمون فولاد سیرجان ایرانیان', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladSirjan');
# INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('زمان اعلام نتایج آزمون آگهی جذب سرمایه انسانی شرکت فولاد بوتیای ایرانیان', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'bootia');
# INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('زمان اعلام نتایج آزمون آگهی جذب سرمایه انسانی شرکت فولاد سیرجان ایرانیان', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladSirjan2');
# INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('آگهی جذب نیروی انسانی شرکت فولاد زرند ایرانیان', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
# INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('دریافت کارت ورود به جلسه آزمون فولاد سیرجان ایرانیان', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladSirjan');
# INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('زمان اعلام نتایج آزمون آگهی جذب سرمایه انسانی شرکت فولاد بوتیای ایرانیان', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'bootia');
# INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('زمان اعلام نتایج آزمون آگهی جذب سرمایه انسانی شرکت فولاد سیرجان ایرانیان', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladSirjan2');
# INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('آگهی جذب نیروی انسانی شرکت فولاد زرند ایرانیان', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
# INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('دریافت کارت ورود به جلسه آزمون فولاد سیرجان ایرانیان', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladSirjan');
# INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('زمان اعلام نتایج آزمون آگهی جذب سرمایه انسانی شرکت فولاد بوتیای ایرانیان', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'bootia');
# INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('زمان اعلام نتایج آزمون آگهی جذب سرمایه انسانی شرکت فولاد سیرجان ایرانیان', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladSirjan2');
# INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('آگهی جذب نیروی انسانی شرکت فولاد زرند ایرانیان', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');


INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('1', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('2', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('3', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('4', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('5', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('6', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('7', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('8', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('9', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('10', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('11', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('12', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('13', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('14', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('15', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('16', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('17', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('18', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('19', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('20', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('21', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('22', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('23', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('24', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('25', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('26', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('27', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('28', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('29', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('30', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('31', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('32', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('33', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('34', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('35', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('36', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('37', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('38', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('39', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('40', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('41', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('42', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('43', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('44', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('45', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('46', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('47', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('48', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('49', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('50', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('51', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('52', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');
INSERT INTO azmun(title, type, ostan, state, dateAzmun, dateKart, dateNatayej,englishName) VALUES ('53', '2','تهران' , '1' , '1397/05/02' , '1397/05/02' , '1397/05/02' , 'fuladZarand');


