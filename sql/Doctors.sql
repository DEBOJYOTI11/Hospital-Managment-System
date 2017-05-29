create table Doctors(
	DOCID INT AUTO_INCREMENT PRIMARY KEY ,
	DOCNAME VARCHAR(40) NOT NULL,
	AGE INT ,
	SEX CHAR NOT NULL,
	DISID INT ,
	 FOREIGN KEY( DISID) REFERENCES DISEASE(DISID)
   )

INSERT INTO  Doctors values( 0, "X" , 0 , 'X' , 26 );
   INSERT INTO  Doctors values( 0, "Dr. HAMEL SMIT" , 50 , 'M' , 27 );
   INSERT INTO  Doctors values( 0, "Dr. RON DUNKEY" , 40 , 'M' , 27 );
INSERT INTO  Doctors values( 0, "Dr. LIBYA DOM" , 30 , 'F' , 27 );
INSERT INTO  Doctors values( 0, "Dr. VIRGINIA SMIT" , 50 , 'F' , 28 );
INSERT INTO  Doctors values( 0, "Dr. BOB DUNCAN" , 55 , 'M' , 28 );
INSERT INTO  Doctors values( 0, "Dr. HARRY WISKRY" , 51 , 'M' , 28 );
INSERT INTO  Doctors values( 0, "Dr. RAHUL CHANDAR" , 40 , 'M' , 28 );
INSERT INTO  Doctors values( 0, "Dr. BARAK MISIGAN" , 41 , 'M' , 28 );
INSERT INTO  Doctors values( 0, "Dr. CHRISTOPHER UNDERWOOD" , 30 , 'M' , 29 );
INSERT INTO  Doctors values( 0, "Dr. DANIEL RACLIF" , 46 , 'M' , 29 );
INSERT INTO  Doctors values( 0, "Dr. ABCDF" , 49 , 'M' , 30 );
INSERT INTO  Doctors values( 0, "Dr. FGH" , 39 , 'M' , 30 );
INSERT INTO  Doctors values( 0, "Dr. DEF" , 28 , 'M' , 34 );
INSERT INTO  Doctors values( 0, "Dr. ABC" , 29 , 'M' , 35 );
INSERT INTO  Doctors values( 0, "Dr. XYZ" , 27 , 'M' , 35 );
INSERT INTO  Doctors values( 0, "Dr. PRUYANKA CHOPRA" , 27 , 'F' , 35 );
INSERT INTO  Doctors values( 0, "Dr. SUNANDA" , 33 , 'F' , 34 );
INSERT INTO  Doctors values( 0, "Dr. MICHEL GREY" , 38 , 'F' , 33 );
INSERT INTO  Doctors values( 0, "Dr. MICHEL GARRET" , 35 , 'F' , 33 );
INSERT INTO  Doctors values( 0, "Dr. CHISTINA BOB" , 38 , 'F' , 32 );